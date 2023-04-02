



/*
  # Instructions  :
  Implement variable length quantity encoding and decoding.

  The goal of this exercise is to implement VLQ encoding/decoding.

  In short, the goal of this encoding is to encode integer values in a way that would save bytes. 
  Only the first 7 bits of each byte is significant (right-justified; sort of like an ASCII byte). 
  So, if you have a 32-bit value, you have to unpack it into a series of 7-bit bytes. 
  Of course, you will have a variable number of bytes depending upon your integer. 
  To indicate which is the last byte of the series, you leave bit #7 clear. In all of the preceding bytes, you set bit #7.

  So, if an integer is between 0-127, it can be represented as one byte. 
  Although VLQ can deal with numbers of arbitrary sizes, for this exercise we will restrict ourselves to only numbers that fit in a 32-bit unsigned integer. 
  Here are examples of integers as 32-bit values, and the variable length quantities that they translate to:

   NUMBER        VARIABLE QUANTITY
  00000000              00
  00000040              40
  0000007F              7F
  00000080             81 00
  00002000             C0 00
  00003FFF             FF 7F
  00004000           81 80 00
  00100000           C0 80 00
  001FFFFF           FF FF 7F
  00200000          81 80 80 00
  08000000          C0 80 80 00
  0FFFFFFF          FF FF FF 7F 
  
  02-April-2023
*/


<?php
/*
 * By adding type hints and enabling strict type checking, code can become
 * easier to read, self-documenting and reduce the number of potential bugs.
 * By default, type declarations are non-strict, which means they will attempt
 * to change the original type to match the type specified by the
 * type-declaration.
 *
 * In other words, if you pass a string to a function requiring a float,
 * it will attempt to convert the string value to a float.
 *
 * To enable strict mode, a single declare directive must be placed at the top
 * of the file.
 * This means that the strictness of typing is configured on a per-file basis.
 * This directive not only affects the type declarations of parameters, but also
 * a function's return type.
 *
 * For more info review the Concept on strict type checking in the PHP track
 * <link>.
 *
 * To disable strict typing, comment out the directive below.
 */
declare(strict_types=1);
const BLOCK = 7;
function vlq_encode(array $input): array
{
    $groups = array_map(function (int $no) {
        $bits = [$no % (2 ** BLOCK)];
        $no >>= BLOCK;
        while ($no > 0) {
            array_unshift($bits, 2 ** BLOCK  + $no % (2 ** BLOCK));
            $no >>= BLOCK;
        }
        return $bits;
    }, $input);
    return array_merge(...$groups);
}
function vlq_decode(array $input): array
{
    $groups = [];
    $group = [];
    foreach ($input as $bit) {
        array_unshift($group, $bit);
        if ($bit < 2 ** BLOCK) {
            $groups[] = $group;
            $group = [];
        }
    }
    if (empty($groups)) {
        throw new InvalidArgumentException();
    }
    foreach ($groups as $group) {
        if (count($group) > 5) {
            throw new OverflowException();
        }
    }
    return array_map(function ($group) {
        $no = 0;
        foreach ($group as $i => $bit) {
            $no += ($bit % 2 ** BLOCK) << (BLOCK * $i);
        }
        return $no;
    }, $groups);
}

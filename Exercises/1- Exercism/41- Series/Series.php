



/*
  Instructions
  Given a string of digits, output all the contiguous substrings of length n in that string in the order that they appear.

  For example, the string "49142" has the following 3-digit series:
  "491"
  "914"
  "142"

  And the following 4-digit series:
  "4914"
  "9142"

  And if you ask for a 6-digit series from a 5-digit string, you deserve whatever you get.

  Note that these series are only required to occupy adjacent positions in the input; the digits need not be numerically consecutive.
  
  31-March-2023
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
function slices(string $number, int $size): array
{
    $numberSize = strlen($number);
    if ($size > $numberSize || $size === 0) {
        throw new InvalidArgumentException('Invalid arguments');
    }
    $slices = [];
    for ($i = 0; $i <= $numberSize - $size; $i++) {
        $slices[] = substr($number, $i, $size);
    }
    return $slices;
}

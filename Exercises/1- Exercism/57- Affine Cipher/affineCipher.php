



/**
  #Instructions
  Create an implementation of the affine cipher, an ancient encryption system created in the Middle East.

  The affine cipher is a type of monoalphabetic substitution cipher. Each character is mapped to its numeric equivalent, 
  encrypted with a mathematical function and then converted to the letter relating to its new numeric value. 
  Although all monoalphabetic ciphers are weak, the affine cypher is much stronger than the atbash cipher, because it has many more keys.

  The encryption function is:

  E(x) = (ax + b) mod m

  * where x is the letter's index from 0 - length of alphabet - 1
  * m is the length of the alphabet. For the roman alphabet m == 26.
  * and a and b make the key
  
  The decryption function is:

  D(y) = a^-1(y - b) mod m

  * where y is the numeric value of an encrypted letter, ie. y = E(x)
  * it is important to note that a^-1 is the modular multiplicative inverse of a mod m
  * the modular multiplicative inverse of a only exists if a and m are coprime.
  
  To find the MMI of a:

  an mod m = 1

  * where n is the modular multiplicative inverse of a mod m
  
  More information regarding how to find a Modular Multiplicative Inverse and what it means can be found here.

  Because automatic decryption fails if a is not coprime to m your program should return status 1 and "Error: a and m must be coprime." if they are not. 
  Otherwise it should encode or decode with the provided key.

  The Caesar (shift) cipher is a simple affine cipher where a is 1 and b as the magnitude results in a static displacement of the letters. 
  This is much less secure than a full implementation of the affine cipher.

  Ciphertext is written out in groups of fixed length, the traditional group size being 5 letters, and punctuation is excluded. 
  This is to make it harder to guess things based on word boundaries.

  #General Examples
  * Encoding test gives ybty with the key a=5 b=7
  * Decoding ybty gives test with the key a=5 b=7
  * Decoding ybty gives lqul with the wrong key a=11 b=7
  * Decoding kqlfd jzvgy tpaet icdhm rtwly kqlon ubstx
    * gives thequickbrownfoxjumpsoverthelazydog with the key a=19 b=13
    
  * Encoding test with the key a=18 b=13
    * gives Error: a and m must be coprime.
    * because a and m are not relatively prime
    
  #Examples of finding a Modular Multiplicative Inverse (MMI)
  
  * simple example:
    * 9 mod 26 = 9
    * 9 * 3 mod 26 = 27 mod 26 = 1
    * 3 is the MMI of 9 mod 26
    
  * a more complicated example:
    * 15 mod 26 = 15
    * 15 * 7 mod 26 = 105 mod 26 = 1
    * 7 is the MMI of 15 mod 26 
   
  22-April-2023
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
function encode(string $text, int $num1, int $num2): string
{
    list($encoded, $splitText, $range, $rangeLetters, $m) = setup($text, $num1, $num2);
    foreach ($splitText as $index => $char) {
        if (empty($char)) {
            continue;
        }
        $x = strpos($rangeLetters, strtolower($char));
        $encodeIndex = ($num1 * $x + $num2) % $m;
       
        if (is_numeric($char)) {
            $encoded .= $char;
        } else {
            $encoded .= $rangeLetters[$encodeIndex];
        }
        $length = preg_match_all ('/[^\s]/', $encoded);
        $encoded .= $length % 5 == 0 ? " " : "";
    }
    return trim($encoded);
}
function decode(string $text, int $num1, int $num2): string
{
    list($decoded, $splitText, $range, $rangeLetters, $m) = setup($text, $num1, $num2);
    foreach ($splitText as $index => $char) {
        if (empty($char)) {
            continue;
        }
        $y = strpos($rangeLetters, $char);
        $decodeIndex = mmi($num1, $m)*($y - $num2) % $m;
        if (is_numeric($char)) {
            $decoded .= $char;
        } else {
            $decoded .= $rangeLetters[$decodeIndex];
        }
    }
    return $decoded;
}
function setup (string $text, int $num1, int $num2): array
{
    $string = "";
    $splitText = preg_replace("/[[:punct:]\s]+/", "", str_split($text));
    $range = range("a", "z");
    $rangeLetters = implode("", $range);
    $m = count($range);
    for ($i = 2; $i <= min($num1, $m); $i++) {
        if ($num1 % $i === 0 && $m % $i === 0) {
            throw new Exception("a not coprime of m");
        }
    }
    return [$string, $splitText, $range, $rangeLetters, $m];
}
function mmi(int $a, int $m)
{
    for ($n = 1; $n < max($a, $m); $n++) {
        if (($a * $n) % $m === 1) {
            return $n;
        }
    }
}

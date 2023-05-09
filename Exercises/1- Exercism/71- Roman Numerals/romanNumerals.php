



/**
  #Instructions
  Write a function to convert from normal numbers to Roman Numerals.

  The Romans were a clever bunch. They conquered most of Europe and ruled it for hundreds of years. 
They invented concrete and straight roads and even bikinis. One thing they never discovered though was the number zero. 
This made writing and dating extensive histories of their exploits slightly more challenging, but the system of numbers they came up with is still in use today. 
For example the BBC uses Roman numerals to date their programmes.

  The Romans wrote numbers using letters - I, V, X, L, C, D, M. (notice these letters have lots of straight lines and are hence easy to hack into stone tablets).
   1  => I
  10  => X
   7  => VII

  There is no need to be able to convert numbers larger than about 3000. (The Romans themselves didn't tend to go any higher)

  Wikipedia says: Modern Roman numerals ... are written by expressing each digit separately starting with the left most digit 
  and skipping any digit with a value of zero.

  To see this in practice, consider the example of 1990.

  In Roman numerals 1990 is MCMXC:

  1000=M 900=CM 90=XC

  2008 is written as MMVIII:

  2000=MM 8=VIII 
   
  09-May-2023
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
const ROMAN_NUMERALS = [
    "1000" => "M",
    "500" => "D",
    "100" => "C",
    "50" => "L",
    "10" => "X",
    "5" => "V",
    "1" => "I",
];
const ROMAN_NUMERAL_REPLACEMENTS = [
    "DCCCC" => "CM",
    "CCCC" => "CD",
    "LXXXX" => "XC",
    "XXXX" => "XL",
    "VIIII" => "IX",
    "IIII" => "IV",
];
function toRoman(int $number): string
{
    $numerals = "";
    foreach (ROMAN_NUMERALS as $value => $numeral) {
        while ($number >= $value) {
            $numerals .= $numeral;
            $number -= $value;
        }
    }
    return str_replace(array_keys(ROMAN_NUMERAL_REPLACEMENTS), array_values(ROMAN_NUMERAL_REPLACEMENTS), $numerals);
}

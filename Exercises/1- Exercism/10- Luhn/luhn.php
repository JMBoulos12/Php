



/*
  # Instructions  :
  Given a number determine whether or not it is valid per the Luhn formula.

  The Luhn algorithm is a simple checksum formula used to validate a variety of identification numbers, 
  such as credit card numbers and Canadian Social Insurance Numbers.

  The task is to check if a given string is valid.

  # Validating a Number
  Strings of length 1 or less are not valid. Spaces are allowed in the input, but they should be stripped before checking. 
  All other non-digit characters are disallowed.

  # Example 1: valid credit card number
  4539 3195 0343 6467
  
  The first step of the Luhn algorithm is to double every second digit, starting from the right. We will be doubling
  4_3_ 3_9_ 0_4_ 6_6_
  
  If doubling the number results in a number greater than 9 then subtract 9 from the product. The results of our doubling:
  8569 6195 0383 3437
  
  Then sum all of the digits:
  8+5+6+9+6+1+9+5+0+3+8+3+3+4+3+7 = 80
  
  If the sum is evenly divisible by 10, then the number is valid. This number is valid!

  # Example 2: invalid credit card number
  8273 1232 7352 0569
  
  Double the second digits, starting from the right
  7253 2262 5312 0539
  
  Sum the digits
  7+2+5+3+2+2+6+2+5+3+1+2+0+5+3+9 = 57
  
  57 is not evenly divisible by 10, so this number is not valid.
  
  29-March-2023
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
define("NUMBERS", array("0","1","2","3","4","5","6","7","8","9"));
function isValid(string $number): bool
{
    $number = str_replace(" ", "", $number);    
    $numberArray = str_split($number);
    if(!isValidSymbol($numberArray)) return false;
    elseif(sizeOf($numberArray) <= 1) return false;
    for($i = sizeOf($numberArray) -2; $i >= 0; $i -= 2){
        $numberArray[$i] *= 2;
        if($numberArray[$i] > 9) $numberArray[$i] -= 9;
    }
    $sum = 0;
    foreach($numberArray as $numberArrayValue){
        $sum += $numberArrayValue;
    }
    if($sum % 10 == 0) return true;
    else return false;
}
function isValidSymbol($inputArray): bool{
    foreach($inputArray as $inputArrayValue){
        if(!in_array($inputArrayValue, NUMBERS)) return false;
    }
    return true;
}

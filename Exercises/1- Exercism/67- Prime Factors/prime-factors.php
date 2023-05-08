



/**
  #Instructions
  Compute the prime factors of a given natural number.

  A prime number is only evenly divisible by itself and 1.

  Note that 1 is not a prime number.

  Example
  What are the prime factors of 60?

  * Our first divisor is 2. 2 goes into 60, leaving 30.
  * 2 goes into 30, leaving 15.
    * 2 doesn't go cleanly into 15. So let's move on to our next divisor, 3.

  * 3 goes cleanly into 15, leaving 5.
    * 3 does not go cleanly into 5. The next possible factor is 4.
    * 4 does not go cleanly into 5. The next possible factor is 5.

  * 5 does go cleanly into 5.
  * We're left only with 1, so now, we're done.

  Our successful divisors in that computation represent the list of prime factors of 60: 2, 2, 3, and 5.

  You can check this yourself:

  * 2 * 2 * 3 * 5
  * = 4 * 15
  * = 60
  * Success!
  
  08-May-2023
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
function factors(int $number): array
{
    $factors = [];
    echo $number;
    $i = 2;
    while ($number > 1 && $i <= $number){
        if ($number % $i == 0){
            $number = $number/$i;
            echo $number;
            array_push($factors, $i);
        }
        else{
            $i ++;
        }  
    }
    print_r(array_values($factors));
    return $factors;
}

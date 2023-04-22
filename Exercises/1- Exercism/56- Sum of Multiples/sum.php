



/**
  #Instructions
  Given a list of factors and a limit, add up all the unique multiples of the factors that are less than the limit. 
  All inputs will be greater than or equal to zero.

  Example
  Suppose the limit is 20 and the list of factors is [3, 5]. We need to find the sum of all unique multiples of 3 and 5 that are less than 20.

  Multiples of 3 less than 20: 3, 6, 9, 12, 15, 18 Multiples of 5 less than 20: 5, 10, 15

  The unique multiples are: 3, 5, 6, 9, 10, 12, 15, 18

  The sum of the unique multiples is: 3 + 5 + 6 + 9 + 10 + 12 + 15 + 18 = 78

  So, the answer is 78. 

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
function sumOfMultiples($max, $multipliers): int
{
    $multiplesCandidates = range(1, $max - 1);
    $multiples = array_filter(
        $multiplesCandidates,
        function ($candidate) use ($multipliers) {
            foreach ($multipliers as $multiplier) {
                if ($multiplier !== 0 && $candidate % $multiplier === 0) {
                    return true;
                }
            }
            return false;
        }
    );
    return array_sum($multiples);
}

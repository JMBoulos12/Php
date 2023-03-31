



/*
  Instructions
  The Collatz Conjecture or 3x+1 problem can be summarized as follows:

  Take any positive integer n. If n is even, divide n by 2 to get n / 2. If n is odd, multiply n by 3 and add 1 to get 3n + 1. Repeat the process indefinitely. The conjecture states that no matter which number you start with, you will always reach 1 eventually.

  Given a number n, return the number of steps required to reach 1.

  Examples
  Starting with n = 12, the steps would be as follows:

  1.  12
  2.  6
  3.  3
  4.  10
  5.  5
  6.  16
  7.  8
  8.  4
  9.  2
  10. 1
  Resulting in 9 steps. So for input n = 12, the return value would be 9.
  
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
function steps(int $n): int
{
    if ($n <= 0) {
        throw new InvalidArgumentException('Only positive numbers are allowed');
    }
    for ($step = 0; $n !== 1; $step++) {
        $n = $n % 2 === 0 ? $n / 2 : 3 * $n + 1;
    }
    return $step;
}

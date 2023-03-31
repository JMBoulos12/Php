



/*
  # Introduction  :
  You bought a big box of random computer parts at a garage sale. You've started putting the parts together to build custom computers.

  You want to test the performance of different combinations of parts, and decide to create your own benchmarking program to see how your computers compare. You choose the famous "Sieve of Eratosthenes" algorithm, an ancient algorithm, but one that should push your computers to the limits.

  # Instructions  :
  Your task is to create a program that implements the Sieve of Eratosthenes algorithm to find prime numbers.

  A prime number is a number that is only divisible by 1 and itself. For example, 2, 3, 5, 7, 11, and 13 are prime numbers.

  The Sieve of Eratosthenes is an ancient algorithm that works by taking a list of numbers and crossing out all the numbers that aren't prime.

  A number that is not prime is called a "composite number".

  To use the Sieve of Eratosthenes, you first create a list of all the numbers between 2 and your given number. Then you repeat the following steps:

  1.  Find the next unmarked number in your list. This is a prime number.
  2.  Mark all the multiples of that prime number as composite (not prime).

  You keep repeating these steps until you've gone through every number in your list. At the end, all the unmarked numbers are prime.
  
  31-March-2023
*/


<?php
function sieve(int $limit): array
{
    $list = range($offset = 2, $limit);
    foreach ($list as $value) {
        for ($i = ($value * 2) - $offset; $i <= $limit; $i += $value) {
            unset($list[(int) $i]);
        }
    }
    return array_values($list);
}

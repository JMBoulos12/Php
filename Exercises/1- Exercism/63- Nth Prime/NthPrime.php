



/**
  #Instructions
  Given a number n, determine what the nth prime is.

  By listing the first six prime numbers: 2, 3, 5, 7, 11, and 13, we can see that the 6th prime is 13.

  If your language provides methods in the standard library to deal with prime numbers, pretend they don't exist and implement them yourself.
  
  08-May-2023
*/


<?php
function prime(int $position): int | bool
{
    if ($position < 1) {
        return false;
    }
    static $primes = [
        1 => 2 // the first prime is 2
    ];
    $x = end($primes) + 1;
    while (count($primes) < $position) {
        if (isPrime($x, $primes)) {
            $primes[count($primes) + 1] = $x;
        }
        $x++;
    }
    return $primes[$position];
}
function isPrime(int $x, array $primes): bool
{
    $limit = floor(sqrt($x));
    foreach ($primes as $prime) {
        if ($prime > $limit) {
            break;
        }
        if ($x % $prime === 0) {
            return false;
        }
    }
    return true;
}

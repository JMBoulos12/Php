



/*
  # Instructions
  Convert a number, represented as a sequence of digits in one base, to any other base.

  Implement general base conversion. Given a number in base a, represented as a sequence of digits, convert it to base b.

  # Note
  Try to implement the conversion yourself. Do not use something else to perform the conversion for you.
  
  # About Positional Notation
  In positional notation, a number in base b can be understood as a linear combination of powers of b.

  The number 42, in base 10, means:

  (4 * 10^1) + (2 * 10^0)

  The number 101010, in base 2, means:

  (1 * 2^5) + (0 * 2^4) + (1 * 2^3) + (0 * 2^2) + (1 * 2^1) + (0 * 2^0)

  The number 1120, in base 3, means:

  (1 * 3^3) + (1 * 3^2) + (2 * 3^1) + (0 * 3^0)

  I think you got the idea!

  Yes. Those three numbers above are exactly the same. Congratulations!
  
  29-March-2023
*/


<?php
declare(strict_types=1);
function rebase(int $originBase, array $sequence, int $targetBase)
{
    /** Validate input */
    if (!array_filter($sequence) || min([$originBase, $targetBase]) < 2 || min($sequence) < 0 || max($sequence) >= $originBase || reset($sequence) === 0)
        return null;
    /** Convert origin base to decimal */
    $base10 = array_reduce($sequence, fn ($acc, $val) => $acc * $originBase + $val, 0);
    /** Convert from decimal base to target base */
    $remainders = [];
    for ($i = $base10; $i > 0; $i = intdiv($i, $targetBase))
        $remainders[] = $i % $targetBase;
    return array_reverse($remainders);
}

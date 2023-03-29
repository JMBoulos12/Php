



/*
  # Instructions
  Given a string of digits, calculate the largest product for a contiguous substring of digits of length n.

  For example, for the input '1027839564', the largest product for a series of 3 digits is 270 (9 * 5 * 6), 
  and the largest product for a series of 5 digits is 7560 (7 * 8 * 3 * 9 * 5).

  Note that these series are only required to occupy adjacent positions in the input; the digits need not be numerically consecutive.

  For the input '73167176531330624919225119674426574742355349194934', the largest product for a series of 6 digits is 23520.

  29-March-2023
*/


<?php
declare(strict_types=1);
class Series
{
    public function __construct(private string $series)
    {
        if (preg_match('/\D/', $this->series))
            throw new InvalidArgumentException('Digits input must only contain digits');
    }
    public function largestProduct(int $span): int
    {
        if ($span === 0)
            return 1;
        if ($span < 0)
            throw new InvalidArgumentException('Span must be greater than zero');
        if ($span > strlen($this->series))
            throw new InvalidArgumentException('Span must be smaller than string length');
        $largestProduct = 0;
        for ($i = 0; $i < strlen($this->series) - $span + 1; $i++) {
            $candidate = array_product(array_map('intval', str_split(substr($this->series, $i, $span))));
            if ($candidate > $largestProduct)
                $largestProduct = $candidate;
        }
        return $largestProduct;
    }
}

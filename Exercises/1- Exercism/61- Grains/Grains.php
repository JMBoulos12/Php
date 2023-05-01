



/**
  #Instructions
  Calculate the number of grains of wheat on a chessboard given that the number on each square doubles.

  There once was a wise servant who saved the life of a prince. The king promised to pay whatever the servant could dream up. 
  Knowing that the king loved chess, the servant told the king he would like to have grains of wheat. 
  One grain on the first square of a chess board, with the number of grains doubling on each successive square.

  There are 64 squares on a chessboard (where square 1 has one grain, square 2 has two grains, and so on).

  Write code that shows:

  * how many grains were on a given square, and
  * the total number of grains on the chessboard

  #For bonus points
  Did you get the tests passing and the code clean? If you want to, these are some additional things you could try:

  * Optimize for speed.
  * Optimize for readability.

  Then please share your thoughts in a comment on the submission. Did this experiment make the code better? Worse? Did you learn anything from it? 
   
  01-May-2023
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
function m2(string $v) {
	$c = strlen($v);
	$r = '';
	$t = 0;
	for($i = $c - 1; $i >= 0; $i--) {
	  	$m = (int) $v[$i] * 2 + $t;
	    $t = 0;
    	if($m > 9) {
    		$t = 1;
  			$m = $m % 10;
    	}
    	$r .= $m;
	}
	if($t > 0)
	  	$r .= $t;
	return strrev($r);
}
function decrease(string $v) {
    $c = strlen($v);
	$d = 1;
	$t = 0;
    $r = '';
	for($i = $c - 1; $i >= 0; $i--) {
	  	$m = (int) $v[$i] - $d - $t;
	    $t = $d = 0;
	    if($m < 0) {
	    	$m = 10 + $m;
	    	$t = 1;
	    }
    	$r .= $m;
	}
	return strrev($r);
}
function square(int $number, bool $ignoreMaxNumber = false): string
{
    if($number <= 0 || (!$ignoreMaxNumber && $number > 64))
        throw new \InvalidArgumentException();
    $r = '1';
    for($i = 1; $i < $number; $i++)
    	$r = m2($r);
    return $r;
}
function total(): string
{
    return decrease(square(65, true));
}

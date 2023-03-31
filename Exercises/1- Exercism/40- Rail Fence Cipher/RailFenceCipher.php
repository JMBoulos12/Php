



/*
  # Instructions
  Implement encoding and decoding for the rail fence cipher.

  The Rail Fence cipher is a form of transposition cipher that gets its name from the way in which it's encoded. It was already used by the ancient Greeks.

  In the Rail Fence cipher, the message is written downwards on successive "rails" of an imaginary fence, 
  then moving up when we get to the bottom (like a zig-zag). Finally the message is then read off in rows.

  For example, using three "rails" and the message "WE ARE DISCOVERED FLEE AT ONCE", the cipherer writes out:

  W . . . E . . . C . . . R . . . L . . . T . . . E
  . E . R . D . S . O . E . E . F . E . A . O . C .
  . . A . . . I . . . V . . . D . . . E . . . N . .
  
  Then reads off:
  WECRLTEERDSOEEFEAOCAIVDEN
  
  To decrypt a message you take the zig-zag shape and fill the ciphertext along the rows.
  ? . . . ? . . . ? . . . ? . . . ? . . . ? . . . ?
  . ? . ? . ? . ? . ? . ? . ? . ? . ? . ? . ? . ? .
  . . ? . . . ? . . . ? . . . ? . . . ? . . . ? . .
  
  The first row has seven spots that can be filled with "WECRLTE".
  W . . . E . . . C . . . R . . . L . . . T . . . E
  . ? . ? . ? . ? . ? . ? . ? . ? . ? . ? . ? . ? .
  . . ? . . . ? . . . ? . . . ? . . . ? . . . ? . .
  
  Now the 2nd row takes "ERDSOEEFEAOC".
  W . . . E . . . C . . . R . . . L . . . T . . . E
  . E . R . D . S . O . E . E . F . E . A . O . C .
  . . ? . . . ? . . . ? . . . ? . . . ? . . . ? . .
  
  Leaving "AIVDEN" for the last row.
  W . . . E . . . C . . . R . . . L . . . T . . . E
  . E . R . D . S . O . E . E . F . E . A . O . C .
  . . A . . . I . . . V . . . D . . . E . . . N . .
  
  If you now read along the zig-zag shape you can read the original message.
  
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
function encode(string $plainMessage, int $rails): string
{
	$chars = mb_str_split($plainMessage);
	$pattern = range(0, $rails-1);
	if ($rails-2 >= 1) {
		$pattern = array_merge($pattern, range($rails-2, 1));
	}
	$fence = [];
	for ($i = 0; $i < $rails; $i++) {
		$fence[$i] = [];
	}
	for ($i = 0; $i < count($chars); $i++) {
		$rail = $pattern[$i % count($pattern)];
		$fence[$rail][$i] = $chars[$i];
	}
	$result = "";
	foreach ($fence as $rail) {
		$result .= implode("", $rail);
	}
	return $result;
}
function decode(string $cipherMessage, int $rails): string
{
	$fence = [];
	$chars = str_split($cipherMessage);
	for ($i = 0; $i < $rails; $i++) {
		$fence[$i] = array_fill(0, count($chars), null);
	}
	$pattern = range(0, $rails-1);
	if ($rails-2 >= 1) {
		$pattern = array_merge($pattern, range($rails-2, 1));
	}
	for ($i = 0; $i < count($chars); $i++) {
		$rail = $pattern[$i % count($pattern)];
		$fence[$rail][$i] = '*';
	}
	$index = 0;
	for ($y = 0; $y < $rails; $y++) {
		for ($x = 0; $x < count($chars); $x++) {
			if ($fence[$y][$x] && $index < count($chars)) {
				$fence[$y][$x] = $chars[$index++];
			}
		}
	}
	$result = "";
	for ($i = 0; $i < count($chars); $i++) {
		$rail = $pattern[$i % count($pattern)];
		$result .= $fence[$rail][$i];
	}
	return $result;
}

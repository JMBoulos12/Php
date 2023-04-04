



/*
  # Instructions  :
  Given the position of two queens on a chess board, indicate whether or not they are positioned so that they can attack each other.

  In the game of chess, a queen can attack pieces which are on the same row, column, or diagonal.

  A chessboard can be represented by an 8 by 8 array.

  So if you're told the white queen is at (2, 3) and the black queen at (5, 6), then you'd know you've got a set-up like so:

  _ _ _ _ _ _ _ _
  _ _ _ _ _ _ _ _
  _ _ _ W _ _ _ _
  _ _ _ _ _ _ _ _
  _ _ _ _ _ _ _ _
  _ _ _ _ _ _ B _
  _ _ _ _ _ _ _ _
  _ _ _ _ _ _ _ _

  You'd also be able to answer whether the queens can attack each other. 
  In this case, that answer would be yes, they can, because both pieces share a diagonal.
  
  04-April-2023
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
function placeQueen(int $xCoordinate, int $yCoordinate): bool
{
   if ($xCoordinate < 0 || $yCoordinate < 0){
     throw new InvalidArgumentException("The rank and file numbers must be positive.");
   }
   if ($xCoordinate >= 0 && $xCoordinate <= 7){
      if ($yCoordinate >= 0 && $yCoordinate <= 7){
          return true;
      }
   }   
   throw new InvalidArgumentException("The position must be on a standard size chess board.");
   return false;
}
function canAttack(array $whiteQueen, array $blackQueen): bool
{
    if ($whiteQueen[0] === $blackQueen[0]){
       return true;
    }
    if ($whiteQueen[1] === $blackQueen[1]){
        return true;
    }
    if (onDiagnol($whiteQueen, $blackQueen)){
        return true;
    }
    return false;
    
}
function onDiagnol(array $whiteQueen, array $blackQueen): bool {
     return abs($blackQueen[1] - $whiteQueen[1]) === abs($blackQueen[0] - $whiteQueen[0]);
    return abs(($blackQueen[1] - $whiteQueen[1]) / ($blackQueen[0] - $whiteQueen[0])) === 1;
}

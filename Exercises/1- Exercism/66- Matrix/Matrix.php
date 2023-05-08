



/**
  #Instructions
  Given a string representing a matrix of numbers, return the rows and columns of that matrix.

  So given a string with embedded newlines like:
  9 8 7
  5 3 2
  6 6 7

  representing this matrix:
      1  2  3
    |---------
  1 | 9  8  7
  2 | 5  3  2
  3 | 6  6  7

  your code should be able to spit out:

  A list of the rows, reading each row left-to-right while moving top-to-bottom across the rows,
  A list of the columns, reading each column top-to-bottom while moving from left-to-right.
  The rows for our example matrix:

  9, 8, 7
  5, 3, 2
  6, 6, 7

  And its columns:

  9, 5, 6
  8, 3, 6
  7, 2, 7
  
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
class Matrix
{
    public ?string $matrixStr;
    public $matrixArr;
    public $rowC;
    public function __construct(?string $matrixStr)
    {
        $this->matrixStr = $matrixStr;
        $this->matrixArr = preg_split("/[\s,]+/", $matrixStr);
        $this->rowC = substr_count($matrixStr,"\n") +1;
    }
    public function getColumn(int $pos)
    {
        $len = count($this->matrixArr) / $this->rowC;
        $res = array($len);
        $c = 0;
        for($y = $pos-1; $y < count($this->matrixArr); $c++){
            $res[$c] = $this->matrixArr[$y];
            $y += $len;
        }
        return $res;
    }
    public function getRow(int $pos)
    {
        $len = count($this->matrixArr) / $this->rowC;
        $pos = ($pos-1) * $len;
        $res = array($len);
        $c = 0;
        
        for($y = $pos; $y < $pos+$len; $c++){
            $res[$c] = $this->matrixArr[$y];
            $y++;
        }
        return $res;
    }
}

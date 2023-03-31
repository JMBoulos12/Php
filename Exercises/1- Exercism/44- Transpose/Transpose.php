



/*
  # Instructions  :
  Given an input text output it transposed.

  Roughly explained, the transpose of a matrix:
  ABC
  DEF

  is given by:
  AD
  BE
  CF

  Rows become columns and columns become rows. See https://en.wikipedia.org/wiki/Transpose.

  If the input has rows of different lengths, this is to be solved as follows:

  * Pad to the left with spaces.
  * Don't pad to the right.

  Therefore, transposing this matrix:
  ABC
  DE

  results in:
  AD
  BE
  C

  And transposing:
  AB
  DEF

  results in:
  AD
  BE
   F

  In general, all characters from the input should also be present in the transposed output. 
  That means that if a column in the input text contains only spaces on its bottom-most row(s), 
  the corresponding output row should contain the spaces in its right-most column(s).
  
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
function transpose(array $input): array
{
    $rows = count($input);
    $cols = countCols($input);
    if ($cols == 0) {
        return $input;
    }
    echo "cols='{$cols}'";
    $result = split($input);
    $result = trans($result, $rows, $cols);
    $result = joinUp($result);
    if ($cols) {
        $result[$cols - 1] = rtrim($result[$cols -1 ]);
    }
    
    return $result;
}
function trans(array $input, int $rows, int $cols)
{
    $result = [];
    for($row = 0; $row < $rows; $row += 1) {
        for($col = 0; $col < $cols; $col += 1) {
            if (@$input[$row][$col]) {
                $result[$col][$row] = $input[$row][$col];
            } else {
                $result[$col][$row] = " ";
            }
            
        }
    }
    return $result;
}
function split(array $input)
{
    $result = [];
    foreach ($input as $row => $string) {
        $result[$row] = str_split($string);
    }
    return $result;
}
function joinUp(array $input)
{
    $result = [];
    foreach ($input as $row => $array) {
        $result[$row] = implode($array);
    }
    return $result;
}
function countCols(array $input): int
{
    $result = 0;
    if (! $input) {
        return $result;
    }
    foreach ($input as $row) {
        $result = max($result, strlen($row));
    }
    return $result;
}
function toString(array $input): string
{
    return implode('', $input);
}

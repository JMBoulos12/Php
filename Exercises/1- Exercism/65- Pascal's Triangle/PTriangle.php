



/**
  #Instructions
  Compute Pascal's triangle up to a given number of rows.

  In Pascal's Triangle each number is computed by adding the numbers to the right and left of the current position in the previous row.

      1
     1 1
    1 2 1
   1 3 3 1
  1 4 6 4 1
  # ... etc
  
  08-May-2023
*/


<?php
function pascalsTriangleRows(?int $size): array | int
{
    if ($size === null || $size < 0) {
        return -1;
    }
    $rows = [];
    for ($r = 0; $r < $size; $r++) {
        $row = [1];
        $previousRow = $rows[$r - 1] ?? [];
        $previousSize = count($previousRow);
        for ($c = 1; $c <= $previousSize; $c++) {
            if ($c === $previousSize) {
                $row[] = 1;
                continue;
            }
            $row[] = ($previousRow[$c - 1] + $previousRow[$c]);
        }
        $rows[] = $row;
    }
    return $rows;
}

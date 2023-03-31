



/*
  # Instructions  :
  Add the mine counts to a completed Minesweeper board.

  Minesweeper is a popular game where the user has to find the mines using numeric hints that indicate how many mines are directly adjacent (horizontally, vertically, diagonally) to a square.

  In this exercise you have to create some code that counts the number of mines adjacent to a given empty square and replaces that square with the count.

  The board is a rectangle composed of blank space (' ') characters. A mine is represented by an asterisk ('*') character.

  If a given space has no adjacent mines at all, leave that square blank.

  # Examples  :
  For example you may receive a 5 x 4 board like this (empty spaces are represented here with the '·' character for display on screen):

  ·*·*·
  ··*··
  ··*··
  ·····

  And your code will transform it into this:

  1*3*1
  13*31
  ·2*2·
  ·111·
  
  31-March-2023
*/


<?php
declare(strict_types=1);
function solve(string $minesweeperBoard): string
{
    $lines = explode("\n", $minesweeperBoard);
    $corner  = '+';
    $hBorder = '-';
    $vBorder = '|';
    $mine    = '*';
    $adjecent = [[1, 0], [-1, 0], [-1, 1], [-1, -1], [1, 1], [1, -1], [0, 1], [0, -1]];
    $newMinesweeperBoard = "\n";
    foreach ($lines as $key => $line) {
        if (strlen($line) > 0) {
            if (strlen($line) < 4) {
                throw new InvalidArgumentException();
            }
            foreach (str_split($line) as $pos => $value) {
                if (!in_array($value, [$corner, $hBorder, $vBorder, $mine, ' '])) {
                    throw new InvalidArgumentException();
                }
                if ($pos === 0 || $pos === strlen($line) - 1) {
                    if ($value !== $corner && $value !== $vBorder) {
                        throw new InvalidArgumentException();
                    }
                }
                if ($key === 1 && $pos > 0 && $pos < strlen($line) - 1) {
                    if ($value !== $hBorder) {
                        throw new InvalidArgumentException();
                    }
                }
                if ($value === ' ') {
                    // var_dump($key, $pos, $value);
                    $mines = 0;
                    foreach ($adjecent as [$xPos, $yPos]) {
                        $positions = str_split($lines[$key + $xPos]);
                        if(!array_key_exists($pos + $yPos, $positions)) {
                            throw new InvalidArgumentException();
                        }
                        if ($positions[$pos + $yPos] === $mine) {
                            $mines++;
                        }
                    }
                    if ($mines !== 0) {
                        $line[$pos] = $mines;
                    }
                }
            }
            $newMinesweeperBoard .= $line."\n";
        }
    }
    return $newMinesweeperBoard;
}

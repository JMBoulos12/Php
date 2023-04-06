



/*
  #Instructions :
  Given a word, compute the Scrabble score for that word.

  #Letter Values  :
  You'll need these:

  Letter                           Value
  A, E, I, O, U, L, N, R, S, T       1
  D, G                               2
  B, C, M, P                         3
  F, H, V, W, Y                      4
  K                                  5
  J, X                               8
  Q, Z                               10
  
  #Examples :
  "cabbage" should be scored as worth 14 points:

  * 3 points for C
  * 1 point for A, twice
  * 3 points for B, twice
  * 2 points for G
  * 1 point for E
  
  And to total:

  * 3 + 2*1 + 2*3 + 2 + 1
  * = 3 + 2 + 6 + 3
  * = 5 + 9
  * = 14
  
  #Extensions :
  * You can play a double or a triple letter.
  * You can play a double or a triple word.
  
  06-April-2023
*/


<?php
declare(strict_types=1);
function score(string $word): int
{
    if (empty($word) === true) {
        return 0;
    }
    var_dump($word);
    $sum = 0;
    foreach (str_split($word) as $letter) {
        switch (strtoupper($letter)) {
            case 'D':
            case 'G':
                $val = 2;
                break;
            case 'B':
            case 'C':
            case 'M':
            case 'P':
                $val = 3;
                break;
            case 'F':
            case 'H':
            case 'V':
            case 'W':
            case 'Y':
                $val = 4;
                break;
            case 'K':
                $val = 5;
                break;
            case 'J':
            case 'X':
                $val = 8;
                break;
            case 'Q':
            case 'Z':
                $val = 10;
                break;
            default:
                $val = 1;
        }
        $sum += $val;
    }
    /* var_dump($sum); */
    return $sum;
    
    die;
    throw new \BadFunctionCallException("Implement the score function");
}

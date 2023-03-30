



/*
  Instructions  :
  Score a bowling game.

  Bowling is a game where players roll a heavy ball to knock down pins arranged in a triangle. Write code to keep track of the score of a game of bowling.

  Scoring Bowling :
  The game consists of 10 frames. A frame is composed of one or two ball throws with 10 pins standing at frame initialization. 
  There are three cases for the tabulation of a frame.

  * An open frame is where a score of less than 10 is recorded for the frame. 
    In this case the score for the frame is the number of pins knocked down.

  * A spare is where all ten pins are knocked down by the second throw. 
    The total value of a spare is 10 plus the number of pins knocked down in their next throw.

  * A strike is where all ten pins are knocked down by the first throw. 
    The total value of a strike is 10 plus the number of pins knocked down in the next two throws. 
    If a strike is immediately followed by a second strike, then the value of the first strike cannot be determined until the ball is thrown one more time.

  Here is a three frame example:
  Frame 1	      Frame 2	      Frame 3
  X (strike)	  5/ (spare)	  9 0 (open frame)

  Frame 1 is (10 + 5 + 5) = 20

  Frame 2 is (5 + 5 + 9) = 19

  Frame 3 is (9 + 0) = 9

  This means the current running total is 48.

  The tenth frame in the game is a special case. If someone throws a strike or a spare then they get a fill ball. 
  Fill balls exist to calculate the total of the 10th frame. Scoring a strike or spare on the fill ball does not give the player more fill balls. 
  The total value of the 10th frame is the total number of pins knocked down.

  For a tenth frame of X1/ (strike and a spare), the total value is 20.

  For a tenth frame of XXX (three strikes), the total value is 30.

  Requirements  :
  Write code to keep track of the score of a game of bowling. It should support two operations:

  * roll(pins : int) is called each time the player rolls a ball. The argument is the number of pins knocked down.
  * score(): int is called only at the very end of the game. It returns the total score for that game. 
  
  30-March-2023
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
class Game
{
    private $score = 0;
    private $roundTotal = 0;
    private $scoreArray = [];
    public function score(): int
    {
        if($this->validRoll())
        {
            for($i = 0; $i < sizeOf($this->scoreArray); $i++)
            {
                $this->score += $this->scoreArray[$i];
                if($i % 2 == 0 && $i < 18)
                {
                    //If Strike
                    if($this->scoreArray[$i] + $this->scoreArray[$i + 1] > 10)
                    {
                        throw new Exception();
                    }
                    else if($this->scoreArray[$i] == 10)
                    {
                        $this->score += $this->scoreArray[$i + 2];
                        if($this->scoreArray[$i + 2] == 10)
                        {
                            $this->score += $this->scoreArray[$i + 4];
                        }
                        else
                        {
                            $this->score += $this->scoreArray[$i + 3];
                        }
                    }
                    //If Spare
                    else if($this->scoreArray[$i] + $this->scoreArray[$i + 1] == 10)
                    {
                        $this->score += $this->scoreArray[$i + 2];
                    }
                }
                else if(sizeOf($this->scoreArray) == 21)
                {
                    $lastFrame = $this->scoreArray[18] + $this->scoreArray[19] + $this->scoreArray[20];
                    if($lastFrame > 20 && $lastFrame < 30)
                    throw new Exception();
                }
            }
        }
        else
            throw new Exception();
        return $this->score;
    }
    public function roll(int $pins): void
    {
        if($pins < 0 || $pins > 10)
        {
            throw new Exception();
        }
        $this->scoreArray[] = $pins;
        if($pins == 10 && sizeOf($this->scoreArray) <= 18)
            $this->scoreArray[] = 0;
    }
    public function validRoll(): bool
    {
        return (sizeOf($this->scoreArray) == 21 && array_sum($this->scoreArray) > 0) || (sizeOf($this->scoreArray) == 20 && ($this->scoreArray[18] != 10 && $this->scoreArray[18] + $this->scoreArray[19] < 10));
    }
}

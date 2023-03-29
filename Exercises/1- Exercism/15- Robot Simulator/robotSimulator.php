



/*
  # Instructions
  Write a robot simulator.

  A robot factory's test facility needs a program to verify robot movements.

  The robots have three possible movements:

  * turn right
  * turn left
  * advance
  
  Robots are placed on a hypothetical infinite grid, facing a particular direction (north, east, south, or west) at a set of {x,y} coordinates, e.g., {3,8}, with coordinates increasing to the north and east.

  The robot then receives a number of instructions, at which point the testing facility verifies the robot's new position, and in which direction it is pointing.

  * The letter-string "RAALAL" means:
    * Turn right
    * Advance twice
    * Turn left
    * Advance once
    * Turn left yet again
  Say a robot starts at {7, 3} facing north. Then running this stream of instructions should leave it at {9, 4} facing west.

  29-March-2023
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
class Robot
{
    public const DIRECTION_NORTH = 0;
    public const DIRECTION_EAST = 1;
    public const DIRECTION_SOUTH = 2;
    public const DIRECTION_WEST = 3;
    public function __construct(public array $position, public int $direction)
    {
    }
    public function turnRight(): self
    {
        $this->direction = ($this->direction + 1) % 4;
        return $this;
    }
    public function turnLeft(): self
    {
        $this->direction = ($this->direction + 3) % 4;
        return $this;
    }
    public function advance(): self
    {
        match ($this->direction) {
            self::DIRECTION_NORTH => $this->position[1]++,
            self::DIRECTION_EAST => $this->position[0]++,
            self::DIRECTION_SOUTH => $this->position[1]--,
            self::DIRECTION_WEST => $this->position[0]--
        };
        return $this;
    }
    public function instructions(string $instructions): void
    {
        if (!preg_match('/^[LRA]+$/', $instructions)) {
            throw new InvalidArgumentException();
        }
        foreach (str_split($instructions) as $instruction) {
            match ($instruction) {
                'L' => $this->turnLeft(),
                'R' => $this->turnRight(),
                'A' => $this->advance()
            };
        }
    }
}

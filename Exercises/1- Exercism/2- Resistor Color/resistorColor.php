



/*
  # Easy

  Instructions  :
  If you want to build something using a Raspberry Pi, you'll probably use resistors. For this exercise, you need to know two things about them:

  * Each resistor has a resistance value.
  * Resistors are small - so small in fact that if you printed the resistance value on them, it would be hard to read.

  To get around this problem, manufacturers print color-coded bands onto the resistors to denote their resistance values. 
Each band has a position and a numeric value.

  The first 2 bands of a resistor have a simple encoding scheme: each color maps to a single number.

  In this exercise you are going to create a helpful program so that you don't have to remember the values of the bands.

  These colors are encoded as follows:

  * Black: 0
  * Brown: 1
  * Red: 2
  * Orange: 3
  * Yellow: 4
  * Green: 5
  * Blue: 6
  * Violet: 7
  * Grey: 8
  * White: 9

  The goal of this exercise is to create a way:

  * to look up the numerical value associated with a particular color band
  * to list the different band colors

  Mnemonics map the colors to the numbers, that, when stored as an array, happen to map to their index in the array: 
  Better Be Right Or Your Great Big Values Go Wrong.
  
  28-March-2023
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
const COLORS = array(
    "black",
    "brown",
    "red",
    "orange",
    "yellow",
    "green",
    "blue",
    "violet",
    "grey",
    "white"
);
function colorCode(string $color): int
{
    return array_search($color, COLORS);
}

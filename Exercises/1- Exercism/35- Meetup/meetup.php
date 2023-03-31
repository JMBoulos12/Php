



/*
  Instructions
  Calculate the date of meetups.

  Typically meetups happen on the same day of the week. In this exercise, you will take a description of a meetup date, and return the actual meetup date.

  Examples of general descriptions are:

  * The first Monday of January 2017
  * The third Tuesday of January 2017
  * The wednesteenth of January 2017
  * The last Thursday of January 2017
  * The descriptors you are expected to parse are:
    first, second, third, fourth, fifth, last, monteenth, tuesteenth, wednesteenth, thursteenth, friteenth, saturteenth, sunteenth

  Note that "monteenth", "tuesteenth", etc are all made up words. 
  There was a meetup whose members realized that there are exactly 7 numbered days in a month that end in '-teenth'. 
  Therefore, one is guaranteed that each day of the week (Monday, Tuesday, ...) will have exactly one date that is named with '-teenth' in every month.

  Given examples of a meetup dates, each containing a month, day, year, and descriptor calculate the date of the actual meetup. 
  For example, if given "The first Monday of January 2017", the correct meetup date is 2017/1/2.
  
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
function meetup_day(int $year, int|string $month, string $which, string $weekday): DateTimeImmutable
{
    $month = (int)$month;
    $candidates = match ($which) {
        "teenth" => range(13, 19),
        "first" =>  range(1, 7),
        "second" => range(8, 14),
        "third" => range(15, 21),
        "fourth" => range(22, 28),
        "last" => range(22, 31)
    };
    $date = new DateTimeImmutable();
    $date = $date->setTime(0, 0, 0, 0);
    foreach (array_reverse($candidates) as $day) {
        $date = $date->setDate($year, $month, $day);
        if ($date->format("l") === $weekday && $date->format("n") == $month) {
            return $date;
        }
    }
}





/*
  # Instructions
  Determine if a word or phrase is an isogram.

  An isogram (also known as a "nonpattern word") is a word or phrase without a repeating letter, however spaces and hyphens are allowed to appear multiple times.

  Examples of isograms:

  * lumberjacks
  * background
  * downstream
  * six-year-old

  The word isograms, however, is not an isogram, because the s repeats.

  29-March-2023
*/


<?php
function isIsogram(string $str): bool
{
    $str = preg_replace('/(\s|-)/', '', $str);
    $arr = preg_split('//u', mb_strtolower($str), null, PREG_SPLIT_NO_EMPTY);
    return count($arr) === count(array_unique($arr));
}





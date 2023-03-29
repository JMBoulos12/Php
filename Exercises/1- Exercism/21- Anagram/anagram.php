



/*
  # Instructions
  An anagram is a rearrangement of letters to form a new word. Given a word and a list of candidates, select the sublist of anagrams of the given word.

  Given "listen" and a list of candidates like "enlists" "google" "inlets" "banana" the program should return a list containing "inlets".

  The skipped tests near the bottom of the anagram_test.php are Stretch Goals, they are optional. 
  They require the usage of mb_string functions, which aren't installed by default with every version of PHP.
  
  29-March-2023
*/


<?php
function detectAnagrams(string $word, array $candidates): array
{
    $word = mb_strtolower($word);
    $count = count_chars($word);
    return array_values(
        array_filter(
            $candidates,
            static function ($candidate) use ($word, $count) {
                $candidate = mb_strtolower($candidate);
                return $word !== $candidate && $count === count_chars($candidate);
            }
        )
    );
}

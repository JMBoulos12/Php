



/*
  # Instructions  :
  Each of us inherits from our biological parents a set of chemical instructions known as DNA that influence how our bodies are constructed. 
  All known life depends on DNA!

  # Note  : 
  You do not need to understand anything about nucleotides or DNA to complete this exercise.

  DNA is a long chain of other chemicals and the most important are the four nucleotides, adenine, cytosine, guanine and thymine. 
  A single DNA chain can contain billions of these four nucleotides and the order in which they occur is important! 
  We call the order of these nucleotides in a bit of DNA a "DNA sequence".

  We represent a DNA sequence as an ordered collection of these four nucleotides and a common way to do that is with a string of characters 
  such as "ATTACG" for a DNA sequence of 6 nucleotides. 'A' for adenine, 'C' for cytosine, 'G' for guanine, and 'T' for thymine.

  Given a string representing a DNA sequence, count how many of each nucleotide is present. 
  If the string contains characters that aren't A, C, G, or T then it is invalid and you should signal an error.

  For example :

  "GATTACA" -> 'A': 3, 'C': 1, 'G': 1, 'T': 2
  "INVALID" -> error
  
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
function nucleotideCount(string $nucleotide): array
{
    $nucleotideByteCounts = count_chars(strtolower($nucleotide), 1);
    $nucleotideCharCounts = ['a' => 0, 'c' => 0, 't' => 0, 'g' => 0];
    foreach ($nucleotideByteCounts as $byte => $count) {
        $nucleotideCharCounts[chr($byte)] = $count;
    }
    return $nucleotideCharCounts;
}

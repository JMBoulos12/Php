



/*
  # Instructions  :
  Given a DNA strand, return its RNA complement (per RNA transcription).

  Both DNA and RNA strands are a sequence of nucleotides.

  The four nucleotides found in DNA are adenine (A), cytosine (C), guanine (G) and thymine (T).

  The four nucleotides found in RNA are adenine (A), cytosine (C), guanine (G) and uracil (U).

  Given a DNA strand, its transcribed RNA strand is formed by replacing each nucleotide with its complement:

  G -> C
  C -> G
  T -> A
  A -> U
  
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
declare (strict_types = 1);
function toRna(string $dna): string
{
    return strtr($dna, ['G' => 'C', 'C' => 'G', 'T' => 'A', 'A' => 'U']);
}

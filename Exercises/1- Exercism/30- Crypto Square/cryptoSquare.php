



/*
  Instructions  :
  Implement the classic method for composing secret messages called a square code.

  Given an English text, output the encoded version of that text.

  First, the input is normalized: the spaces and punctuation are removed from the English text and the message is downcased.

  Then, the normalized characters are broken into rows. These rows can be regarded as forming a rectangle when printed with intervening newlines.

  For example, the sentence

  "If man was meant to stay on the ground, god would have given us roots."
  is normalized to:

  "ifmanwasmeanttostayonthegroundgodwouldhavegivenusroots"
  The plaintext should be organized in to a rectangle. 
  The size of the rectangle (r x c) should be decided by the length of the message, 
  such that c >= r and c - r <= 1, where c is the number of columns and r is the number of rows.

  Our normalized text is 54 characters long, dictating a rectangle with c = 8 and r = 7:

  "ifmanwas"
  "meanttos"
  "tayonthe"
  "groundgo"
  "dwouldha"
  "vegivenu"
  "sroots  "
  
  The coded message is obtained by reading down the columns going left to right.

  The message above is coded as:
  "imtgdvsfearwermayoogoanouuiontnnlvtwttddesaohghnsseoau"
  
  Output the encoded text in chunks that fill perfect rectangles (r X c), with c chunks of r length, separated by spaces. 
  For phrases that are n characters short of the perfect rectangle, pad each of the last n chunks with a single trailing space.

  "imtgdvs fearwer mayoogo anouuio ntnnlvt wttddes aohghn  sseoau "
  Notice that were we to stack these, we could visually decode the ciphertext back in to the original message:

  "imtgdvs"
  "fearwer"
  "mayoogo"
  "anouuio"
  "ntnnlvt"
  "wttddes"
  "aohghn "
  "sseoau "
  
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
function crypto_square(string $plaintext): string
{
    if ($plaintext=="") return "";
    $text="";
    for($i=0;$i<strlen($plaintext);$i++) {
        if (strpos(" @,%!.",substr($plaintext,$i,1))===false) {
            $text.=strtolower(substr($plaintext,$i,1));
        }
    }
    $r=intval(sqrt(strlen($text)));
    if ($r<1) $r=1;
    $c=intdiv(strlen($text),$r);
    if (($c-$r)>1) {$r++; $c--;}
    if ($r*$c<strlen($text)) $c++;
    $lines=array();
    for ($i=0;$i<$r;$i++) {
        array_push($lines,substr($text.str_repeat(" ",$c+2),$i*$c,$c));
    }
    $code="";
    $cc=0;
    for ($i=0;$i<$c;$i++) {
        for ($j=0;$j<$r;$j++) {
            if ($cc==$r) {
                $code.=" ";
                $cc=0;
            }
            $code.=substr($lines[$j],$i,1);
            $cc++;
        }
    }
    return $code;
}

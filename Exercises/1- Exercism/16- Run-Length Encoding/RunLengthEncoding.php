



/*
  # Instructions
  Implement run-length encoding and decoding.

  Run-length encoding (RLE) is a simple form of data compression, where runs (consecutive data elements) are replaced by just one data value and count.

  For example we can represent the original 53 characters with only 13.

  "WWWWWWWWWWWWBWWWWWWWWWWWWBBBWWWWWWWWWWWWWWWWWWWWWWWWB"  ->  "12WB12W3B24WB"
  RLE allows the original data to be perfectly reconstructed from the compressed data, which makes it a lossless data compression.

  "AABCCCDEEEE"  ->  "2AB3CD4E"  ->  "AABCCCDEEEE"
  For simplicity, you can assume that the unencoded string will only contain the letters A through Z (either lower or upper case) and whitespace. 
  This way data to be encoded will never contain any numbers and numbers inside data to be decoded always represent the count for the following character.

  29-March-2023
*/


<?php
function encode(string $input): string
{
    return preg_replace_callback(
        '/(.)\1+/', // https://regexr.com/5o980
        static function ($match) {
            return strlen($match[0]) . $match[1];
        },
        $input
    );
}
function decode(string $input): string
{
    return preg_replace_callback(
        '/(\d+)(\D)/', // https://regexr.com/5o97t
        static function ($match) {
            return str_repeat($match[2], $match[1]);
        },
        $input
    );
}





/*
  # Instructions  :
  Take a nested list and return a single flattened list with all values except nil/null.

  The challenge is to write a function that accepts an arbitrarily-deep nested list-like structure and returns a flattened structure without any nil/null values.

  For Example :

  input: [1,[2,3,null,4],[null],5]

  output: [1,2,3,4,5]
  
  04-April-2023
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
function flatten(array $input): array
{
    $flattened = [];
    foreach ($input as $el) {
        if (is_array($el)) {
            $flattened = array_merge($flattened, flatten($el));
        } elseif ($el !== null) {
            $flattened[] = $el;
        }
    }
    return $flattened;
}

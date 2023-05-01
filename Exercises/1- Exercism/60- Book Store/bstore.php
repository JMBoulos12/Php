



/**
  #Instructions
  To try and encourage more sales of different books from a popular 5 book series, a bookshop has decided to offer discounts on multiple book purchases.

  One copy of any of the five books costs $8.

  If, however, you buy two different books, you get a 5% discount on those two books.

  If you buy 3 different books, you get a 10% discount.

  If you buy 4 different books, you get a 20% discount.

  If you buy all 5, you get a 25% discount.

  Note: that if you buy four books, of which 3 are different titles, you get a 10% discount on the 3 that form part of a set, but the fourth book still costs $8.

  Your mission is to write a piece of code to calculate the price of any conceivable shopping basket (containing only books of the same series), giving as big a discount as possible.

  For example, how much does this basket of books cost?

  * 2 copies of the first book
  * 2 copies of the second book
  * 2 copies of the third book
  * 1 copy of the fourth book
  * 1 copy of the fifth book

  One way of grouping these 8 books is:

  * 1 group of 5 --> 25% discount (1st,2nd,3rd,4th,5th)
  * +1 group of 3 --> 10% discount (1st,2nd,3rd)

  This would give a total of:
  * 5 books at a 25% discount
  * +3 books at a 10% discount

  Resulting in:
  * 5 x (8 - 2.00) == 5 x 6.00 == $30.00
  * +3 x (8 - 0.80) == 3 x 7.20 == $21.60

  For a total of $51.60

  However, a different way to group these 8 books is:
  * 1 group of 4 books --> 20% discount (1st,2nd,3rd,4th)
  * +1 group of 4 books --> 20% discount (1st,2nd,3rd,5th)

  This would give a total of:
  * 4 books at a 20% discount
  * +4 books at a 20% discount

  Resulting in:
  * 4 x (8 - 1.60) == 4 x 6.40 == $25.60
  * +4 x (8 - 1.60) == 4 x 6.40 == $25.60

  For a total of $51.20

  And $51.20 is the price with the biggest discount. 
   
  01-May-2023
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
const PRICE = 8;
const DISCOUNTS = [0, 0, 5, 10, 20, 25];
$set = [];
function total(array $items): float
{
    $count = array_count_values($items);
    rsort($count);
    return minPrices($count);
}
function minPrices(array $items): float
{
    global $set;
    $key = implode(",", $items);
    if (!empty($set[$key])) {
        return $set[$key];
    }
    $prices = array_fill(0, count($items), 0);
    for ($i = 0; $i < count($items); $i++) {
        $prices[$i] = ($i + 1) * PRICE * (1 - DISCOUNTS[$i + 1] / 100)
            + minPrices(subtractSet($items, $i + 1));
    }
    return count($items) ? $set[$key] = min($prices) : 0;
}
function subtractSet(array $items, int $amount): array
{
    for ($i = 0; $i < $amount; $i++) {
        $items[$i]--;
    }
    rsort($items);
    return array_filter($items, fn ($item) => !!$item);
}

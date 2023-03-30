



/*
  # Instructions  :
  Correctly determine the fewest number of coins to be given to a customer such that the sum of the coins' value would equal the correct amount of change.

  # For example   :
  * An input of 15 with [1, 5, 10, 25, 100] should return one nickel (5) and one dime (10) or [5, 10]
  * An input of 40 with [1, 5, 10, 25, 100] should return one nickel (5) and one dime (10) and one quarter (25) or [5, 10, 25]

  # Edge cases    :
  * Does your algorithm work for any given set of coins?
  * Can you ask for negative change?
  * Can you ask for a change value smaller than the smallest coin value? 
  
  30-March-2023
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
function findFewestCoins(array $coins, int $amount): array
{
    if ($amount === 0) {
        return [];
    }
    if ($amount < 0) {
        throw new \InvalidArgumentException('Cannot make change for negative value');
    }
    if (min($coins) > $amount) {
        throw new \InvalidArgumentException('No coins small enough to make change');
    }
    $minCoinsRequired = array_fill(0, $amount + 1, INF);
    $lastCoin = array_fill(0, $amount + 1, 0);
    $minCoinsRequired[0] = 0;
    $lastCoin[0] = -1;
    foreach (range(1, $amount) as $change) {
        $finalResult = $minCoinsRequired[$change];
        foreach ($coins as $coin) {
            if ($coin <= $change) {
                $result = $minCoinsRequired[$change - $coin] + 1;
                if ($result < $finalResult) {
                    $finalResult = $result;
                    $lastCoin[$change] = $change - $coin;
                }
            }
        }
        $minCoinsRequired[$change] = $finalResult;
    }
    // no combination found
    if ($minCoinsRequired[$amount] === INF) {
        throw new InvalidArgumentException("No combination can add up to target");
    }
    $lastCoinValue = $amount;
    $changeCoins = [];
    while ($lastCoin[$lastCoinValue] !== -1) {
        $changeCoins[] = $lastCoinValue - $lastCoin[$lastCoinValue];
        $lastCoinValue = $lastCoin[$lastCoinValue];
    }
    return $changeCoins;
}

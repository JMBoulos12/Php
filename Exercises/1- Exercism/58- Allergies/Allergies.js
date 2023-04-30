



/**
  #Instructions
  Given a person's allergy score, determine whether or not they're allergic to a given item, and their full list of allergies.

  An allergy test produces a single numeric score which contains the information about all the allergies the person has (that they were tested for).

  The list of items (and their value) that were tested are:

  * eggs (1)
  * peanuts (2)
  * shellfish (4)
  * strawberries (8)
  * tomatoes (16)
  * chocolate (32)
  * pollen (64)
  * cats (128)
  
  So if Tom is allergic to peanuts and chocolate, he gets a score of 34.

  Now, given just that score of 34, your program should be able to say:

  * Whether Tom is allergic to any one of those allergens listed above.
  * All the allergens Tom is allergic to.
  
  Note: 
  a given score may include allergens not listed above (i.e. allergens that score 256, 512, 1024, etc.). 
  Your program should ignore those components of the score. For example, if the allergy score is 257, your program should only report the eggs (1) allergy.
  
  24-April-2023
*/


<?php
class Allergen
{
    public const EGGS = 1;
    public const PEANUTS = 2;
    public const SHELLFISH = 4;
    public const STRAWBERRIES = 8;
    public const TOMATOES = 16;
    public const CHOCOLATE = 32;
    public const POLLEN = 64;
    public const CATS = 128;
    public function __construct(private int $score)
    {
    }
    public static function allergenList(): array
    {
        return array_map(static function ($allergen) {
            return new Allergen($allergen);
        }, (new ReflectionClass(__CLASS__))->getConstants());
    }
    public function getScore(): int
    {
        return $this->score;
    }
}
class Allergies
{
    public function __construct(private int $input)
    {
    }
    public function isAllergicTo(Allergen $allergen): bool
    {
        return $this->input & $allergen->getScore();
    }
    public function getList(): array
    {
        return array_filter(Allergen::allergenList(), function ($allergen) {
            return $this->isAllergicTo($allergen);
        });
    }
}



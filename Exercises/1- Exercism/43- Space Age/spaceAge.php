



/*
  # Instructions  :
  Given an age in seconds, calculate how old someone would be on:

  * Mercury: orbital period 0.2408467 Earth years
  * Venus: orbital period 0.61519726 Earth years
  * Earth: orbital period 1.0 Earth years, 365.25 Earth days, or 31557600 seconds
  * Mars: orbital period 1.8808158 Earth years
  * Jupiter: orbital period 11.862615 Earth years
  * Saturn: orbital period 29.447498 Earth years
  * Uranus: orbital period 84.016846 Earth years
  * Neptune: orbital period 164.79132 Earth years
  
  So if you were told someone were 1,000,000,000 seconds old, you should be able to say that they're 31.69 Earth-years old.
  
  31-March-2023
*/


<?php
declare(strict_types=1);
class SpaceAge
{
public $seconds;
    public function __construct(int $seconds)
    {
        $this->seconds=$seconds;
    }
    public function seconds(): int
    {
       return $this->seconds;
    }
    public function earth(): float
    {
        return floatval(number_format($this->seconds/31557600, 2));
    }
    public function mercury(): float
    {
        return floatval(number_format($this->seconds/(0.2408467*60*60*24*365.25), 2));
    }
    public function venus(): float
    {
        return floatval(number_format($this->seconds/(0.61519726*60*60*24*365.25), 2));
    }
    public function mars(): float
    {
       return floatval(number_format($this->seconds/(1.8808158*60*60*24*365.25), 2));
    }
    public function jupiter(): float
    {
       return floatval(number_format($this->seconds/(11.862615*60*60*24*365.25), 2));
    }
    public function saturn(): float
    {
       return floatval(number_format($this->seconds/(29.447498*60*60*24*365.25), 2));
    }
    public function uranus(): float
    {
       return floatval(number_format($this->seconds/(84.016846*60*60*24*365.25), 2));
    }
    public function neptune(): float
    {
        return floatval(number_format($this->seconds/(164.79132*60*60*24*365.25), 2));
    }
}

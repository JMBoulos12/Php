



/*
  Instructions  :
  Implement a clock that handles times without dates.

  You should be able to add and subtract minutes to it.

  Two clocks that represent the same time should be equal to each other. 
  
  30-March-2023
*/


<?php
declare(strict_types=1);
class Clock
{
    private int $hour;
    private int $min;
    function __construct(int $hour, int $min = 0)
    {
        $this->hour = $hour % 24;
        $this->min = 0;
        $this->add($min);
    }
    public function add(int $minutes){
        $this->hour = ($this->hour + intval(($this->min + $minutes) / 60)) % 24;
        $this->min = ($this->min + $minutes) % 60;
        if ($this->min < 0){
            $this->hour = ($this->hour - 1) % 24;
            $this->min += 60;
        }
        if ($this->hour < 0) $this->hour += 24;
        return $this;
    }
    public function sub(int $minutes){
        return $this->add(-$minutes);
    }
    public function __toString(): string
    {
        return sprintf("%02d:%02d", $this->hour, $this->min);
    }
}

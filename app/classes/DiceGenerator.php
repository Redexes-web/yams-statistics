<?php
namespace App\Classes;
use App\Tools\Util;
class DiceGenerator
{
    private $dices = [];
    
    public function __construct(private $numberOfDices = 1 ,
                                private $min = 1,
                                private $max = 6, 
                                private $step=1
                                )
    {
        for ($i=1; $i <= $this->numberOfDices; $i++) { 
            $this->dices[$i] = $this->getDice();
        }
    }

    private function getDice(): int|float {
        return Util::randomNum($this->min,$this->max,$this->step);
    }
    
    /**
     * get return dices values 
     *
     * @return int[]
     */
    public function get(): array{
        return $this->dices;
    }
}
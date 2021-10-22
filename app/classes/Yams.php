<?php
namespace App\Classes;
class Yams
{
    private $results;
    private $numberOfDices = 5;
    public function __construct()
    {
        $this->start();
    }    
    /**
     * start
     *
     * @return self
     */
    private function start():void {
        $this->dices = $this->getDices();
        $this->results["dices"] = [$this->dices];
        $this->results["combinations"] = $this->getCombination();
    }    
    /**
     * getResults return an array the result of the Game with ["dices"] values and their ["combination"] name
     *
     * @return array
     */
    public function getResults(){
        return $this->results;
    }
    
    /**
     * getDices return an array with the result of each dice thanks to the diceThrower Class
     *
     * @return int[]
     */
    private function getDices() : array{
        return (new DiceGenerator($this->numberOfDices))->get();
    }
        
    /**
     * getCombination return a string with the type of combination the DiceThrower has done
     *
     * @return string
     */
    private function getCombination(): string {
        return (new DiceCombinationChecker($this->dices))->getDicesCombination();
    }

}
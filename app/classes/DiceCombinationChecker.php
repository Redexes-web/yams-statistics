<?php
namespace App\Classes;
Class DiceCombinationChecker {
    public function __construct(private $dices)
    {
        $this->combinations = (new DicesCombinations(count($this->dices)))->getAllCombination();
    }        
        /**
         * hasPairs check if the combination has at least 2 pairs of same value
         *
         * @return bool
         */
        public function hasPairs() : bool
    {
        $numOfPair = 0;
        foreach ($this->combinations[2] as $combinations) {
            if($this->dices[$combinations[0]] === $this->dices[$combinations[1]]){
                $numOfPair++;
            }
        }
        return $numOfPair === 2;
    }
    
    /**
     * hasThreeOfAKind check if the combination has a same value three times
     *
     * @return bool
     */
    public function hasThreeOfAKind() : bool
    {
        foreach ($this->combinations[3] as $combinations) {
             if($this->dices[$combinations[0]] 
                === $this->dices[$combinations[1]] 
                && $this->dices[$combinations[1]]
                === $this->dices[$combinations[2]]){
                return true;
            }
        }
        return false;
    }
    
    /**
     * hasEdge check if the combination has a same value four times
     *
     * @return bool
     */
    public function hasEdge() : bool
    {
        foreach ($this->combinations[4] as $combinations) {
             if($this->dices[$combinations[0]] 
                === $this->dices[$combinations[1]]
                && $this->dices[$combinations[1]] 
                === $this->dices[$combinations[2]] 
                && $this->dices[$combinations[2]]
                === $this->dices[$combinations[3]]){
                return true;
            }
        }
        return false;
    }
    
    /**
     * hasYamcheck if the combination has a same value five times
     *
     * @return bool
     */
    public function hasYam() : bool
    {
        $combinations = $this->combinations[5][0];
             if($this->dices[$combinations[0]] 
                === $this->dices[$combinations[1]] 
                && $this->dices[$combinations[1]]
                === $this->dices[$combinations[2]]
                && $this->dices[$combinations[2]]  
                === $this->dices[$combinations[3]] 
                && $this->dices[$combinations[3]]
                === $this->dices[$combinations[4]]){
                return true;
            }
        return false;
    }
    
    /**
     * getDicesCombination
     *
     * @return string
     */
    public function getDicesCombination(){
        
        if ($this->hasYam()) return "Yam";
        if($this->hasEdge()) return "Edge";
        if($this->hasThreeOfAKind()) return "Three";
        if($this->hasPairs()) return "Pairs";
        return "Nothing";
    }
}
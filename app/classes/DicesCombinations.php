<?php
namespace App\Classes;
Class DicesCombinations
{
    private $dices;
    private $n;
    private $result = [];
    public function __construct($numOfDices)
    {
        $this->dices = range(1, $numOfDices);
        $this->n = count($this->dices);
    }
    
    /**
     * setCombinationsList
     *
     * @param  string $start=''
     * @param  int[] $tags
     * @param  int $depth
     * @return void
     */
    private function setCombinationsList( array $tags, int $depth, string $start = "") : void
    {
       if($depth == 0) {
           $this->result[strlen($start)][] = str_split($start);
          return;
        }
        $n = count($tags);
        for($i=0; $i < $n; $i++) {
          $this->setCombinationsList(start : $start . $tags[$i], tags : array_slice($tags, $i + 1),depth :  $depth - 1);
        }
      }
            
      /**
       * getAllCombination
       *
       * @return array[]
       */
      public function getAllCombination() : array {
          for($i = 1; $i <= $this->n; $i++) 
          { 
            $this->setCombinationsList(tags: $this->dices, depth: $i);
          }
          return $this->result;
      }

}

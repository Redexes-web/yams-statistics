<?php
namespace App\Classes;
class YamsStatistics {
    public function __construct(private $numberOfTries)
    {
        
    }
    public function getResults() : array{
        $res=[];
        for ($i=0; $i < $this->numberOfTries ; $i++) { 
            $combinationName = (new Yams())->getResults()["combinations"];
            isset($res[$combinationName]) ? $res[$combinationName] ++ : $res[$combinationName] =1;
        }
        return $res;
    }
}
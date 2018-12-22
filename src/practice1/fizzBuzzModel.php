<?php
/**
 * class
 */
class FizzBuzzModel
{
    /**
     * @param int $n
     * @return string[] 
     */
    public function fizzBuzz($n)
    {
        return $this->fizzBuzzList($n);
    }

    /**
     * @param int $n
     * @return string[]
     */
    private function fizzBuzzList($n)
    {
        return array_map(function($x){
            if($x % 15 == 0){
                return "FizzBuzz";
            }else if($x % 3 == 0){
                return "Fizz";
            }else if($x % 5 == 0){
                return "Buzz";
            }else{
                return strval($x);
            }
        },range(1, $n));
    }
}

if(count($argv) > 1){
    var_dump((new FizzBuzzModel())->fizzBuzz($argv[1]));
}

<?php
/**
 1．Two Sum
Given an array of integers, return indices of the two numbers such that they add up to a specific target.

You may assume that each input would have exactly one solution, and you may not use the same element twice.

Example:

Given nums = [2, 7, 11, 15], target = 9,

Because nums[0] + nums[1] = 2 + 7 = 9,
return [0, 1].
 */
class TwoSumModel
{
    /**
     * @param int[] $searchList
     * @param int $targetNum
     * @return int[]|null
     */
    function twoSum($searchList, $targetNum)
    {
        $targetList = array_filter($searchList, function($num){
            return $nun <= $targetNum;
        });
        foreach($targetList as $index => $v){
            $anotherNum = $targetNum - $v;
            $restList = array_filter($targetList, function($value, $key){
                return $index != $key;
            },ARRAY_FILTER_USE_BOTH);
            $findIndex = array_search($anotherNum, $restList);
            if($findIndex !== false){
                return [$index, $findIndex];
            }
        }
        return null;
    }
}

$result = (new TwoSumModel())->twoSum([3,7,11,15], 14);
var_dump($result);
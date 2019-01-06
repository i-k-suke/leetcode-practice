<?php
/**
Given an array of size n, find the majority element. The majority element is the element that appears more than ⌊ n/2 ⌋ times.

You may assume that the array is non-empty and the majority element always exist in the array.

Example 1:

Input: [3,2,3]
Output: 3
Example 2:

Input: [2,2,1,1,1,2,2]
Output: 2
 * 
 */
class MajorityElement
{
    public function findMajorityElement(array $elements)
    {
        $elemAppearCount = [];
        array_map(function($elm) use(&$elemAppearCount){
            if(empty($elemAppearCount[$elm])){
                $elemAppearCount[$elm] = 0;
            }
            $elemAppearCount[$elm]++;
        }, $elements);

        $elemNum = floor(array_sum($elemAppearCount)/2);
        $result = array_filter($elemAppearCount, function($appearCount)use($elemNum){
            return $appearCount > $elemNum;
        });
        return current(array_keys($result)); 
    }
}

//$input = [3,2,3];
//$input = [2,2,1,1,1,2,2];
$input = [5,5,4,3,3,2,2,1,1,1,1,1,1,1,1];
echo (new MajorityElement())->findMajorityElement($input);
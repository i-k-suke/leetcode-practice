<?php
/**
 * 
 953. Verifying an Alien Dictionary

 In an alien language, surprisingly they also use english lowercase letters, but possibly in a different order. The order of the alphabet is some permutation of lowercase letters.

Given a sequence of words written in the alien language, and the order of the alphabet, return true if and only if the given words are sorted lexicographicaly in this alien language.

 

Example 1:

Input: words = ["hello","leetcode"], order = "hlabcdefgijkmnopqrstuvwxyz"
Output: true
Explanation: As 'h' comes before 'l' in this language, then the sequence is sorted.

Example 2:
Input: words = ["word","world","row"], order = "worldabcefghijkmnpqstuvxyz"
Output: false
Explanation: As 'd' comes after 'l' in this language, then words[0] > words[1], hence the sequence is unsorted.

Example 3:
Input: words = ["apple","app"], order = "abcdefghijklmnopqrstuvwxyz"
Output: false
Explanation: The first three characters "app" match, and the second string is shorter (in size.) According to lexicographical rules "apple" > "app", because 'l' > '∅', where '∅' is defined as the blank character which is less than any other character (More info).
 

Note:

1 <= words.length <= 100
1 <= words[i].length <= 20
order.length == 26
All characters in words[i] and order are english lowercase letters.
 */

class AlienDictionary
{
    /**
     * @var int[] $order
     */
    private $order = [];

    public function __construct($order)
    {
        // exchange key-value
        $this->order = array_flip(str_split($order));
    }

    public function verifyWords(array $inputWords)
    {
        $baseWord = $this->convertCharToOrderNo(array_shift($inputWords));

        if(empty($baseWord)){
            return false;
        }

        foreach($inputWords as $words){
            $convWords = $this->convertCharToOrderNo($words);
            for($i = 0; $i < count($baseWord); $i++){
                // check first word
                if($i == 0 && ($baseWord[0] < $convWords[0])){
                    break;
                }
                // not exists
                if(empty($convWords[$i])){
                    return false;
                }
                // lexicoggraphical rules
                if($baseWord[$i] > $convWords[$i]){
                    return false;
                }
            }
        }
        return true;
    }

    /**
     * 
     * @param string
     * @return int[string]
     */
    private function convertCharToOrderNo($words)
    {
        if(empty($words)){
            return [];
        }
        return array_map(function($char){
            return $this->order[$char];
        },str_split($words));
    }
}

//$words = ["hello","leetcode"];
//$order = "hlabcdefgijkmnopqrstuvwxyz";

//$words = ["word","world","row"];
//$order = "worldabcefghijkmnpqstuvxyz";

$words = ["apple","app"];
$order = "abcdefghijklmnopqrstuvwxyz";

$result = (new AlienDictionary($order))->verifyWords($words);

echo "Output: ". ($result ? "True": "False");

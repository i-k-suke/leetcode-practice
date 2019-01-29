<?php
/**
Write an efficient algorithm that searches for a value in an m x n matrix. This matrix has the following properties:

Integers in each row are sorted in ascending from left to right.
Integers in each column are sorted in ascending from top to bottom.
Example:

Consider the following matrix:

[
  [1,   4,  7, 11, 15],
  [2,   5,  8, 12, 19],
  [3,   6,  9, 16, 22],
  [10, 13, 14, 17, 24],
  [18, 21, 23, 26, 30]
]
Given target = 5, return true.

Given target = 20, return false.
 */

 class Search2DMatrix
 {
   /**
    * @param int[][] $matrix
    * @param int $target
    * @return bool
    */
     public function searchMatrix(array $matrix, $target)
     {
        foreach($matrix as $row){
          if(array_search($target, $row) !== false){
              return true;
          }
        }
        return false;
     }
 }


 $dataList = [
  [1,   4,  7, 11, 15],
  [2,   5,  8, 12, 19],
  [3,   6,  9, 16, 22],
  [10, 13, 14, 17, 24],
  [18, 21, 23, 26, 30]
 ];

 $model = new Search2DMatrix();
 $result = $model->searchMatrix($dataList, 5);
 var_dump($result);
 $result = $model->searchMatrix($dataList, 20);
 var_dump($result);

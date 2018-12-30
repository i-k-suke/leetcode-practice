<?php
/**
 Given a matrix A, return the transpose of A.

The transpose of a matrix is the matrix flipped over it's main diagonal, switching the row and column indices of the matrix.

 

Example 1:

Input: [[1,2,3],[4,5,6],[7,8,9]]
Output: [[1,4,7],[2,5,8],[3,6,9]]
Example 2:

Input: [[1,2,3],[4,5,6]]
Output: [[1,4],[2,5],[3,6]]
 */
class TransposeMatrix
{
    public function transpose(array $matrix)
    {
        $t_matrix = [];
        foreach($matrix as $rowNum => $row){
            foreach($row as $colNum => $val){
                if(empty($t_matrix[$colNum])){
                    $t_matrix[$colNum] = [];
                }
                $t_matrix[$colNum][] = $val;
            }
        }
        $this->outputMatrix($t_matrix);
    }

    public function outputMatrix(array $matrix)
    {
        foreach($matrix as $row){
            echo sprintf("%s\n",implode(" ", $row));
        }
        echo "\n";
    }
}


$input = [[10,11,12],[13,14,15],[16,17,18],[19,20,21]];
$dto = new TransposeMatrix();
$dto->outputMatrix($input);
$dto->transpose($input);

<?php
/**
The maximum depth is the number of nodes along the longest path from the root node down to the farthest leaf node.

Note: A leaf is a node with no children.

Example:

Given binary tree [3,9,20,null,null,15,7],

    3
   / \
  9  20
    /  \
   15   7
return its depth = 3.
 */
class MaximumDepthOfBinaryTree
{
    private $nodes;

    public function __construct(array $nodes)
    {
        $this->nodes = $nodes;
    }

    /**
     * @return int
     */
    public function maxDepth()
    {
        return log(count($this->nodes) + 1, 2);
    }
}

//$nodes = [3,9,20,null,null,15,7];
//$nodes = [3,9,20,4,5,null,7,8,9,10,11,12,13,14,15];
$nodes = [3];
echo (new MaximumDepthOfBinaryTree($nodes))->maxDepth();
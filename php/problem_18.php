<?php
/*
Problem: Maximum Path Sum I


By starting at the top of the triangle below and moving to adjacent numbers on the row below, the maximum total from top to bottom is 23.

3
7 4
2 4 6
8 5 9 3

That is, 3 + 7 + 4 + 9 = 23.

Find the maximum total from top to bottom of the triangle below:

75
95 64
17 47 82
18 35 87 10
20 04 82 47 65
19 01 23 75 03 34
88 02 77 73 07 63 67
99 65 04 28 06 16 70 92
41 41 26 56 83 40 80 70 33
41 48 72 33 47 32 37 16 94 29
53 71 44 65 25 43 91 52 97 51 14
70 11 33 28 77 73 17 78 39 68 17 57
91 71 52 38 17 14 91 43 58 50 27 29 48
63 66 04 68 89 53 67 30 73 16 69 87 40 31
04 62 98 27 23 09 70 98 73 93 38 53 60 04 23

NOTE: As there are only 16384 routes, it is possible to solve this problem by trying every route. However, Problem 67, is the same challenge with a triangle containing one-hundred rows; it cannot be solved by brute force, and requires a clever method! ;o)



https://projecteuler.net/problem=18

https://github.com/AbdullahAlfaraj/project-euler/
by Abdullah Alfaraj
*/


//every element in the triangle has two parents and two children
class TriElement
{
	public $value = 0;
	public $left_parent_value = null;
	public $right_parent_value = null;
	
	public $left_parent_ref = null;
	public $right_parent_ref = null;
	
	public $left_child_ref = null;
	public $right_child_ref = null;

	function __construct($value,$left_parent_ref,$right_parent_ref)
	{
		$this->value = $value;
		if($left_parent_ref != null)
		{
			$left_parent_ref->right_child_ref = $this;
		}
		if($right_parent_ref != null)
		{
			$right_parent_ref->left_child_ref = $this;
		}
		$this->left_parent_value = null;
		$this->right_parent_value = null;

	}

	//attach the children
	function addChild($left_child_ref,$right_child_ref)
	{
		if($left_child_ref != null)
		{
			$left_child_ref->right_parent_ref = $this;
			$this->left_child_ref = $left_child_ref;
		}
		if($right_child_ref != null)
		{		
			$right_child_ref->left_parent_ref = $this;
			$this->right_child_ref = $right_child_ref;
			
		}
	}
	//update the value with adding the value of the greatest parrent 
	public function updateValue(){

		$this->value += (int)max($this->left_parent_value,$this->right_parent_value);
	}
	//send the value to its children
	public function sendValue()
	{
		$this->updateValue();
		if($this->left_child_ref != null)
		{
			$this->left_child_ref->right_parent_value = $this->value;
			// $left_child_ref->sendValue();
		}
		if($this->right_child_ref != null){

			$this->right_child_ref->left_parent_value = $this->value;
		}

		return $this->value;
	}

}


//convert every element in the 2d array of triangle to a node in a graph.
//each node has two parrents and two children.
//root node has two children but no parrents.
function iniTriGraph($tri_A)
{
	$tri_graph = [];

	//create the nodes of the graph
	foreach($tri_A as $i => $row)
	{
		$tri_graph[$i] =[];
		foreach($row as $j=> $val)
		{
			$tri_graph[$i][$j] = new TriElement($val,null,null); 

		}

	}

	//assign the parents and children relationship to each node 
	for($i = 0; $i < count($tri_graph)-1;++$i)
	{
		$row = $tri_graph[$i];
		$next_row = $tri_graph[$i+1];
		for($j = 0; $j < count($row);++$j)
		{
			$left_child = $next_row[$j];
			$right_child = $next_row[$j+1];
			$row[$j]->addChild($left_child,$right_child);

		}

	}

	return $tri_graph;


}

//calculate the maximum route value 
function maxRouteVal($tri_graph)
{
	$maxVal = 0;
	for($i = 0; $i < count($tri_graph);++$i)
	{
		$row = $tri_graph[$i];

		for($j = 0; $j < count($row);++$j)
		{
			$currVal = $row[$j]->sendValue();
			if($currVal > $maxVal)
				$maxVal = $currVal;			
		}

	}

	return $maxVal;

}

//create a 2d triangle array from a string
function initTriArray($tri_str)
{
	$tri_A = explode("\n",$tri_str);
	for($i = 0; $i < count($tri_A); ++$i)
	{
		$tri_A[$i] = explode(" ",$tri_A[$i]); 

	}
	return $tri_A;
}

$tri_str = 
"75
95 64
17 47 82
18 35 87 10
20 04 82 47 65
19 01 23 75 03 34
88 02 77 73 07 63 67
99 65 04 28 06 16 70 92
41 41 26 56 83 40 80 70 33
41 48 72 33 47 32 37 16 94 29
53 71 44 65 25 43 91 52 97 51 14
70 11 33 28 77 73 17 78 39 68 17 57
91 71 52 38 17 14 91 43 58 50 27 29 48
63 66 04 68 89 53 67 30 73 16 69 87 40 31
04 62 98 27 23 09 70 98 73 93 38 53 60 04 23";
// $tri_str=
// "3
// 7 4
// 2 4 6
// 8 5 9 3";


$tri_A = initTriArray($tri_str);

$tri_graph = iniTriGraph($tri_A);
$maxVal = maxRouteVal($tri_graph);
echo "maximum route value: $maxVal \n";  

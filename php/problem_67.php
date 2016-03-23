<?php
/*
Problem: Maximum path sum II


By starting at the top of the triangle below and moving to adjacent numbers on the row below, the maximum total from top to bottom is 23.

3
7 4
2 4 6
8 5 9 3

That is, 3 + 7 + 4 + 9 = 23.

Find the maximum total from top to bottom in triangle.txt (right click and 'Save Link/Target As...'), a 15K text file containing a triangle with one-hundred rows.

NOTE: This is a much more difficult version of Problem 18. It is not possible to try every route to solve this problem, as there are 299 altogether! If you could check one trillion (1012) routes every second it would take over twenty billion years to check them all. There is an efficient algorithm to solve it. ;o)

Note: the data file path is "../data/p067_triangle.txt"


https://projecteuler.net/problem=67

https://github.com/AbdullahAlfaraj/project-euler/
by Abdullah Alfaraj
*/

$filename = "../data/p067_triangle.txt";

$file = fopen($filename,"r") or die("Unable to open file!");
$tri_str = fread($file,filesize($filename));

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

	public function updateValue(){

		$this->value += (int)max($this->left_parent_value,$this->right_parent_value);
	}

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


function iniTriGraph($root,$tri_A)
{
	$tri_graph = [];

	//create the nodes
	foreach($tri_A as $i => $row)
	{
		$tri_graph[$i] =[];
		foreach($row as $j=> $val)
		{
			$tri_graph[$i][$j] = new TriElement($val,null,null); 

		}

	}

	//assign the parents to each node 
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

	$maxVal = 0;
	for($i = 0; $i < count($tri_graph);++$i)
	{
		$row = $tri_graph[$i];

		for($j = 0; $j < count($row);++$j)
		{

			$tempVal = $row[$j]->sendValue();
			if($tempVal > $maxVal)
				$maxVal = $tempVal;
			echo "tempVal $tempVal\n";
		}

	}

	// echo print_r($tri_graph[0][0]) ."\n";

	echo "maxVal: $maxVal \n";
	//echo "graph:".print_r($tri_graph)."\n";
	// for($i = 1; $i < count($tri_A) - 1;++$i)
	// {
	// 	$row = $tri_A[$i];
	// 	//for every value in the row we create an element 
	// 	for($j = 0; $j < count($row); ++$j)
	// 	{
	// 		new TriElement($row[$j],$left_parent_ref,$right_parent_ref);
	// 	}


	// }
}
function initTriArray($tri_str)
{
	$tri_A = explode("\n",$tri_str);
	for($i = 0; $i < count($tri_A); ++$i)
	{
		$tri_A[$i] = explode(" ",$tri_A[$i]); 

	}
	return $tri_A;
}

$tri_A = initTriArray($tri_str);

iniTriGraph($root,$tri_A);
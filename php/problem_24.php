<?php
/*
Problem: Lexicographic Permutations

A permutation is an ordered arrangement of objects. For example, 3124 is one possible permutation of the digits 1, 2, 3 and 4. If all of the permutations are listed numerically or alphabetically, we call it lexicographic order. The lexicographic permutations of 0, 1 and 2 are:

012   021   102   120   201   210

What is the millionth lexicographic permutation of the digits 0, 1, 2, 3, 4, 5, 6, 7, 8 and 9?



https://projecteuler.net/problem=24

https://github.com/AbdullahAlfaraj/project-euler/
by Abdullah Alfaraj
*/

//swap two chars in a string 
function swapChar($str,$i,$j)
{
	$temp = $str[$i];
	$str[$i] = $str[$j];
	$str[$j] = $temp; 
	return 	$str;
}
//recurrsivly find all permutation
function findPermutations($str,$currIdx, &$permArr)
{
	if($currIdx >= strlen($str))
	{
		echo "$str\n";
		$permArr[] = $str;
		return ;
	}

	for($i = $currIdx; $i < strlen($str);++$i)
	{

		$newStr = swapChar($str,$currIdx,$i); 
		
		findPermutations($newStr,$currIdx+1,$permArr);
	}

}

$permArr = [];
$str = "0123456789";

findPermutations($str,0,$permArr);
$index = 1000000;

sort($permArr);
echo "the millionth permutation: ".$permArr[$index -1]."\n";
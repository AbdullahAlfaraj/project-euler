<?php

/*
Problem: Smallest multiple
2520 is the smallest number that can be divided by each of the numbers from 1 to 10 without any remainder.

What is the smallest positive number that is evenly divisible by all of the numbers from 1 to 20?



https://github.com/AbdullahAlfaraj/project-euler/
by Abdullah Alfaraj
*/



//check if $num is evenlly divisible by all numbers within range [$min,$max]  
function isDivisible($num,$min,$max)
{
	$i = $max;

	for($i = $max; $i >= $min; --$i)
	{

		if($num % $i !== 0)
			return false;

	}
	return true;
}

//find the smallest positive number that is evenly divisible by all of the numbers in range [$min, $max]
//start from $num = $max, and keep incrementing $num by $max every time we fail. 
function smallestPosDivisNum($min,$max)
{
	$num = $max;
	while(!isDivisible($num, $min, $max))
	{
		$num +=$max;
	}
	return $num;
}



$min = 1;
$max = 20;

echo "the smallest positive number that is evenly divisible by all of the numbers in range [$min, $max]: ";
echo smallestPosDivisNum($min,$max) ."\n";

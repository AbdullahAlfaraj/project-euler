<?php
/*
Problem: Non-Abundant Sums

A perfect number is a number for which the sum of its proper divisors is exactly equal to the number. For example, the sum of the proper divisors of 28 would be 1 + 2 + 4 + 7 + 14 = 28, which means that 28 is a perfect number.

A number n is called deficient if the sum of its proper divisors is less than n and it is called abundant if this sum exceeds n.

As 12 is the smallest abundant number, 1 + 2 + 3 + 4 + 6 = 16, the smallest number that can be written as the sum of two abundant numbers is 24. By mathematical analysis, it can be shown that all integers greater than 28123 can be written as the sum of two abundant numbers. However, this upper limit cannot be reduced any further by analysis even though it is known that the greatest number that cannot be expressed as the sum of two abundant numbers is less than this limit.

Find the sum of all the positive integers which cannot be written as the sum of two abundant numbers.



https://projecteuler.net/problem=23

https://github.com/AbdullahAlfaraj/project-euler/
by Abdullah Alfaraj
*/


//return the sum of the proper divisiors of the number $n 
function sumProperDivisors($n)
{

	if($n <= 1)
		return 0;

	$sum = 1;//the first divisor num "1"
	for($i = 2; $i < sqrt($n);++$i)
	{
		if($n % $i == 0)
		{
			$sum += $i;
			$sum += $n/$i;
		}
	}
	//check if $n is a perfect square
	$sqrt_n = (int)sqrt($n);
	if($sqrt_n == sqrt($n))//if true then $n is divisable by sqrt($n)
	{
		$sum += $sqrt_n;
	}
	return $sum;
}

//is $n an abundant number  
function isAbundant($n)
{

	return sumProperDivisors($n) > $n; 
}


//return all numbers $n < $upper_limit and $n cannot be written as the sum of two abundant numbers
function isSumOfTwoAbundNums($upper_limit, $abundNums)
{
	$sum = 0;

	$bSumAbundNums =  array_fill(0, $upper_limit, false);

	for($i = 0; $i < count($abundNums);++$i)
	{

		for($j = $i; $j < count($abundNums);++$j)
		{
			$n = $abundNums[$i] + $abundNums[$j];
			if($n > $upper_limit)
				break;
			$bSumAbundNums[$n] = true;


			
		}
	}

	return $bSumAbundNums;
}






$upperLimit = 28123;
//list of all abundant numbers
$abundNums = [];
// find all abundant numbers 
for($i = 1; $i <= $upperLimit;++$i)
{
	if(isAbundant($i))
		$abundNums[] = $i;

}


$bSumArray = isSumOfTwoAbundNums($upperLimit,$abundNums);

$sum = 0;
for($i = 0; $i < count($bSumArray);++$i)
{
	if(!$bSumArray[$i])//sum only the ones that cant be written as sum of two abundant numbers
		$sum += $i;


}

echo "the sum: $sum \n";
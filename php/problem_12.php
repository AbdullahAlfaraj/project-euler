<?php
/*
Problem: Highly Divisible Triangular Number

The sequence of triangle numbers is generated by adding the natural numbers. So the 7th triangle number would be 1 + 2 + 3 + 4 + 5 + 6 + 7 = 28. The first ten terms would be:

											1, 3, 6, 10, 15, 21, 28, 36, 45, 55, ...

Let us list the factors of the first seven triangle numbers:

     1: 1
     3: 1,3
     6: 1,2,3,6
    10: 1,2,5,10
    15: 1,3,5,15
    21: 1,3,7,21
    28: 1,2,4,7,14,28

We can see that 28 is the first triangle number to have over five divisors.

What is the value of the first triangle number to have over five hundred divisors?



https://projecteuler.net/problem=12

https://github.com/AbdullahAlfaraj/project-euler/
by Abdullah Alfaraj
*/


//count the number of factors the number $N has
function numOfFactors($N)
{
	$count = 0;
	for($i = 1;$i < sqrt($N); ++$i)
	{
		if($N % $i == 0)
			$count += 2;
	}

	// all numbers except square numbers have even number of factors
	// if $N is square number only count the divisor once 
	if($N % sqrt($N) == 0)
		$count += 1;
	
	return $count;
}


//find the first triangular number such that, its number of divisors is greater than $limit
function smallestTriNumWithOverLimitFactors($limit)
{
	$currTri = 0; 

	for($i = 1, $countFactors = 1; $countFactors <= $limit; ++$i)
	{
		//calculate the new Triangular number.
		$currTri += $i;
		//count the number of factors of $currTri.
		$countFactors = numOfFactors($currTri);

	}

	return $currTri;
}

//more than 500 divisors
$numFactors = 500;

echo "the first Triangular number to have over $numFactors divisors: ";
echo  smallestTriNumWithOverLimitFactors($numFactors) ."\n";
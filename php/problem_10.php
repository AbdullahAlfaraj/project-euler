<?php
/*
Problem: Summation of Primes

The sum of the primes below 10 is 2 + 3 + 5 + 7 = 17.

Find the sum of all the primes below two million.



https://projecteuler.net/problem=10

https://github.com/AbdullahAlfaraj/project-euler/
by Abdullah Alfaraj
*/


//check if a number is a prime.
//only check up to sqrt($num).
//2 is the smallest prime.
function isPrime($num) {

	$i = 2;
	$sqrt_num = sqrt($num);
	while ($i <= $sqrt_num) {
		if ($num % $i == 0)
			return false;

		++$i;
	}
	return true;
}


//sum all prime number in range [2,$num)
function sumAllPrimesLessThan($num) {
	$i = 2;
	$sum = 0;

	//for every number $i check if $i is a prime or not
	for($i = 2; $i < $num; ++$i)
	{
		if(isPrime($i))
		{
			$sum += $i;
		}

	}

	return $sum;
}


$upper_limit = 2000000;

$sum = sumAllPrimesLessThan($upper_limit);
echo "sum of all primes less than $upper_limit: $sum \n";


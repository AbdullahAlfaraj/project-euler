<?php
/*
Problem: Amicable Numbers

Let d(n) be defined as the sum of proper divisors of n (numbers less than n which divide evenly into n).
If d(a) = b and d(b) = a, where a ≠ b, then a and b are an amicable pair and each of a and b are called amicable numbers.

For example, the proper divisors of 220 are 1, 2, 4, 5, 10, 11, 20, 22, 44, 55 and 110; therefore d(220) = 284. The proper divisors of 284 are 1, 2, 4, 71 and 142; so d(284) = 220.

Evaluate the sum of all the amicable numbers under 10000.



https://projecteuler.net/problem=21

https://github.com/AbdullahAlfaraj/project-euler/
by Abdullah Alfaraj
*/

//return a list of divisors of the number $n
function allDivisors($n)
{
	$divisors = [];
	for($i = 1;$i < sqrt($n);++$i)
	{
		if($n % $i == 0)
		{
			$divisors[] = $i;
			$divisors[] = $n / $i;
		}
	}
	//check if $n is a perfect square number
	$sqrt_n = (int)sqrt($n); 
	if(sqrt($n) == $sqrt_n)
	{	//only list sqrt($n) once
		$divisors[] = sqrt($n);
	}

	return $divisors;

}

//return the sum of the divisiors of the number $n
function sumAllDivisors($n)
{
	return array_sum(allDivisors($n));
}

function sumProperDivisors($n)
{
	return sumAllDivisors($n) - $n;
}

//check if the number $n is an amicable number
function isAmicableNum($n)
{
	//find the proper divisors sum of $n
	$n2 = sumProperDivisors($n);
	
	return ($n != $n2) && ($n === sumProperDivisors($n2));
}


$sum = 0;
$limit = 10000; 
for($i = 1; $i < $limit;++$i)
{
	if(isAmicableNum($i)){
		// echo "$i is amicable number \n";
		$sum += $i;
	}
	
}
echo "the sum of all the amicable numbers under $limit: $sum \n";




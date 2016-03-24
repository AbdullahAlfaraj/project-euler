<?php
/*
Problem: Factorial Digit Sum

n! means n × (n − 1) × ... × 3 × 2 × 1

For example, 10! = 10 × 9 × ... × 3 × 2 × 1 = 3628800,
and the sum of the digits in the number 10! is 3 + 6 + 2 + 8 + 8 + 0 + 0 = 27.

Find the sum of the digits in the number 100!



https://projecteuler.net/problem=20

https://github.com/AbdullahAlfaraj/project-euler/
by Abdullah Alfaraj
*/



//return the factorial of the number $n
//return type will be string
function factLarge($n)
{
	$product = 1;
	for($i = $n; $i > 0;--$i)
	{
		$product = bcmul($product, $i);//large number product
	}
	return $product;
}

$n = 100;

$factNum = factLarge($n);
$digitSum = array_sum(str_split($factNum));
echo "the sum of the digits of the number $n!: $digitSum \n";

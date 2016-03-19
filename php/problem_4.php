<?php

/*
Problem: Largest palindrome product

A palindromic number reads the same both ways. The largest palindrome made from the product of two 2-digit numbers is 9009 = 91 × 99.

Find the largest palindrome made from the product of two 3-digit numbers.



https://github.com/AbdullahAlfaraj/project-euler/
by Abdullah Alfaraj
*/



//check if a number is palindrome or not
function isPalind($num) {

	//convert num to string and check if string is equal reverse string
    $str_num = (string) $num;
    $rev_str = strrev($str_num);
    return ($str_num == $rev_str);
}



//return the largest palindrome number within a range,
//return null if no such number exist.
function allPalindNums($min,$max)
{
	$c1 = $c2 = $max;
	$max_val =  null;
	for($c2  = $max; $c2 >= $min; --$c2)
	{
		// echo "$c2, ".$c2*$c2.", $max_val \n"; 
		for($c1 = $c2; $c1 >= $min; --$c1)
		{
			$product = $c1 * $c2;
			if(isPalind($product) && $product > $max_val)
				$max_val = $product;
		}

		//since $c2 * $c2 is the current maximum product. The following is always true ($c2 * $c1) < ($c2 * $c2).   
		//Therefore, we should stop when the $max_val is greater than the maximum product.
		//because no new product will be larger than $max_val 
		if($c2*$c2 < $max_val)
			break;
	} 

	return $max_val;
}


$min = 100;
$max = 999;

$max_palind = allPalindNums($min,$max);

echo "largest Palindrom product of two numbers in the range of [$min,$max] : $max_palind \n";
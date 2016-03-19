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
		  
		for($c1 = $max; $c1 >= $min; --$c1)
		{
			$product = $c1 * $c2;
			if(isPalind($product) && $product > $max_val)
				$max_val = $product;
		}


	} 

	return $max_val;
}


$min = 100;
$max = 999;

$max_palind = allPalindNums($min,$max);

echo "largest Palindrom product of two numbers in the range of [$min,$max] : $max_palind \n";
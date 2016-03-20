<?php
/*
Problem: Special Pythagorean Triplet

A Pythagorean triplet is a set of three natural numbers, a < b < c, for which,
a^2 + b^2 = c^2

For example, 3^2 + 4^2 = 9 + 16 = 25 = 5^2.

There exists exactly one Pythagorean triplet for which a + b + c = 1000.
Find the product abc.



https://projecteuler.net/problem=9

https://github.com/AbdullahAlfaraj/project-euler/
by Abdullah Alfaraj
*/


//return true if the three numbers has pythagorean relationship
function isPythagorean($a,$b,$c)
{
	return ($a*$a + $b*$b == $c*$c);  
}

//Giving a number $a and a sum $sum_abc. Try to
//find two other numbers $b and $c such that,
//$a,$b and $c have pythagorean relation.
//Also the sum $a + $b + $c == $sum_abc. 

function constAPythagoreanTriplet($sum_abc,$a)
{
	$b = $a + 1;
	$c = $sum_abc -$a-$b;
	for($b = $a + 1,$c = $sum_abc - $a-$b; $b < $c; ++$b, --$c)
	{
		if(isPythagorean($a,$b,$c))
			return [$a,$b,$c];

	}
	return [];//no such releationship exist.
}


//find the pythagorean triplet and return their product
//if no such triplet exist return 0 
function pythagoreanTripletProduct($sum_abc)
{

	$min_sum = 0;
	for($a = 1; $min_sum < $sum_abc; ++$a)
	{
				
		$triplet = constAPythagoreanTriplet($sum_abc,$a);
		if(!empty($triplet))
			return array_product($triplet);

		//to meet the condition that $a < $b < $c
		$b = $a + 1;//min $b value
		$c = $b + 1;// min $c value
		$min_sum = $a + $b + $c;//minimum possible sum
		
	}   

	return 0; 
}


$product = pythagoreanTripletProduct(1000);
echo "Pythagorean triplet product: $product \n";
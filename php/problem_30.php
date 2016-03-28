<?php
/*
Problem: Digit Fifth Powers

Surprisingly there are only three numbers that can be written as the sum of fourth powers of their digits:

    1634 = 1^4 + 6^4 + 3^4 + 4^4
    8208 = 8^4 + 2^4 + 0^4 + 8^4
    9474 = 9^4 + 4^4 + 7^4 + 4^4

As 1 = 14 is not a sum it is not included.

The sum of these numbers is 1634 + 8208 + 9474 = 19316.

Find the sum of all the numbers that can be written as the sum of fifth powers of their digits.



https://projecteuler.net/problem=30

https://github.com/AbdullahAlfaraj/project-euler/
by Abdullah Alfaraj
*/


//sum the digits of the number $num after you rise them to the power $nPower 
function sumOfNth($nPower,$num)
{
	$digitsArr = str_split((string)$num);
	$nthPower = function($n) use ($nPower){return pow($n,$nPower);};
	return array_sum(array_map($nthPower,$digitsArr));
}
//for any digit "9^5" is the largest possible value
$pow = 5;
$maxDigitVal = pow(9,$pow); 
$lenDigits = 1;
$sumTotal = 0;
//stop when it's impossible for 999....9 to catch to $i 
for($i =2 ; $i < $maxDigitVal*$lenDigits ;++$i)
{

	$sumi = sumOfNth($pow,$i);
	if($i == $sumi)
		$sumTotal += $i;
	$lenDigits = strlen((string)$i);
	
}


echo "the total sum: $sumTotal \n";

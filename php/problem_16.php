<?php
/*
Problem: Power Digit Sum

2^15 = 32768 and the sum of its digits is 3 + 2 + 7 + 6 + 8 = 26.

What is the sum of the digits of the number 2^1000?



https://projecteuler.net/problem=16

https://github.com/AbdullahAlfaraj/project-euler/
by Abdullah Alfaraj
*/


$base = 2;
$pow = 1000;
//long precision pow operation.
//convert string to array.
$digits = str_split(bcpow($base, $pow));
$sum = array_sum($digits);

echo "the sum of the digits of the number $base^$pow: $sum \n";

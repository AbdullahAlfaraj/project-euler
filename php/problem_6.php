<?php
/*
Problem 6: Sum Square Difference

The sum of the squares of the first ten natural numbers is,
														1^2 + 2^2 + ... + 10^2 = 385

The square of the sum of the first ten natural numbers is,
														(1 + 2 + ... + 10)^2 = 552 = 3025

Hence the difference between the sum of the squares of the first ten natural numbers and the square of the sum is 3025 − 385 = 2640.

Find the difference between the sum of the squares of the first one hundred natural numbers and the square of the sum.



https://projecteuler.net/problem=6

https://github.com/AbdullahAlfaraj/project-euler/
by Abdullah Alfaraj
*/



//return the squares of the sum of the sequence in range [$min,$max] 
//e.g. (1+2+3+4)^2
function sqrOfSum($min, $max) {
    $sum = 0;
    $i = $min;
    while ($i <= $max) {
        $sum += $i;
        ++$i;
    }
    return $sum * $sum;
}

//return the sum of the squares of the sequence in range [$min,$max]
//e.g. (1^2 + 2^2 + 3^2 + 4^2)
function sumOfSqr($min, $max) {
    $sum = 0;
    $i = $min;
    while ($i <= $max) {
        $sum += $i * $i;
        ++$i;
    }
    return $sum;
}


$min = 1;
$max = 100;
$diff = sqrOfSum($min, $max) - sumOfSqr($min, $max);

echo "the difference between the sum of the squares and squares of the sum of".
     "the natural numbers in range [$min,$max]: $diff  \n";
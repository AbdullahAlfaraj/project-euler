<?php
/*
Problem: Largest prime factor

The prime factors of 13195 are 5, 7, 13 and 29.

What is the largest prime factor of the number 600851475143 ?



https://github.com/AbdullahAlfaraj/project-euler/
by Abdullah Alfaraj
*/


//return the smallest factor
//check numbers up to sqrt($num)
//else return the number itself
function smallestFactor($num) {
    $i = 2;
    while ($i <= sqrt($num)) {
        if ($num % $i == 0)
            return $i;
        ++$i;
    }
    return  $num;
}


//return a list of all prime factors of $num
function allFactors($num, $list = []) {

    // echo "current num: $num \n";
    if ($num == 1)
        return $list;
    else {
        $f = smallestFactor($num);
        $list[] = $f;
         
        return allFactors($num / $f,$list);
    }
}



$num = 600851475143;
$factors = allFactors($num);


//echo print_r($factors) ."\n";

//in this solution we insure that all composit factors are reduced to their prime factors,
//we also insure that factors are stored in an ascending order.
//so instead of using max($factor) you could use end($factors). 
echo "largest prime factor: " . max($factors) ."\n";
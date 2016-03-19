<?php
/*
Problem 7: 10001st Prime

By listing the first six prime numbers: 2, 3, 5, 7, 11, and 13, we can see that the 6th prime is 13.

What is the 10 001st prime number?



https://projecteuler.net/problem=7

https://github.com/AbdullahAlfaraj/project-euler/
by Abdullah Alfaraj
*/


//Check if a number is a prime or not.
//number 2 is the smallest prime.
//only check up to sqrt($num).
function isPrime($num)
{
    $i = 2;
    while($i <= sqrt($num))
    {
        if( $num % $i == 0)
            return false;
        ++$i;
    }
    return true;
}


//return the nth prime, starting from ,the first prime number, 2.
function findNthPrime($nth)
{
    
    $seen_primes = 0;

    //until we reach the nth prime do 
    for($i =2; $seen_primes < $nth; ++$i)
    {
        if(isPrime($i))
        {
            ++$seen_primes;
            $prime = $i;
        }

    }
    return $prime;
}



$nth_prime = 10001;
$prime = findNthPrime($nth_prime);

echo "the $nth_prime prime: $prime \n";
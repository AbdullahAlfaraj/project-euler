<?php
/*
Problem: 1000-Digit Fibonacci Number

The Fibonacci sequence is defined by the recurrence relation:

    Fn = Fn−1 + Fn−2, where F1 = 1 and F2 = 1.

Hence the first 12 terms will be:

    F1 = 1
    F2 = 1
    F3 = 2
    F4 = 3
    F5 = 5
    F6 = 8
    F7 = 13
    F8 = 21
    F9 = 34
    F10 = 55
    F11 = 89
    F12 = 144

The 12th term, F12, is the first term to contain three digits.

What is the index of the first term in the Fibonacci sequence to contain 1000 digits?



https://projecteuler.net/problem=25

https://github.com/AbdullahAlfaraj/project-euler/
by Abdullah Alfaraj
*/

//start from the first two Fibonacci numbers f1,f2,
//add them to create the next fibonacci number.
//update f1 and f2 values with the new ones. 
//repeate untile next fibo has $len digits.

function Fibo($len)
{
	$fibo1 = 1;
	$fibo2 = 1;
	$nextFibo = 1;
	 $idx = 1;
	for(; strlen($nextFibo) < $len;++$idx)
	{

		$nextFibo = bcadd($fibo2, $fibo1);

		$fibo1 = $fibo2;
		$fibo2 = $nextFibo;
	}

	return $idx+1;


}



$digits = 1000;
$fiboNumIdx = Fibo($digits);

echo "the index of the first term in the Fibonacci sequence to contain $digits digits: ";
echo "$fiboNumIdx \n";
<?php
/*
Problem: Longest Collatz Sequence

The following iterative sequence is defined for the set of positive integers:

n → n/2 (n is even)
n → 3n + 1 (n is odd)

Using the rule above and starting with 13, we generate the following sequence:
13 → 40 → 20 → 10 → 5 → 16 → 8 → 4 → 2 → 1

It can be seen that this sequence (starting at 13 and finishing at 1) contains 10 terms. Although it has not been proved yet (Collatz Problem), it is thought that all starting numbers finish at 1.

Which starting number, under one million, produces the longest chain?

NOTE: Once the chain starts the terms are allowed to go above one million.



https://projecteuler.net/problem=14

https://github.com/AbdullahAlfaraj/project-euler/
by Abdullah Alfaraj
*/


//find the length of the collatz sequence starting from number $n
function collatzSeqLen($n)
{

	$len = 1;
	for($i = $n; $i != 1;)
	{
		++$len;
		
		if($i % 2 == 0)
			$i = $i / 2;
		else 
			$i = 3*$i + 1;
		
	}

	return $len;
	
}

//return the number $n that is bellow $limit with longest collatz sequence.
function startingNumWithLongestChain($limit)
{
	$start = 0;
	$max_len = 0;
	//keep track of 
	//$start: the starting number with the longest chain.
	//$max_len: the longest chain. 
	for($i = 1;$i < $limit; ++$i)
	{
		$temp_len = collatzSeqLen($i);
		
		if($temp_len > $max_len)
		{
			$max_len = $temp_len; 
			$start = $i;
		}

	}
	
	return $start;
}


$limit = 1000000;
$n = startingNumWithLongestChain($limit);

echo "the number $n produces the longest collatz sequence with a length of ". collatzSeqLen($n) . "\n";

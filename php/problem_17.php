<?php
/*
Problem: Number Letter Counts

If the numbers 1 to 5 are written out in words: one, two, three, four, five, then there are 3 + 3 + 5 + 4 + 4 = 19 letters used in total.

If all the numbers from 1 to 1000 (one thousand) inclusive were written out in words, how many letters would be used?


NOTE: Do not count spaces or hyphens. For example, 342 (three hundred and forty-two) contains 23 letters and 115 (one hundred and fifteen) contains 20 letters. The use of "and" when writing out numbers is in compliance with British usage.



https://projecteuler.net/problem=17

https://github.com/AbdullahAlfaraj/project-euler/
by Abdullah Alfaraj
*/


$basic = [ 
0 => "zero",
1 =>"one",
2 =>"two",
3 =>"three",
4 =>"four",
5 =>"five",
6 =>"six",
7 =>"seven",
8 =>"eight",
9 =>"nine",
10 =>"ten",
11 =>"eleven",
12 =>"twelve",
13 =>"thirteen",
14 =>"fourteen",
15 =>"fifteen",
16 =>"sixteen",
17 =>"seventeen",
18 => "eighteen",
19 =>"nineteen",
20 =>"twenty",
30 => "thirty",
40 => "forty",
50 => "fifty",
60 => "sixty",
70 => "seventy",	
80 => "eighty", 
90 => "nighty"];


//recursively name the digits
function nameNumRec($digits,$position,&$names =[],$attach = "")
{
	$basic = $GLOBALS['basic'];

	//we've traversed all digits
	if($position < 0)
		return join("",$names);//return a name as a string with no spaces

	//the current digit index, $idx start counting from left.
	//where $position start counting from right.
	$idx = (count($digits)-1) - $position;
	$step = 1;//how many digit we will read at once
	$digit = $digits[$idx];//the current digit we are starting from in the number

	//$index is the key we will use to check if the number is in the basic names array 
	$index = (int)($digit * pow(10,$position));
	$last_attach = $attach;//some time we need special words like "and" to concatenate numbers with
	


	
	//current digit is zero,then ignore it
	if($digits[$idx] == 0)
		return nameNumRec($digits,$position-$step,$names,$attach);



	if($position == 1){
		$index = $index + $digits[$idx+1];//we will read two digits at the same time
		$step = 2;
	}
	

	
	//if the name is stored in $basic, then use it 
	if(isset($basic[$index]))
	{
		$name = $basic[$index];

	}
	else //construct the name from it basic components 
	{
		if($index >= 1000)//name = "digit-name thousand"
		{

			$name = $basic[$digit] . "thousand";
			$attach = "and";
		}
		elseif ($index >=100){
			$name = $basic[$digit] ."hundred";
			$attach = "and";
		}
		elseif($index >=20)//two-digits combinations
		{
			
			$next_digit = $digits[$idx+1];
			$name = $basic[$digit*10] .$basic[$next_digit];
			
			$attach = "";
		}

	}

	
	$names[] = $last_attach.$name;

	return nameNumRec($digits,$position-$step,$names,$attach);
}

//return the name of the number
function nameNum($n)
{
	
	//convert from number to array of digits
	$digits = str_split($n);
	//this is the position of the first digit on the left
	//single digit numbers has position equal to zero. 
	
	$position = count($digits)-1;
	// $names = [];
	// return nameNumRec($digits,$position,$names,"");
	return nameNumRec($digits,$position);

}


//return the number of letters that are needed to write all numbers in range [$from,$to]
function NumOfLettersInNumbers($from,$to)
{
	//store all names of the numbers in range [$frome,$to ].
	//store the names within one string with no spaces.
	$all_names = "";

	for($i = $from; $i <= $to; ++$i)
	{
		$name = nameNum($i);

		$all_names .= $name;
	}

	$namesLen = strlen($all_names);
	return $namesLen;
}


$namesLen = NumOfLettersInNumbers(1,1000);
echo "the number of letters used: ".$namesLen."\n";


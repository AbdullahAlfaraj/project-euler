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


function nameNum($digits,$position,&$names,$attach)
{
	$basic = $GLOBALS['basic'];

	//we've traversed all digits
	if($position < 0)
		return join("",$names);//return a name as a string with no spaces

	$idx = (count($digits)-1) - $position;
	$step = 1;
	$digit = $digits[$idx];

	$index = (int)($digit * pow(10,$position));
	$last_attach = $attach; 
	$final_index = "";


	
	//current digit is zero
	if($digits[$idx] == 0)
		return nameNum($digits,$position-$step,$names,$attach);

	if($position == 3)
	{
		$key = $index;
		$step = 1;
	}
	elseif($position == 2){
		$key = $index;
		$step = 1;
	}
	elseif($position == 1){
		$key = $index + $digits[$idx+1];
		$step = 2;
	}
	elseif($position == 0){
		$key = $index ;
		$step = 1;
	}

	
	// echo "position: $position, index: $index, idx: $idx, key: $key \n";




	
	//if the name is stored in $basic, then use it 
	if(isset($basic[$key]))
	{
		$name = $basic[$key];
		// $step =  $index >=10 &&< $index <100 ?1:
	}
	else //make the name 
	{
		if($key >= 1000)//name = "digit-name thousand"
		{


			$name = $basic[$digit] . "thousand";
			// $step = 1;
			$attach = "and";
		}
		elseif ($key >=100){
			$name = $basic[$digit] ."hundred";
			// $step = 1;
			$attach = "and";
		}
		elseif($key >=20)
		{
			
			$next_digit = $digits[$idx+1];
			$name = $basic[$digit*10] .$basic[$next_digit];
			// $step = 2;
			$attach = "";
		}
		elseif ($key >= 10){
			$attach = "";
			$name = $basic[$key] ."teen";
			// $step = 2;
			$attach = "";
			// return $basic[$digit*10] ."teen";
		}




	}

	
	$names[] = $last_attach.$name;

	return nameNum($digits,$position-$step,$names,$attach);
}


$all_names = "";
$from = 1;
$to = 1000;
for($i = $from; $i <= $to; ++$i)
{
	$n = $i;
	$digits = str_split($n);
	$position = count($digits)-1;
	$names = [];
	$name = nameNum($digits,$position,$names,"");
	$all_names .= $name;
	echo "$i => $name \n";
}

echo "the number of letters: ".strlen($all_names)."\n";


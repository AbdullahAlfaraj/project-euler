<?php
/*
Problem: Names Scores

Using names.txt (right click and 'Save Link/Target As...'), a 46K text file containing over five-thousand first names, begin by sorting it into alphabetical order. Then working out the alphabetical value for each name, multiply this value by its alphabetical position in the list to obtain a name score.

For example, when the list is sorted into alphabetical order, COLIN, which is worth 3 + 15 + 12 + 9 + 14 = 53, is the 938th name in the list. So, COLIN would obtain a score of 938 × 53 = 49714.

What is the total of all the name scores in the file?



https://projecteuler.net/problem=22

https://github.com/AbdullahAlfaraj/project-euler/
by Abdullah Alfaraj
*/


//return the alphabetical value for a word
function alphaValue($word)
{
	
	$A = str_split($word);//convert string to array

	//the value of letter starting from letter "A" as 1
	$char_length = function($char){return ord($char) - ord('A') + 1; };
	$Aval = array_map($char_length,$A);//convert char to int 

	return array_sum($Aval);//sum all ints
}

//$position = index + 1
function nameScore($name,$position)
{
	// echo "alpha value: ".alphaValue($name).", poistion: $position \n";
	return alphaValue($name) * $position;
}



// read all names from the file into a string 
$filename = "../data/p022_names.txt";
$file = fopen($filename,"r");
$namesStr = fread($file,filesize($filename));

$namesStr = str_replace('"', "", $namesStr);//remove " from the names 
$names = explode(',',$namesStr);// convert names to an array

//sort the names
sort($names);

$sum = 0;
for($i = 0; $i < count($names);++$i)
{
	$sum += nameScore($names[$i],$i+1);
}

// echo "COLIN's score: " . nameScore("COLIN",938)."\n";
echo "the total of all the name scores: $sum\n";

<?php
/*
Problem: Counting Sundays

You are given the following information, but you may prefer to do some research for yourself.

    1 Jan 1900 was a Monday.

    Thirty days has September,
    April, June and November.
    All the rest have thirty-one,
    Saving February alone,
    Which has twenty-eight, rain or shine.
    And on leap years, twenty-nine.
    
    A leap year occurs on any year evenly divisible by 4, but not on a century unless it is divisible by 400.

How many Sundays fell on the first of the month during the twentieth century (1 Jan 1901 to 31 Dec 2000)?



https://projecteuler.net/problem=19

https://github.com/AbdullahAlfaraj/project-euler/
by Abdullah Alfaraj
*/


$Days = [
1 => 31,
2 => 28,
3 => 31,
4 => 30,
5 => 31,
6 => 30,
7 => 31,
8 => 31,
9 => 30,
10 => 31,
11 => 30,
12 => 31
];

//test if a year is a leap year or not.
function isLeapYear($year)
{
	//if $year is  a century check if divisble by 400 
	if($year % 100 == 0)
		return $year % 400 == 0;
	// none century year
	else
		return  $year % 4 == 0;
}


//return how many days in a month
function daysInMonth($month,$year)
{
	$Days = $GLOBALS['Days'];
	$days = 0;
	//if it is Feb and it's leap year then return 29 days
	if($month == 2 && isLeapYear($year))
		$days = 29;
	else
		$days = $Days[$month];

	return $days;
}


//increment the current data by x number of days,
//and return the new data as [day,month,year].
function newDate($day,$month,$year,$plus_dyas)
{
	$new_day = $day + $plus_dyas;
	$new_month = $month;
	$new_year = $year;

	if($new_day > daysInMonth($month,$year))
	{
		$new_day = $new_day % daysInMonth($month,$year);
		$new_month +=1;
		if($new_month > 12)
		{
			$new_month = $new_month % 12;
			$new_year += 1;

		} 
	}
	
	return [$new_day,$new_month,$new_year];
}

//return how many sundays on 1st of the month
function sundaysOnfirst($startY,$endY){

	$sundays = 0;
	//since 1st jan 1900 is monday
	//first sunday we know of is 6th jan 1900.
	$day = 6;
	$month = 1;
	$year = 1900;

	//we will fisit all sundays and only count the ones start at 1st day of a month
	//don't count any sunday before the year $startY or after $endY
	while($year <= $endY)
	{
		if($day == 1 && $year >= $startY)
			$sundays += 1;
		

		$new_date = newDate($day,$month,$year,7);
		$day = $new_date[0];
		$month = $new_date[1];
		$year = $new_date[2];
	}

	
	return $sundays;
}


$startY = 1901;
$endY = 2000;

echo "number of sundays on first day of the month in years[$startY,$endY]: ";
echo sundaysOnfirst($startY,$endY) . "\n";
<?php
/*
Problem: Lattice Paths

Starting in the top left corner of a 2×2 grid, and only being able to move to the right and down, there are exactly 6 routes to the bottom right corner.



How many such routes are there through a 20×20 grid?



https://projecteuler.net/problem=15

https://github.com/AbdullahAlfaraj/project-euler/
by Abdullah Alfaraj
*/


$width = 20;
$height = 20; 
//$S = str_repeat("R",$width) . str_repeat("D", $height);

//find the factorial of the number $n
function fact($n)
{
	$product = 1; 
	for($i = $n; $i > 1; --$i)
	{
		$product *= $i;
	}
	return $product;
}


//this equation will list the number of all unique permutations
//since we are moving from corner to an opposite corner,
//we know that for every width unit we will move right.
//we also know that number of down move equal height. 
//routes = (w + h)!/ (w!*h!)  
$fact1 = fact($width + $height);
$routes = $fact1 / (fact($width) * fact($height));

echo "There are $routes possible routes\n";

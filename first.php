<?php 
	//1
	echo "Twinkle, Twinkle little star.";
	
	$t = "Twinkle";
	$s = "star";
	$r = $t+$s;
	echo $r ;
	//2
	$x=10;
	$y=7;

	echo( $x."+".$y."=". ($x+$y)."<br>");
	echo( $x."-".$y."=" .($x-$y)."<br>");
	echo( $x."*".$y."=" .($x*$y)."<br>");
	echo( $x."/".$y."=" .($x/$y)."<br>");
	echo("<br>");

	//3
	$variable = 8;

	$add = $variable + 2;
	echo($add)."<br>";
	$sub = $add-4;
	echo($sub)."<br>";
	$mul = $sub*5;
	echo($mul)."<br>";
	$div = $mul/3;
	echo($div)."<br>";
	$inc = ++$div;
	echo($inc)."<br>";
	$dec = --$inc;
	echo($dec)."<br>";
	echo("<br>");

	//4
	
	if (date('F',time())=='August') {
		# code...
		echo "It's August, so it's really hot";
	} else {
		# code
		echo "Not August, so at least not in the peak of the heat.";
			}
	echo("<br>");

	//5

	$array = [1,2,3,4,5,6,7,8,9,10,11,12];

	for($i = 0; $i < 12; $i++){
		echo($array[$i]."*".$array[$i]."=".$array[$i]*$array[$i]."<br>");
	}
	echo("<br>");
	echo("<br>");

	//7

	$mValue = array(
		"a" => array("h"=>1,"i"=>2,"j"=>3,"k"=>4,"l"=>5,"m"=>6,"n"=>7),
		"b" => array("h"=>2,"i"=>4,"j"=>6,"k"=>8,"l"=>10,"m"=>12,"n"=>14),
		"c" => array("h"=>3,"i"=>6,"j"=>9,"k"=>12,"l"=>15,"m"=>18,"n"=>21),
		"d" => array("h"=>4,"i"=>8,"j"=>12,"k"=>16,"l"=>20,"m"=>24,"n"=>28),
		"e" => array("h"=>5,"i"=>10,"j"=>15,"k"=>20,"l"=>25,"m"=>30,"n"=>35),
		"f" => array("h"=>6,"i"=>12,"j"=>18,"k"=>24,"l"=>30,"m"=>36,"n"=>42),
		"g" => array("h"=>7,"i"=>14,"j"=>21,"k"=>28,"l"=>35,"m"=>42,"n"=>49)
		 );

	foreach ($mValue as $values) {
		# code...
		foreach ($values as $value) {
			# code...
			echo $value . " ";
		}
		echo("<br>");
	}
?>
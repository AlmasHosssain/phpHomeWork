<?php 
    echo "<h2> File name : PHPIntro </h2>";

    echo "<h3> Exercise 1 </h3>";
    echo "Twinkle, Twinkle little star. <br>";

    $a = "Twinkle";
    $b = " Star";
    echo $a.$b."<br>";

    echo "<h3> Exercise 2 </h3>";
    $x = 10;
    $y = 7;
    echo "$x + $y = " .($x + $y)."<br>";
    echo "$x - $y = " .($x - $y)."<br>";
    echo "$x * $y = " .($x * $y)."<br>";
    echo "$x / $y = " .($x / $y)."<br>";
    echo "$x % $y = " .($x % $y)."<br>";

    echo "<h3> Exercise 3 </h3>";
    $variable = 8;
    echo "Value is now $variable.<br>";
    $variable = $variable + 2;
    echo "Value is now $variable.<br>";
    $variable = $variable - 4;
    echo "Value is now $variable.<br>";
    $variable = $variable * 5;
    echo "Value is now $variable.<br>";
    $variable = $variable / 3;
    echo "Value is now $variable.<br>";
    $variable = $variable + 1;
    echo "Value is now $variable.<br>";
    $variable = $variable - 1;
    echo "Value is now $variable.<br>";

    echo "<h3> Exercise 4 </h3>";
    var_dump("Harry");
    echo "<br>";
    echo "Harry";
    echo "<br>";
    var_dump(28);
    echo "<br>";
    $nul=null;
    var_dump($nul);
    echo "<br>";

    echo "<h3> Exercise 5 </h3>";
    $around="around";
    echo "What goes ".$around. ", comes ".$around. " .<br>";
    echo "What goes $around, comes $around.<br>";
    echo 'What goes '.$around. ', comes '.$around. ' .<br>';
    echo 'What goes $around, comes $around.<br> <br>';

    $month = date('F',time()); //for getting current month
    //echo $month;
    if($month == "August") {
        echo "It's August, so it's really hot.";
    } else {
        echo "Not August, so at least not in the peak of the heat.";
    }

    echo "<h3> Exercise 6 </h3>";
    for($i=1; $i<=12; $i++) {
        echo $i." * ".$i." = ".$i*$i;
        echo "<br>";
    }

    echo "<h3> Exercise 7 </h3>";
    for($i=1; $i<=7; $i++) {
        for($j=1; $j<=7; $j++) {
            echo $i*$j." ";
        }
        echo "<br>";
    }
?>

    <?php echo "<h2> File name : PHP </h2>"; ?> 
    <?php echo "<h3>Multidimensional Array</h3>" ?>
    <?php $AmazonProducts = array( array("BOOK", "Books", 50),
			             array("DVDs", "Movies", 15),
			             array("CDs", "Music", 20)
                    );
    for ($row = 0; $row < 3; $row++) {
        for ($column = 0; $column < 3; $column++) { ?>
            <p> | <?= $AmazonProducts[$row][$column] ?> 
                <?php } ?>
            </p>
    <?php } ?>
    
    <?php $AmazonProducts = array( array("Code" =>"BOOK", "Description" => "Books", "Price" => 50),
			           array("Code" => "DVDs", "Description" => "Movies", "Price" => 15),
			           array("Code" => "CDs", "Description" => "Music", "Price" => 20)
			     );
    for ($row = 0; $row < 3; $row++) { ?>
	<p> | <?= $AmazonProducts[$row]["Code"] ?> | <?= $AmazonProducts[$row]["Description"] ?> | <?= $AmazonProducts[$row]["Price"] ?> 
      </p>
    <?php } ?>

<?php echo "<h3>String compare functions </h3>";

    $test = "Hello World! \n";
    print "Position of from beginning is : ".strpos($test, "o");
    print "<br>Position of after index 4 is : ".strpos($test, "o", 5);  
    echo "<br>";
?>

<?php echo 6*7 ;?>

<?php
    for ($i = 1; $i <= 3; $i++) { ?>
	    <h<?= $i ?>>This is a level <?= $i ?> heading.</h<?= $i ?>>
	    <?php } ?>

<?php 
    function quadratic($a, $b, $c) {
        return -$b + sqrt($b * $b - 4 * $a * $c) / (2 * $a);
    }
    echo quadratic(4,8,10);
    echo "<br>";

    function print_separated($str, $separator = ", ") {
        if (strlen($str) > 0) {
            print $str[0];
            for ($i = 1; $i < strlen($str); $i++) {
                print $separator . $str[$i];
            }
        }
    }
    print_separated("hello"); # h, e, l, l, o
    echo "<br>";
    print_separated("hello", "-"); # h-e-l-l-o
    echo "<br>";
?>

<?php 
    echo "<h3>Exercise 1</h3>";

    $weather = array("rain", "sunshine", "clouds", "hail", "sleet", "snow", "wind");

    echo "We've seen all kinds of weather this month. At the beginning of the month, we had $weather[5] and $weather[6]. Then came $weather[1] with a few $weather[2] and some $weather[0]. At least we didn't get any $weather[3] or $weather[4].";
    echo "<br> <br>";

    echo "<h3>Exercise 2</h3>";

    $city = array("Tokyo", "Mexico City", "New York City", "Mumbai", "Seoul", "Shanghai", "Lagos", "Buenos Aires", "Cairo", "London");

    echo $city[0];
    for ($i=1; $i<count($city); $i++) {
        echo ", ".$city[$i];
    }
    echo "<br> <br>";

    echo "<p>After sorting</p>";
    sort($city);
    echo "<ul>";
    for($i=0; $i<count($city); $i++) {     
        echo "<li>".$city[$i]."</li>";  
    }
    echo "</ul>";
    echo "<br> <br>";

    //$l = count($city);
    echo "<p>Adding new values and sorting again</p>";
    $city[10] = "Los Angeles";
    $city[11] = "Calcutta";
    $city[12] = "Osaka";
    $city[13] = "Beijing";
    sort($city);
    echo "<ul>";
    for($i=0; $i<count($city); $i++) {     
        echo "<li>".$city[$i]."</li>";  
    }
    echo "</ul>";
    echo "<br> <br>";

?>

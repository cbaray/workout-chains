<?php

include('utils.php');


$year = date("Y");
$day = ($_POST['day']);
$month = ($_POST['month']);

$time = strtotime($year . "-" . $month . "-" . $day);

//$dayOfYear = date("z", $time);

$person = ($_POST['person']);
$workout = ($_POST['workout']);
$url = ($_POST['url']);

	
insert_workout($person, $time, $workout, $url);

setcookie("person", $person, time()+60*60*24*30 );

display_header();
display_standings(null);

display_log($person, null);


//echo "<br/>4-15:" . strtotime("2012-04-15");
//echo "<br/>5-15:" . strtotime("2012-05-15");
//echo "<br/>6-15:" . strtotime("2012-06-15");
//echo "<br/>7-15:" . strtotime("2012-07-15");

display_footer();

?>

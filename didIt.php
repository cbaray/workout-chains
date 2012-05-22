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

setcookie("person", $person, time()+60*60*24*300 );

display_header();
display_standings(null);

display_recents();

display_footer();

?>

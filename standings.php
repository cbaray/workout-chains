<?php

include('utils.php');
$period = ($_GET['period']);
$doUpdates = $_GET['doUpdate'];

if (!$period)
	$period = calculate_period(date("Y-m-d"));
		
if ($doUpdates)
{
	foreach ($people as $person)
	{
		update_stats($person, $period);
	}
}

display_header();
display_standings($period);

//echo "<br/>4-15:" . strtotime("2012-04-15");
//echo "<br/>5-15:" . strtotime("2012-05-15");
//echo "<br/>6-15:" . strtotime("2012-06-15");
//echo "<br/>7-15:" . strtotime("2012-07-15");

display_footer();

?>

<?php

include('utils.php');
$period = ($_GET['period']);
$doUpdates = $_GET['doUpdate'];
$showRecents = 0;

if (!$period)
{
	$showRecents = 1;
	$period = calculate_period(date("Y-m-d"));
}

		
if ($doUpdates)
{
	foreach ($people as $person)
	{
		update_stats($person, $period);
	}
}

display_header("standings");
display_standings($period);

if ($showRecents == 1)
  display_recents();

//echo "<br/>4-15:" . strtotime("2012-04-15");
//echo "<br/>5-15:" . strtotime("2012-05-15");
//echo "<br/>6-15:" . strtotime("2012-06-15");
//echo "<br/>7-15:" . strtotime("2012-07-15");

display_footer();

?>

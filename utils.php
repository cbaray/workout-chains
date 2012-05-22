<?php

include("dbInfo.php");

$people = array("Ben", "Catherine", "Cris", "EJ", "Kari", "Madeline", "Salvador", "Shawn", "Thao");
$cutoffDates = array(0, 1334473200, 1337065200, 1339743600, 1342335600);

function safe($string)
{
	return mysql_real_escape_string($string);
}


function insert_workout($person, $time, $workout, $url)
{

	global $username;
	global $password;
	global $database;

	mysql_connect(localhost,$username, $password);
	@mysql_select_db($database) or die( "Unable to select database");
	
		
	$person = safe($person);
	$time = safe($time);
	$workout = safe($workout);
	$url = safe($url);
	
	if ($person && (strlen($person) > 0))
	{
		$insertQuery = "INSERT INTO  `actions` (
		`person` ,
		`time` ,
		`description`,
		`url`
		)
		VALUES (
		'$person',  '$time',  '$workout', '$url'
		) on duplicate key update `description`='$workout', `url`='$url';";
		
		mysql_query($insertQuery);
	
		$period = calculate_period(date("Y-m-d", $time));
		update_stats($person, $period);
	}
	
}

function calculate_period($date)
{
	$time = strtotime($date);
	
	$period = 0;
	global $cutoffDates;
	
	while ($time >= $cutoffDates[$period])
	{
		$period++;
	}
	
	return $period - 1;
	
}


function update_stats($person, $period)
{	

	if (!$period)
		$period = calculate_period(date("Y-m-d"));
	
	$log = get_log($person, $period, "ASC");
	$currentChainLength = 0;
	$lastDay = -100;
	
	$currentChain = 0;
	$todayNumber = date("z");
	
	if ($log)
	{
		while ($row = mysql_fetch_assoc($log))
		{
			$dayNumber = date("z", $row['time']);
			
			if ($lastDay == -100)
			{
				$currentChainLength++;
				
				$lastDay = $dayNumber;
				//print "$dayNumber : chainLength == $currentChainLength (init)<br/>";
				
			}
			else if ($dayNumber == ($lastDay + 1))
			{
				$currentChainLength++;
				$lastDay = $dayNumber;
				//print "$dayNumber : chainLength == $currentChainLength (extend)<br/>";
				
			}
			else if ($dayNumber != ($lastDay + 1))
			{
				$chains[] = $currentChainLength;
				$currentChainLength = 1;
				$lastDay = $dayNumber;
				//print "$dayNumber : chainLength == $currentChainLength (addedChain)<br/>";
	
			}
	
		}
		
		if (($dayNumber + 1) >= $todayNumber)
		{
			$currentChain = $currentChainLength;
		}
	}
	
	$chains[] = $currentChainLength;

	$longestChain = 0;
	$averageChain = 0;
	$totalActions = 0;
	foreach ($chains as $chainLength)
	{
		$totalActions += $chainLength;
		if ($chainLength > $longestChain)
		{
			$longestChain = $chainLength;
		}
	}
	
	$chainCount = count($chains);
	if ($chainCount > 0)
	{
		$averageChain =  $totalActions / count($chains);
	}
	
	global $username;
	global $password;
	global $database;
	
	mysql_connect(localhost,$username, $password);
	@mysql_select_db($database) or die( "Unable to select database");
	

	
	$insertQuery = "INSERT INTO `statistics` (`person`, `period`, `chains`, `actions`, `longest`,
					`current`) 
				VALUES ('$person', '$period', '$chainCount', '$totalActions', '$longestChain',
				'$currentChain')
				on duplicate key update `chains`='$chainCount',
				`actions`='$totalActions',
				`current`='$currentChain',
				`longest`='$longestChain';";

	mysql_query($insertQuery);

//	print "$insertQuery <br/>";
	
	
}

function display_log($person, $period)
{
	if (!$period)
		$period = calculate_period(date("Y-m-d"));

	$log = get_log($person, $period, "DESC");

	echo "<h3>Workouts for $person</h3>";
	echo "<table class='table table-striped'>";	
	if ($log)
	{
		while ($row = mysql_fetch_assoc($log))
		{
			$extraInfo = "";
			if ($debug)
				$extraInfo = "<td>" . date("z", $row['time']) . "</td>";
			
			$description = $row['description'];
			if ($row['url'])
			{
			  $description = "<a href='" . $row['url'] . "'>$description</a>";
			}
			
			echo "<tr>" . $extraInfo . "<td valign=top>" . 
				date("n/d",$row['time']) . "</td><td valign=top>" . $description .
				"</td></tr>";
		}
	}
	else
	{
		print "<tr><td>$person hasn't done anything!</td></tr>";
	}
	echo "</table>";

}

function display_standings($period)
{
	if (!$period)
		$period = calculate_period(date("Y-m-d"));
		
	$standings = get_standings($period);
	
	global $cutoffDates;
	$startDate = date("n/d", $cutoffDates[$period]);
	$endDate = date("n/d", $cutoffDates[($period+1)] - 1);
	echo "<h3>$startDate - $endDate: Standings</h3>";
	echo "<table class='table table-striped'><tr><th></th><th>Longest</th><th>Current</th><th>Total</th></tr>";
	
	$didSomething = array();
	if ($standings)
	{
		while ($row = mysql_fetch_assoc($standings))
		{
			$link = "<a href=reportPerson.php?period=$period&person=" . $row['person'] . 
						">" . $row['person'] . "</a>";
			echo "<tr><td align=right valign=top>" . $link . "</td>".
			"<td align=center valign=top>" . 
				$row['longest'] . "</td><td align=center valign=top>" . 
				$row['current'] . "</td><td align=center valign=top>" .
				$row['actions'] . "</td></tr>";
			$didSomething[] = $row['person'];
		}
	}
	
	global $people;	
	
	foreach ($people as $person)
	{
		if (!(in_array($person, $didSomething)))
		{
			echo "<tr><td align=right>" . $person . "</td><td>&nbsp;</td>".
			"<td align=right>0</td><td align=right>0</td><td align=right>0</td></tr>";
		
		}
	}
	
	echo "</table>";
	
}

function display_recents()
{
	$recents = get_recents();
	
	
	echo "<h4>Recent activities</h4><table class='table table-striped'>";
	if ($recents)
	{
		while ($row = mysql_fetch_assoc($recents))
		{
			$extraInfo = "";
			if ($debug)
				$extraInfo = "<td>" . date("z", $row['time']) . "</td>";
			
			$description = $row['description'];
			  
			if ($row['url'])
			{
			  $description = "<a href='" . $row['url'] . "'>$description</a>";
			}
			
			$description = $description  . " </td><td>" . $row['person'] . "";
			
			echo "<tr>" . $extraInfo . "<td valign=top>" . 
				date("n/d",$row['time']) . "</td><td valign=top>" . $description .
				"</td></tr>";
		}
	}

	echo "</table>";
}



function display_header()
{
	echo '<html>
<head>
<link rel="apple-touch-icon" href="/chains/apple-touch-icon.png" />

<title>Workouts</title>
<meta name="viewport" content="user-scalable=no, width=device-width" />
<link rel="stylesheet" href="twitter-bootstrap/docs/assets/css/bootstrap.css">
</head>
<body>
<div class="container-fluid">
  <div class="span3">
    <ul class="nav nav-tabs">
      <li><a href="index.php">Log Workout</a></li>
      <li class="active"><a href="standings.php">Standings</a></li>
    </ul>
  </div>
</div>

<div class="container-fluid">  
';

}

function display_footer()
{
	echo '</div></body></html>';
}


function get_log($person, $period, $direction)
{
	global $username;
	global $password;
	global $database;
	
	mysql_connect(localhost,$username, $password);
	@mysql_select_db($database) or die( "Unable to select database");
	
	if (!$period)
		$period = calculate_period(date("Y-m-d"));	
	if (!$direction)
		$direction = "desc";
		
	global $cutoffDates;
	
	$startDate = $cutoffDates[$period];
	$endDate = $cutoffDates[$period + 1];
	
	$person = safe($person);
	
	$workoutQuery = "select * from `actions` where `person`='$person'
		and `time`>='$startDate' and `time` < '$endDate' order by `time` $direction";
	//print $workoutQuery;
	
	$result = mysql_query($workoutQuery);
	
	if (mysql_numrows($result) != 0)
	{	
		return $result;
	}
}


function get_standings($period)
{
	global $username;
	global $password;
	global $database;

	mysql_connect(localhost,$username, $password);
	@mysql_select_db($database) or die( "Unable to select database");
	
	$period = safe($period);
	
	$statQuery = "select * from `statistics` where `period`='$period' order by `longest` desc,
		`person` asc";
	//print $workoutQuery;
	
	$result = mysql_query($statQuery);
	
	if (mysql_numrows($result) != 0)
	{	
		return $result;
	}
}


function get_recents()
{
	global $username;
	global $password;
	global $database;

	mysql_connect(localhost,$username, $password);
	@mysql_select_db($database) or die( "Unable to select database");
	
	$time = strtotime(date("Y-m-d", time())) - (60 * 60 * 24) ;
	
	$recentsQuery = "SELECT * FROM  `actions` WHERE  `time` >=$time
			ORDER BY  `actions`.`time` desc,   `actions`.`person` ASC ";

	$result = mysql_query($recentsQuery);
	
	//print $recentsQuery;
	
	return $result;			
}


?>
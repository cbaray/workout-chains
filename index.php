<?php

include('utils.php');

$day = date("j");
$month = date("n");
$cookiedPerson = $_COOKIE["person"];

?>
<html>
<head>
<link rel="apple-touch-icon" href="/chains/apple-touch-icon.png" />

<title>Workouts</title>
<meta name="viewport" content="user-scalable=no, width=device-width" />
</head>

<body OnLoad="document.didIt.workout.focus();">

<form name="didIt" method="post" action="didIt.php">

<table>
<tr>
<td>Person:</td>
<td>
<select name="person">
<?php

global $people;
foreach ($people as $person)
{
  $selected = "";
  if ($person == $cookiedPerson)
  {
	$selected = "selected ";
  }
  
  echo '<option ' . $selected . 'value="' .
  	$person . '">' . $person .'</option>\r\n';
  	
}

?>
</select>
</td>

<tr>
<td>Date:</td>
<td>
<input type=text size=2 name='month' value="<?php print $month ?>"/>
<input type=text size=2 name='day' value = "<?php print $day ?>"/>
</td>
</tr>

<tr>
<td>Workout: </td>
<td><input type=text size=25 name='workout'/></td>
</tr>

<tr>
<td>URL: </td>
<td><input type=text size=25 name='url'/></td>
</tr>

<tr>
<td> &nbsp;</td>
<td><input type=submit name=submit value="Did it"/>
</td>
</tr>

</table>
</form>

<a href="standings.php">Standings</a>

</body>
</html>

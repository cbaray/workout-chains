<?php

include('utils.php');

date_default_timezone_set('America/Los_Angeles');

$day = date("j");
$month = date("n");
$cookiedPerson = $_COOKIE["person"];


display_header("log");
?>

<!--
<html>
<head>
<link rel="apple-touch-icon" href="/chains/apple-touch-icon.png" />

<title>Workouts</title>
<meta name="viewport" content="user-scalable=no, width=device-width" />
<link rel="stylesheet" href="twitter-bootstrap/docs/assets/css/bootstrap.css">

<style type="text/css">

input:not([type="image"]), textarea {
    box-sizing: content-box;
}

</style>

</head>


<div class="container-fluid">
  <div class="span4">
    <ul class="nav nav-tabs">
      <li class="active"><a href="index.php">Log Workout</a></li>
      <li><a href="standings.php">Standings</a></li>
      <li><a href="history.php">History</a></li>
    </ul>
  </div>
</div>

-->

<div class="container-fluid">  

<form name="didIt" method="post" action="didIt.php" class="well form-inline">
<fieldset>

<div class="control-group">
  <label class="control-label" for="select01">Person:</label>
  <div class="controls">
    <select name="person" id="select01">
<?php

global $people;
foreach ($people as $person)
{
  $selected = "";
  if ($person == $cookiedPerson)
  {
	$selected = "selected ";
  }
  
  echo '       <option ' . $selected . 'value="' .
  	$person . '">' . $person .'</option>';
  	
}

?>
    </select>
  </div>
</div>

<div class="control-group">
  <label class="control-label">Date:</label>
  <div class="controls">
    <input type=text id='month' name='month' class='input-small' value="<?php print $month ?>"/>
    <input type=text id='day' name='day' class='input-small' value = "<?php print $day ?>"/>
  </div>
</div>

<div class="control-group">
  <label class="control-label">Workout: </label>
  <div class="controls">
    <input type=text id='workout' name='workout' class='input-large'/>
  </div>
</div>

<div class="control-group">
  <label class="control-label">URL: </label>
  <div class="controls">
    <input type=text id='url' name='url' class='input-large' />
  </div>
</div>

<div class="form-actions">
  <button type="submit" class="btn btn-primary">Did it</button>
</div>

</fieldset>
</form>

<?php

display_footer()
?>


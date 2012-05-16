<?php

include('utils.php');

$person = ($_GET['person']);
$period = ($_GET['period']);

display_header();

display_standings($period);

display_log($person, $period);

display_footer();


?>

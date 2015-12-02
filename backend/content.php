<?php
print '<body>';
include 'backend/topbar.php';
include 'backend/swipeable.php';

$places[0]='intro.php';
$places[1]='register.php';
$places[2]='login.php';
$places[3]='calendar.php';
$places[4]='visitlist.php';
$places[5]='addivent.php';
	$places[51]='addivent2.php';
	$places[52]='addivent3.php';
	$places[53]='addivent4.php';
	$places[54]='addivent5.php';
	$places[55]='addivent6.php';
$places[6]='clientlist.php';
$places[7]='logout.php';

$places[10]='editvisit.php';
$places[11]='editclient.php';

/*
$places = array(
	0 => 'intro.php',
	1 => 'register.php'
);
*/

$location=!empty($_GET['location']) ? $_GET['location'] : 0;
$location=!empty($places[$location]) ? $location : 0;
include $places[$location];
print '</div></body>';
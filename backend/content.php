<?php
print '<body>';
include 'backend/topbar.php';
include 'backend/swipeable.php';

$places = array(
	0 => 'intro.php',
	1 => 'register.php',
	2 => 'login.php',
	3 => 'calendar.php',
	4 => 'visitlist.php',
	5 => 'addivent.php',
		51 => 'addivent2.php',
		52 => 'addivent3.php',
		53 => 'addivent4.php',
		54 => 'addivent5.php',
		55 => 'addivent6.php',
	6 => 'clientlist.php',
	7 => 'logout.php',
	8 => 'saved.php',
	9 => 'acceptVisit.php',
	10 => 'editvisit.php',
	11 => 'editclient.php',
	12 => 'confirm.php',
);

$location=!empty($_GET['location']) ? $_GET['location'] : 0;
$location=!empty($places[$location]) ? $location : 0;
include $places[$location];
print '</div></body>';
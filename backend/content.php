<?php
print '<body>';
include 'backend/topbar.php';
include 'backend/swipeable.php';

$places[0]='intro.php';
$places[1]='register.php';
$places[2]='login.php';
$places[3]='ivents.php';

$places[5]='newivent.php';

$places[7]='logout.php';

$location=!empty($_GET['location']) ? $_GET['location'] : 0;
include $places[$location];
print '</body>';
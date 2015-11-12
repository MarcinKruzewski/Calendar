<?php
include 'backend/topbar.php';
include 'backend/swipeable.php';
$location=!empty($_GET['location']) ? $_GET['location'] : 0;
if ($location==0) include 'intro.php';
if ($location==1) include 'register.php';
if ($location==2) include 'login.php';


if ($location==7) include 'logout.php';


print '</div></div></div>';
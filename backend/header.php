<?php
include 'dbconnect.php';
include 'logtest.php';
print '<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>Terminarz</title>

  <meta name="description" content="" />
  <meta name="keywords" content="" />

  <link rel="stylesheet" href="css/bootstrap.css" />';
  $style[1]='grey';
  $style[2]='blue';
  $style[3]='pink';
  $colorset = !empty($pswd['style']) ? $pswd['style'] : 1;
print "<link rel='stylesheet' href='css/core{$style[$colorset]}.css' />";
print 
  '<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <script src="js/swipe.js"></script>
  <link href="calendar/fullcalendar.css" rel="stylesheet" />
  <link href="calendar/fullcalendar.print.css" rel="stylesheet" media="print" />
  <script src="calendar/lib/moment.min.js"></script>
  <script src="calendar/lib/jquery.min.js"></script>
  <script src="calendar/fullcalendar.min.js"></script>
  <script src="calendar/lang-all.js"></script>';
  
print "</head>";

include 'Visits.php';
include 'ExtVisit.php';
include 'Clients.php';
include 'ExtClient.php';
include 'businesshours.php';

<?php
$visit = new ExtVisit;
if (!empty($_GET['id']))
{
	$visit->open($_GET['id']);
	$visit->confirm();
}
header('Location: 9.html');
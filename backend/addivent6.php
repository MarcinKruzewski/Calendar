<?php
$visit = json_decode($_SESSION['newVisit'],1);
$adding = new extVisit;
$adding->setParam('title', $visit['title']);
$adding->setParam('date', $visit['date']);
$adding->setParam('time', $visit['time']);
$adding->setParam('client', $visit['client']);
$adding->setParam('admin', $visit['host']);
$adding->setEnd();
$adding->replace();
print '<h1>Dziękuję!</h1>';
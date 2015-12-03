<?php
$host = !empty($_POST['host']) ? $_POST['host'] : '';
$visit = json_decode($_SESSION['newVisit'],1);
$visit['host']=$host;
$_SESSION['newVisit']=json_encode($visit);
print "<h2>Nowa wizyta</h2><form method='post' action='53.html'><table><tr><td>Tytuł</td><td>{$visit['title']}</td></tr><tr><td>Klient</td><td>{$visit['client']}</td></tr><tr><td>Gospodarz</td><td>{$visit['host']}</td></tr><tr><td>Data:</td><td><input required type='date' name = 'date'></td><td>Format daty to: mm-dd-yyyy</td></tr>";
print '<tr><td></td><td><input type = "submit" value = "Dalej"/></td></tr>';
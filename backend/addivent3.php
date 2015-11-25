<?php
$host = !empty($_POST['host']) ? $_POST['host'] : '';
$visit = json_decode($_SESSION['newVisit'],1);
$visit['host']=$host;
$_SESSION['newVisit']=json_encode($visit);
print '<h2>Nowa wizyta</h2><form method="post" action="index.php?location=53"><table><tr><td>Data:</td><td><input required type="date" name = "date"></td></tr>';
print '<tr><td></td><td><input type = "submit" value = "Dalej"/></td></tr>';
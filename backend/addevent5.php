<?php
$time = !empty($_POST['time']) ? $_POST['time'] : '';
$visit = json_decode($_SESSION['newVisit'],1);
$visit['time']=$time;
$_SESSION['newVisit']=json_encode($visit);
print "<h1>Podsumowanie</h1><table><tr><td>Tytuł</td><td>{$visit['title']}</td></tr><tr><td>Klient</td><td>{$visit['client']}</td></tr><tr><td>Gospodarz</td><td>{$visit['host']}</td></tr><tr><td>data</td><td>{$visit['date']}</td></tr><tr><td>Godzina</td><td>{$visit['time']}</td></tr><tr><td></td><td><a href='55.html'>Potwierdzam</a></td></tr>";
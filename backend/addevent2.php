<?php
$title = !empty($_POST['title']) ? $_POST['title'] : '';
$client = !empty($_POST['client']) ? $_POST['client'] : '';
if ($pswd['type']=='user') $client=$pswd['user'];
$visit['title']=$title;
$visit['client']=$client;
$_SESSION['newVisit']=json_encode($visit);
if ($pswd['type']=='user') $client=$pswd['user'];
print "<h2>Nowa wizyta</h2><form method='post' action='52.html'><table><tr><td>Tytuł</td><td>{$visit['title']}</td></tr><tr><td>Klient</td><td>{$visit['client']}</td></tr><tr><td>Gospodarz:</td><td><select name='host' required>";
$sql = 'SELECT * FROM users';
foreach ($db->query($sql) as $row) {
	if ($row['type']=='admin'){
		print "<option>{$row['user']}</option>";
	}
}
print '</td></tr>';
print '</tr><tr><td></td><td><input type = "submit" value = "Dalej"/></td></tr>';

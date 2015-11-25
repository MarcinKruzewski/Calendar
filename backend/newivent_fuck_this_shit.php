<?php
print '<h2>Nowa wizyta</h2><form method="post"><table><tr><td>Rodzaj wizyty:</td><td><input type="text" name="title"</td></tr><tr>';
$sql = 'SELECT * FROM users';
if ($pswd['type']=='admin'){
	print '<td>Klient:</td>	<td><select name="client">';
	foreach ($db->query($sql) as $row) {
		if ($row['type']=='user'){
			print "<option>{$row['user']}</option>";
		}
	}
	print '</td>';
}
else {print "<td>Klient</td><td>{$pswd['user']}</td>";}
print '
</tr>
<tr>
	<td>Gospodarz: </td>	<td><select name="host">';
foreach ($db->query($sql) as $row) {
	if ($row['type']=='admin'){
		print "<option>{$row['user']}</option>";
	}
}
print '</td></tr><tr>	<td>Data: </td>	<td><input type="date" name = "date"></td></tr>';
print '<tr>	<td></td><td><input type = "submit" value = "Pokaż godziny"/></td></tr>';
$title = !empty($_POST['title']) ? $_POST['title'] : '';
$client = !empty($_POST['client']) ? $_POST['client'] : '';
if ($pswd['type']=='user') $client=$pswd['user'];
$host = !empty($_POST['host']) ? $_POST['host'] : '';
$date = !empty($_POST['date']) ? $_POST['date'] : '';
$time = !empty($_POST['time']) ? $_POST['time'] : '';
if (!empty($date))
{ 
	print '<tr>	<td>Godzina: </td>	<td><select name = "time"><option>';
	$dbvis=new visits;
	$avaliable=$dbvis->freeAppointments($date,$host);
	print implode('</option><option>',$avaliable);
	print '</option></td></tr>';	
	print '<tr>	<td></td><td><input type = "submit" value = "Umów"/></td></tr></table>';
}
if ($title!=''&&$client!=''&&$host!=''&&$date!=''&&$time!=''){
	$end = $time + 20;
	$sql="INSERT INTO visits VALUES (NULL, '{$title}', '{$date}', '{$time}', '{$end}', '{$client}', '{$host}', '0');";
	$db->query($sql);
	print 'Dodano wizytę!';
}



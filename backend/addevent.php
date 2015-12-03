<?php
print '<h2>Nowa wizyta</h2><form method="post" action="51.html"><table><tr><td>Rodzaj wizyty:</td><td><input required type="text" name="title"></td></tr><tr>';
$sql = 'SELECT * FROM users';
if ($pswd['type']=='admin'){
	print '<td>Klient:</td>	<td><select required name="client">';
	foreach ($db->query($sql) as $row) {
		if ($row['type']=='user'){
			print "<option>{$row['user']}</option>";
		}
	}
	print '</td>';
}
else {print "<td>Klient</td><td>{$pswd['user']}</td>";}
print '</tr><tr><td></td><td><input type = "submit" value = "Dalej"/></td></tr>';
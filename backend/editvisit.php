<?php
$id = !empty($_GET['id']) ? $_GET['id'] : '';
$ivent = new extVisit;
$ivent->open($_GET['id']);
$sql = 'SELECT * FROM users';
print "<h1>Edytuj wizytę</h1><form method='post'><table>";
if ($pswd['type']=='admin')
{
												 print "<tr><td>Gospodarz:</td><td>{$ivent->getParam('admin')}</td><td><select name='admin'><option>Bez zmian</option>";
	foreach ($db->query($sql) as $row) {
		if ($row['type']=='admin'){
			print "<option>{$row['user']}</option>";
		}
	}
												 print "</td></tr>
														<tr><td>Użytkownik:</td><td>{$ivent->getParam('client')}</td><td><select name='client'><option>Bez zmian</option>";
	foreach ($db->query($sql) as $row) {
		if ($row['type']=='user'){
			print "<option>{$row['user']}</option>";
		}
	}
												 print "</td></tr>";
}
												 print "<tr><td>Tytuł:</td><td>{$ivent->getParam('title')}</td><td><input type='text' name='title'></td></tr>";
if ($pswd['type']=='admin')
{
												 print "<tr><td>Data:</td><td>{$ivent->getParam('date')}</td><td><input type='date' name='date'></td></tr>
														<tr><td>Godzina:</td><td>{$ivent->getParam('time')}</td><td><select name='time' ><option>Bez zmian</option><option>";
	print implode('</option><option>',$appointment);
												 print "</option></td></tr>";
}
												 print "<tr><td><label><input type='checkbox' name='delete' value='1' />Usuń wizytę</label></td><td></td><td><input type='submit' value='Edytuj'></td></tr></table></form>";
if (!empty($_POST['title'])) $ivent->setParam('title', $_POST['title']);
if (!empty($_POST['client'])&&$_POST['client']!='Bez zmian') $ivent->setParam('client', $_POST['client']);
if (!empty($_POST['admin'])&&$_POST['admin']!='Bez zmian') $ivent->setParam('admin', $_POST['admin']);
if (!empty($_POST['date'])) $ivent->setParam('date', $_POST['date']);
if (!empty($_POST['time'])&&$_POST['time']!='Bez zmian') $ivent->setParam('time', $_POST['time']);
if (!empty($_POST['delete'])) $ivent->delete();
$ivent->replace();
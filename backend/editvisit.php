<?php
$id = !empty($_GET['id']) ? $_GET['id'] : '';
$event = new ExtVisit;
$event->open($_GET['id']);
$sql = 'SELECT * FROM users';
print "<h1>Edytuj wizytę</h1><form method='post'><table>";
if ($pswd['type']=='admin')
{
												 print "<tr><td>Gospodarz:</td><td>{$event->getParam('admin')}</td><td><select name='admin'><option>Bez zmian</option>";
	foreach ($db->query($sql) as $row) {
		if ($row['type']=='admin'){
			print "<option>{$row['user']}</option>";
		}
	}
												 print "</td></tr>
														<tr><td>Użytkownik:</td><td>{$event->getParam('client')}</td><td><select name='client'><option>Bez zmian</option>";
	foreach ($db->query($sql) as $row) {
		if ($row['type']=='user'){
			print "<option>{$row['user']}</option>";
		}
	}
												 print "</td></tr>";
}
												 print "<tr><td>Tytuł:</td><td>{$event->getParam('title')}</td><td><input type='text' name='title'></td></tr>";
if ($pswd['type']=='admin')
{
												 print "<tr><td>Data:</td><td>{$event->getParam('date')}</td><td><input type='date' name='date'></td></tr>
														<tr><td>Godzina:</td><td>{$event->getParam('time')}</td><td><select name='time' ><option>Bez zmian</option><option>";
	print implode('</option><option>',$appointment);
												 print "</option></td></tr>";
}
												 print "<tr><td><label><input type='checkbox' name='delete' value='1' />Usuń wizytę</label></td><td></td><td><input type='submit' value='Edytuj'></td></tr></table></form>";
$changes = 0;
if (!empty($_POST['title'])) 
	{
		$event->setParam('title', $_POST['title']);
		$changes ++;
	}
if (!empty($_POST['client'])&&$_POST['client']!='Bez zmian') 
	{
		$event->setParam('client', $_POST['client']);
		$changes ++;
	}
if (!empty($_POST['admin'])&&$_POST['admin']!='Bez zmian')
	{
		$event->setParam('admin', $_POST['admin']);
		$changes ++;
	}
if (!empty($_POST['date'])) 
	{
		$event->setParam('date', $_POST['date']);
		$changes ++;
	}
if (!empty($_POST['time'])&&$_POST['time']!='Bez zmian')
{
	$event->setParam('time', $_POST['time']);
	$event->setEnd();
	$changes ++;
}
if (!empty($_POST['delete']))
	{
		$event->delete();
		$changes ++;
	}
if ($changes > 0)
{
	$event->replace();
	header('Location: 8.html');
}
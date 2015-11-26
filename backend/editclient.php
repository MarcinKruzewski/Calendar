<?php
	$id = !empty($_GET['id']) ? $_GET['id'] : '';
	$client = new extClient;
if ($pswd['type']=='admin')
{
	$client->open($_GET['id']);
}
else
{
	$client->open($pswd['id']);
}
	print "<h1>Edycja danych klienta</h1><table><form method='post'>
			<tr><th>Nazwa użytkownika:</th><td>{$client->getParam('user')}</td><td><input type='text' name='user'></td></tr>
			<tr><th>Hasło:</th><td>{$client->getParam('pswd')}</td><td><input type='text' name='pswd'></td></tr>";
if ($pswd['type']=='admin')
{
	print "	<tr><th>Typ:</th><td>{$client->getParam('type')}</td><td><select name='type'><option>Bez zmian</option><option>user</option><option>admin</option></td></tr>";
}
	print "	<tr><th>eMail:</th><td>{$client->getParam('mail')}</td><td><input type='text' name='mail'></td></tr>
			<tr><th>Telefon:</th><td>{$client->getParam('tel')}</td><td><input type='text' name='tel'></td></tr>";
	print "<tr><td><label><input type='checkbox' name='delete' value='1' />Usuń klienta</label></td><td></td><td><input type='submit' value='Edytuj'></td></tr></table></form>";



if (!empty($_POST['user'])) $client->setParam('user', $_POST['user']);
if (!empty($_POST['pswd'])) $client->setParam('pswd', $_POST['pswd']);
if (!empty($_POST['type'])&&$_POST['type']!='Bez zmian') $client->setParam('type', $_POST['type']);
if (!empty($_POST['mail'])) $client->setParam('mail', $_POST['mail']);
if (!empty($_POST['tel'])) $client->setParam('tel', $_POST['tel']);
if (!empty($_POST['delete'])) $client->delete();
$client->replace();
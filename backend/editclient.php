<?php
	$id = !empty($_GET['id']) ? $_GET['id'] : '';
	$client = new ExtClient;

if ($pswd['type']=='admin')
{
	$client->open($_GET['id']);
}
else
{
	$client->open($pswd['id']);
}
ob_start();
	print "<h1>Edycja danych klienta</h1><table><form method='post'>
			<tr><th>Nazwa użytkownika:</th><td>{$client->getParam('user')}</td><td><input type='text' name='user'></td></tr>
			<tr><th>Hasło:</th><td>********</td><td><input type='password' name='pswd'></td></tr>
			<tr><th>Powtórz hasło:</th><td>********</td><td><input type='password' name='pswd2'></td></tr>";
if ($pswd['type']=='admin')
{
	print "	<tr><th>Typ:</th><td>{$client->getParam('type')}</td><td><select name='type'><option>Bez zmian</option><option>user</option><option>admin</option></td></tr>";
}
	print "	<tr><th>eMail:</th><td>{$client->getParam('mail')}</td><td><input type='text' name='mail'></td></tr>
			<tr><th>Telefon:</th><td>{$client->getParam('tel')}</td><td><input type='text' name='tel'></td></tr>
			<tr><th>Styl strony:</th><td>{$style[$client->getParam('style')]}</td><td><select name='style'><option>Bez zmian</option><option>grey</option><option>blue</option><option>pink</option></td></tr>";
	print "<tr><td><label><input type='checkbox' name='delete' value='1' />Usuń klienta</label></td><td></td><td><input type='submit' value='Edytuj'></td></tr></table></form>";
ob_end_flush();

$changes = 0;
if (!empty($_POST['user']))
{
	$client->setParam('user', $_POST['user']);
	$changes ++;
}
if (!empty($_POST['pswd'])&&!empty($_POST['pswd2'])) 
{
	if ($_POST['pswd']==$_POST['pswd2'])
	{
		$client->setParam('pswd', md5($_POST['pswd']));
		$changes ++;
	}
	else
	{
		print "Hasła nie są identyczne!";
	}
}
if (!empty($_POST['type'])&&$_POST['type']!='Bez zmian') 
{
	$client->setParam('type', $_POST['type']);
	$changes ++;
}
if (!empty($_POST['style']))
{
	if ($_POST['style']=='grey') $client->setparam('style', 1);
	if ($_POST['style']=='blue') $client->setparam('style', 2);
	if ($_POST['style']=='pink') $client->setparam('style', 3);
	$changes ++;
} 
if (!empty($_POST['mail'])) 
{
	$client->setParam('mail', $_POST['mail']);
	$changes ++;
}
if (!empty($_POST['tel'])) 
{
	$client->setParam('tel', $_POST['tel']);
	$changes ++;
}
if (!empty($_POST['delete'])) 
{
	$client->delete();
	$changes ++;
}
if ($changes > 0)
{
	$client->replace();
	header('Location: 8.html');
}
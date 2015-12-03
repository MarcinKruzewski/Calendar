<?php
$param = !empty($_GET['param']) ? $_GET['param'] : NULL;
$value = !empty($_GET['value']) ? $_GET['value'] : NULL;
$clients = new Clients;
if (is_null($param)||is_null($value)) $list = $clients->getClientList($pswd['user']);
else $list = $clients->getClientListFilter($pswd['user'],$param,$value);
print "<h1>Klienci</h1><table><form method='GET' action='index.php'><tr><td><input type='checkbox' name='location' value='6' checked /></td><td><select name='param' /><option>Klient</option><option>eMail</option><option>Telefon</option><option>Typ</option></td><td><input type='text' name='value'></td><td><input type='submit' value='Filtruj'></td></tr></form></table><br><table><tr><th>Użytkownik:</th><th>Typ:</th><th>eMail</th><th>Telefon</th><th>Aktywny:</th></tr>";
if (!empty($list))
{
	foreach ($list as $row)
	{
		print "<tr><td>{$row['user']}</td><td>{$row['type']}</td><td>{$row['mail']}</td><td>{$row['tel']}</td><td>{$row['active']}</td><td><a href='index.php?location=11&id={$row['id']}'>Edytuj</a></td></tr>";
	}
}
<?php
$param = !empty($_GET['param']) ? $_GET['param'] : NULL;
$value = !empty($_GET['value']) ? $_GET['value'] : NULL;
$visits = new visits;
if (is_null($param)||is_null($value)) $list = $visits->getVisitList($pswd['user']);
else $list = $visits->getVisitListFilter($pswd['user'],$param,$value);
print "<h1>Wizyty</h1><table><form method='GET' action='index.php'><tr><td><input type='checkbox' name='location' value='4' checked /></td><td><select name='param' /><option>Tytuł</option><option>Gospodarz</option><option>Użytkownik</option><option>Data</option><option>Godzina</option></td><td><input type='text' name='value'></td><td><input type='submit' value='Filtruj'></td></tr></form></table><br><table><tr><th>Tytuł:</th><th>Gospodarz:</th><th>Klient:</th><th>Data:</th><th>Godzina:</th></tr>";
if (!empty($list))
{
	foreach ($list as $row)
	{
		print "<tr><td>{$row['title']}</td><td>{$row['admin']}</td><td>{$row['client']}</td><td>{$row['date']}</td><td>{$row['time']}</td><td><a href='index.php?location=10&id={$row['id']}'>Edytuj</a></td></tr>";
	}
}
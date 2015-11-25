<?php
print "<h1>Wizyty</h1><table><form method='post'><tr><td>Tytuł:</td><td>Klient:</td><td>Data:</td></tr><tr><td>Tytuł:</td><td>Klient:</td><td>Gospodarz:</td><td>Data:</td></tr>";
foreach ($visits as $row)
{
	print "<tr><td>{$row['title']}</td><td></td><td>Gospodarz:</td><td>Data:</td></tr>";
}
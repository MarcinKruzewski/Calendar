<?php
$date = !empty($_POST['date']) ? $_POST['date'] : '';
$day = date('N',strtotime($date));
if ($businessday[$day]!=1)
{
	print "<h1>Brak zapisów na ten dzień, wybierz inny.</h1><p><a href='52.html'>Powrót</a></p>";
}
else
{
	$visit = json_decode($_SESSION['newVisit'],1);
	$visit['date']=$date;
	$_SESSION['newVisit']=json_encode($visit);
	print '<h2>Nowa wizyta</h2><form method="post" action="54.html"><table>';
	if (!empty($date))
	{ 
		$dbvis=new Visits;
		$avaliable=$dbvis->freeAppointments($visit['date'],$visit['host']);
		if ($avaliable==NULL)
		{
			print "<h1>Brak zapisów na ten dzień, wybierz inny.</h1><p><a href='52.html'>Powrót</a></p>";
		}
		else
		{
			print "<tr><td>Tytuł</td><td>{$visit['title']}</td></tr><tr><td>Klient</td><td>{$visit['client']}</td></tr><tr><td>Gospodarz</td><td>{$visit['host']}</td></tr><tr><td>data</td><td>{$visit['date']}</td></tr><tr>	<td>Godzina: </td>	<td><select name = 'time'><option>";
			print implode('</option><option>',$avaliable);
			print '</option></td></tr>';	
			print '<tr>	<td></td><td><input type = "submit" value = "Umów"/></td></tr></table>';
		}
	}
}
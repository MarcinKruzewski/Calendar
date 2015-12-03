<?php
$date = !empty($_POST['date']) ? $_POST['date'] : '';
$day = date('N',strtotime($date));
if ($businessday[$day]!=1)
{
	print "<h1>Brak zapisów na ten dzień, wybierz inny.</h1><p><a href='index.php?location=52'>Powrót</a></p>";
}
else
{
	$visit = json_decode($_SESSION['newVisit'],1);
	$visit['date']=$date;
	$_SESSION['newVisit']=json_encode($visit);
	print '<h2>Nowa wizyta</h2><form method="post" action="index.php?location=54"><table>';
	if (!empty($date))
	{ 
		$dbvis=new Visits;
		$avaliable=$dbvis->freeAppointments($visit['date'],$visit['host']);
		if ($avaliable==NULL)
		{
			print "<h1>Brak zapisów na ten dzień, wybierz inny.</h1><p><a href='index.php?location=52'>Powrót</a></p>";
		}
		else
		{
			print '<tr>	<td>Godzina: </td>	<td><select name = "time"><option>';
			print implode('</option><option>',$avaliable);
			print '</option></td></tr>';	
			print '<tr>	<td></td><td><input type = "submit" value = "Umów"/></td></tr></table>';
		}
	}
}
<?php
class Visits {

	public function getJSONlist($user)
	{
		global $db, $pswd;
		$list='[';
		$sql = 'SELECT * FROM visits ORDER BY `visits`.`date` DESC';
		foreach ($db->query($sql) as $row) {
			if (($row['admin']==$pswd['user']||$row['client']==$pswd['user'])&&$row['confirmed']==1){
				$list .= "{ id: '{$row['id']}', title: '{$row['title']}, {$row['admin']}.', start: '{$row['date']}T{$row['time']}', end: '{$row['date']}T{$row['end']}', url: 'index.php?location=10&id={$row['id']}' },";
			}
		}
		$list.=']';
		return $list;
	}

	public function getVisitList($user)
	{
		global $db, $pswd;
		$sql = 'SELECT * FROM visits ORDER BY `visits`.`date` DESC';
		foreach ($db->query($sql) as $row) 
		{
			if ($row['admin']==$pswd['user']||$row['client']==$pswd['user'])
			{
				$list[] = $row;
			}
		}
		$return = !empty($list) ? $list : '';
		return $return;
	}

	public function getVisitListFilter($user, $param, $value)
	{
		global $db, $pswd;
		$translate['Tytuł']='title';
		$translate['Gospodarz']='admin';
		$translate['Użytkownik']='client';
		$translate['Data']='date';
		$translate['Godzina']='time';
		$translate['confirmed']='confirmed';
		$param = $translate[$param];
		$sql = "SELECT * FROM visits WHERE `{$param}` LIKE '%{$value}%' ORDER BY `visits`.`date` DESC;";
		foreach ($db->query($sql) as $row) 
		{
			if ($row['admin']==$pswd['user']||$row['client']==$pswd['user'])
			{
				$list[] = $row;
			}
		}
		$return = !empty($list) ? $list : '';
		return $return;
	}

	public function freeAppointments($date, $admin)
	{
		global $db, $appointment;
		$sql = "SELECT * FROM `visits` WHERE `date`='{$date}' AND `admin` LIKE '{$admin}'";
		$appprim=$appointment;
		$licz=count($appprim);
		foreach ($db->query($sql) as $row) 
		{
			for ($i = 0; $i < $licz; $i++)
			{
				if ($row['time']==$appprim[$i])
					{
						$appprim[$i]='del';
					}
			} 
		}
		$lenght=count($appprim);
		for ($i = 0; $i < $lenght; $i++)
		{
			if ($appprim[$i]=="del") unset($appprim[$i]);
		}
		return $appprim;
	}

}


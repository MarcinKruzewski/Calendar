<?php
class visits {

	public function getJSONlist($user)
	{
		global $db, $pswd;
		$list='[';
		$sql = 'SELECT * FROM visits ORDER BY `visits`.`date` DESC';
		foreach ($db->query($sql) as $row) {
			if ($row['admin']==$pswd['user']||$row['client']==$pswd['user']){
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

class extVisit extends visits
{

	private $_opened;

	public function __construct()
	{
		$this->_opened['id']='NULL';
	}

	public function open($id)
	{
		global $db;
		$sql = "SELECT * FROM visits WHERE id={$id}";
		$opening = $db->query($sql);
		$this->_opened = $opening->fetch_assoc();
	}

	public function setParam($param, $value)
	{
		$this->_opened[$param] = $value;
	}

	public function setEnd()
	{
		global $closingHour, $appointmentStep, $appointment;
		$cla=$closingHour-1;
		$clm=60-$appointmentStep;
		$lastapp="{$cla}:{$clm}";
		for ($i = 0; $i < count($appointment); $i++) 
		{
			if ($this->_opened['time']==$lastapp) $this->_opened['end']="{$closinhHour}:00";
			elseif ($this->_opened['time']==$appointment[$i]) $this->_opened['end']=$appointment[$i+1];
		}
	}

	public function getParam($param)
	{
		return $this->_opened[$param];
	}

	public function replace()
	{
		global $db;
		if ($this->_opened['id']!='NULL')
		{
			$sql = "UPDATE `visits` SET `title`='{$this->_opened['title']}', `date`='{$this->_opened['date']}', `time`='{$this->_opened['time']}', `end`='{$this->_opened['end']}', `client`='{$this->_opened['client']}', `admin`='{$this->_opened['admin']}' WHERE `visits`.`id` = {$this->_opened['id']}; ";
		}
		else
		{
			$sql = "INSERT INTO `visits` VALUES ('{$this->_opened['id']}', '{$this->_opened['title']}', '{$this->_opened['date']}', '{$this->_opened['time']}', '{$this->_opened['end']}', '{$this->_opened['client']}', '{$this->_opened['admin']}', '0');";
		}
		$db->query($sql);
	}

	public function confirm()
	{
		global $db;
		$sql = "UPDATE `visits` SET `confirmed`=1 WHERE `visits`.`id` = {$this->_opened['id']}; ";
		$db->query($sql);
	}

	public function delete()
	{
		global $db;
		$sql = "DELETE FROM `visits` WHERE `visits`.`id` = {$this->_opened['id']}";
		$db->query($sql);
	}

}
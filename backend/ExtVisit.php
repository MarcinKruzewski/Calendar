<?php
class ExtVisit extends Visits
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
		$sql = "UPDATE `visits` SET `confirmed`= '1' WHERE `visits`.`id` = {$this->_opened['id']}; ";
		$db->query($sql);
	}

	public function delete()
	{
		global $db;
		$sql = "DELETE FROM `visits` WHERE `visits`.`id` = {$this->_opened['id']}";
		$db->query($sql);
	}

}
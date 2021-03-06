<?php

class ExtClient extends Clients
{

	private $_opened;

	public function __construct()
	{
		$this->_opened['id']='NULL';
	}

	public function open($id)
	{
		global $db;
		$sql = "SELECT * FROM users WHERE id={$id}";
		$opening = $db->query($sql);
		$this->_opened = $opening->fetch_assoc();
	}

	public function setParam($param, $value)
	{
		$this->_opened[$param] = $value;
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
			$sql = "UPDATE `users` SET `user`='{$this->_opened['user']}', `pswd`='{$this->_opened['pswd']}', `type`='{$this->_opened['type']}', `mail`='{$this->_opened['mail']}', `tel`='{$this->_opened['tel']}', `active`='{$this->_opened['active']}', `style`='{$this->_opened['style']}' WHERE `users`.`id` = {$this->_opened['id']}; ";

		}
		else
		{
			$sql = "INSERT INTO `users` VALUES ('{$this->_opened['id']}', '{$this->_opened['user']}', '{$this->_opened['pswd']}', '{$this->_opened['sessionid']}', '{$this->_opened['type']}', '{$this->_opened['mail']}', '{$this->_opened['tel']}', '0');";
		}
		$db->query($sql);
	}


	public function delete()
	{
		global $db;
		$sql = "DELETE FROM `users` WHERE `users`.`id` = {$this->_opened['id']}";
		$db->query($sql);
	}

}
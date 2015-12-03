<?php
class Clients {

	public function getClientList($user)
	{
		global $db, $pswd;
		$sql = 'SELECT * FROM users ORDER BY `user` DESC';
		foreach ($db->query($sql) as $row) 
		{
			if ('admin'==$pswd['user']||$row['user']==$pswd['user'])
			{
				$list[] = $row;
			}
		}
		return $list;
	}

	public function getClientListFilter($user, $param, $value)
	{
		global $db, $pswd;
		$translate['Klient']='user';
		$translate['eMail']='mail';
		$translate['Telefon']='tel';
		$translate['Typ']='type';
		$param = $translate[$param];
		$sql = "SELECT * FROM users WHERE `{$param}` LIKE '%{$value}%' ORDER BY `user` DESC;";
		foreach ($db->query($sql) as $row) 
		{
			if ('admin'==$pswd['user']||$row['user']==$pswd['user'])
			{
				$list[] = $row;
			}
		}
		$return = !empty($list) ? $list : '';
		return $return;
	}

}

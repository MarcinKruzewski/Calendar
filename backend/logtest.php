<?php
session_start();
$user = !empty($_SESSION['user']) ? $_SESSION['user'] : 'Anonim';
$sid = !empty($_SESSION['sid']) ? $_SESSION['sid'] : 'not loged in';
if ($user!='Anonim'){
	$sql = "SELECT * FROM users WHERE user = '{$user}'";
	$query = $db->query($sql);
	$pswd = $query->fetch_assoc();
}
else{
	$pswd['type']=NULL;
	$pswd['user']=NULL;
	$pswd['pswd']=NULL;
	$pswd['mail']=NULL;
	$pswd['sessionid']=NULL;
	$pswd['style']=NULL;
}
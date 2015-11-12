<?php
session_start();
$user = !empty($_SESSION['user']) ? $_SESSION['user'] : 'Anonim';
$sid = !empty($_SESSION['sid']) ? $_SESSION['sid'] : 'not loged in';
if ($user!='Anonim'){
	$sql = "SELECT * FROM users WHERE user = '{$user}'";
	$query = $db->query($sql);
	$pswd = $query->fetch_assoc();
	if ($user != 'Anonim'){
		print "<div class='top'><p>Witaj {$user}! &nbsp &nbsp <a href='index.php?location=7' class='decoration'>Wyloguj</a></p></div>";
	}

}
else{
	print "<div class='top'><p>Niezalogowany</p></div>";
	$pswd['type']=NULL;
	$pswd['user']=NULL;
	$pswd['pswd']=NULL;
	$pswd['mail']=NULL;
	$pswd['sessionid']=NULL;
}
<?php
print '<h2>Logowanie</h2>';
print '
<form method="post">
<table>
<tr>
	<td>Użytkownik:</td>	<td><input type="text" name = "user"></td>
</tr>
<tr>
	<td>Hasło: </td>	<td><input type="password" name = "try"></td>
</tr>
<tr>
	<td></td><td><input type = "submit" value = "Zaloguj"/></td>
</tr>
</table>';
$user=!empty($_POST['user']) ? $_POST['user'] : '';
$try=!empty($_POST['try']) ? $_POST['try'] : 'wrong';
if($user!=''){
	$sql = "SELECT * FROM users WHERE user = '{$user}'";
	$query = $db->query($sql);
	$pswd = $query->fetch_assoc();
	if($pswd['active']==1){
		if($try==$pswd['pswd']){
			session_start();
			$_SESSION['user']=$user;
			$_SESSION['sid']=$pswd['sessionid'];
			header('Location: index.php?location=0');
		}else{
			print '<br>Błąd!';
		}
	}
	else{
		print 'Urzytkownik nieaktywny!';
	}
}
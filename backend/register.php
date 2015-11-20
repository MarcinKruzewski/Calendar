<?php

function generateRandomString($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}

print '<h2>Rejestracja</h2>';
print '
<form method="post">
<table>
<tr>
	<td>Imię i Nazwisko:</td>	<td><input type="text" name = "user"></td>
</tr>
<tr>
	<td>Hasło: </td>	<td><input type="password" name = "pswd"></td>
</tr>
<tr>
	<td>Powrórz hasło: </td>	<td><input type="password" name = "pswd2"></td>
</tr>
<tr>
	<td>eMail: </td>	<td><input type="text" name = "mail"></td>
</tr>
<tr>
	<td>Telefon: </td>	<td><input type="text" name = "tel"></td>
</tr>
<tr>
	<td></td><td><input type = "submit" value = "Rejestruj"/></td>
</tr>
</table>';
$user=!empty($_POST['user']) ? $_POST['user'] : '';
$pswd=!empty($_POST['pswd']) ? $_POST['pswd'] : '';
$pswd2=!empty($_POST['pswd2']) ? $_POST['pswd2'] : '';
$mail=!empty($_POST['mail']) ? $_POST['mail'] : '';
$tel=!empty($_POST['tel']) ? $_POST['tel'] : '';
if($user!=''||$pswd!=''||$pswd2!=''||$mail!=''||$tel!=''){
	$sql="SELECT mail FROM users";
	foreach ($db->query($sql) as $row) {
		if($row['mail']==$mail) {
			print 'Podany adres eMail istnieje już w bazie!<br>';
			$mail='';
		}
	}
	if($user=='')print 'Podaj nazwę użytkownika!';
	elseif($pswd=='')print 'Podaj hasło!';
	elseif($pswd2!=$pswd)print 'Hasła nie są identyczne!';
	elseif($mail=='')print 'Podaj adres eMail!';
	elseif($tel=='')print 'Podaj nr telefonu!';
	else{
		$sid=generateRandomString();
		$sql="INSERT INTO users VALUES (NULL, '{$user}', '{$pswd}', '{$sid}', 'user', '{$mail}', '{$tel}' '1');";
		$db->query($sql);
		/*$msg="Witamy w Termainarzu!\n \nPoniżej znajduje się link aktywacyjny:\nhttp://localhost/activate.php?A61IJx3DFt='{$mail}'\n \nTwój login to:  {$user}\nTwoje hasło to: {$pswd}";
		$headers = 'From: <noreply@klukowo.com>';
		$subject = 'Aktywacja konta w terminarzu.';
		mail($mail,$subject,$msg,$headers);*/
		print ('Dodano użytkownika!');
	}
}
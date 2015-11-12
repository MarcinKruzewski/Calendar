<?php
include 'backend/dbconnect.php';
$mail=!empty($_GET['A61IJx3DFt']) ? $_GET['A61IJx3DFt'] : NULL;
$sql="UPDATE users SET active = '1' WHERE mail = {$mail}"; 
print $sql;
$db->query($sql);
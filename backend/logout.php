<?php
$_SESSION['user'] = NULL;
$_SESSION['sid'] = NULL;
session_destroy();
header ('Location: 0.html');
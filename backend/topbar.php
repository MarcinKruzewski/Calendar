<?php
if ($user!='Anonim')
{
	print "<div class='top'><p>Witaj {$user}! &nbsp &nbsp <a href='index.php?location=7' class='decoration'>Wyloguj</a></p></div>";
}
else
{
	print "<div class='top'><p>Niezalogowany</p></div>";
}
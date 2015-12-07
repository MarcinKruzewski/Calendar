<?php
//Zestawienie godzin wizyt
$businessday = array(
	1 = 1,		//Dni robocze(1 = poniedziałek, 7 = niedziela/1 = pracujący, 0 = wolny)	
	2 = 1,
	3 = 1,
	4 = 1,
	5 = 1,
	6 = 0,
	7 = 0,
	);

$appointmentStep = 20;			//Kolejna wizyta co 20min
$openingHour = 7;				//otwarte od 7:00
$closingHour = 17;				//otwarte do 17:00

for ($i = 1; $i <= 24; $i++)
{
	if ($i >= $openingHour && $i < $closingHour)
	{
		for ($j = 0; $j < 60; $j += $appointmentStep)
		{
			$io = $i < 10 ? "0{$i}" : $i;
			$appointment[] = $j<10 ? "{$io}:0{$j}" : "{$io}:{$j}";
		}
	}
}
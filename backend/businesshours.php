<?php
//Zestawienie godzin wizyt
$businessday[1] = 1;
$businessday[2] = 1;
$businessday[3] = 1;
$businessday[4] = 1;
$businessday[5] = 1;
$businessday[6] = 0;
$businessday[7] = 0;

$appointmentStep = 20;
$openingHour = 7;
$closingHour = 17;

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
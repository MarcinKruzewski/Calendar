<?php
$visit = json_decode($_SESSION['newVisit'],1);
$adding = new ExtVisit;
$adding->setParam('title', $visit['title']);
$adding->setParam('date', $visit['date']);
$adding->setParam('time', $visit['time']);
$adding->setParam('client', $visit['client']);
$adding->setParam('admin', $visit['host']);
$adding->setEnd();
$adding->replace();
print '<h1>Dziękuję!</h1><p>Wizyta została dodana. Możesz sprawdzić jej poprawność na liście wizyt, jednak w kalendarzu pojawi się dopiero po akceptacji przez gospodarza.</p>';
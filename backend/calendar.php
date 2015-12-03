<?php
$date=date('Y-m-d');

print"
<script>
	$(document).ready(function() {
		var currentLangCode = 'pl';
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'month,agendaWeek,agendaDay'
			},
			defaultDate: '{$date}',
			lang: currentLangCode,
			businessHours: true,
			eventLimit: true,
			events: ";
$visit = new Visits;
$list = $visit->getJSONlist($pswd['user']);
print $list;
print "	});	});</script>
<div class='calendar' id='calendar'></div>";
<?php
print '<div class="container">    <div id="sidebar">        <ul>';
if ($sid==$pswd['sessionid']) {
	if ($pswd['type']=='user'){
		print '
    	        <li><a href="index.php?location=0">O nas</a></li>
        	    <li><a href="index.php?location=3">Kalendarz</a></li>
        	    <li><a href="index.php?location=4">Wizyty</a></li>
            	<li><a href="index.php?location=5">Umów wizytę</a></li>
       		    <li><a href="index.php?location=7">Wyloguj</a></li>
			  ';
	}
	if ($pswd['type']=='admin'){
		print '
    	        <li><a href="index.php?location=0">O nas</a></li>
        	    <li><a href="index.php?location=3">Kalendarz</a></li>
        	    <li><a href="index.php?location=4">Wizyty</a></li>
            	<li><a href="index.php?location=5">Umów wizytę</a></li>
            	<li><a href="index.php?location=6">Klienci</a></li>
       		    <li><a href="index.php?location=7">Wyloguj</a></li>
			  ';
	}
}	
else{
	print '
            <li><a href="index.php?location=0">O nas</a></li>
            <li><a href="index.php?location=1">Zarejestruj</a></li>
            <li><a href="index.php?location=2">Zaloguj</a></li>
          ';
}


print '</ul>    </div> <div class="main-content">
        <div class="swipe-area"></div>
        <a href="#" data-toggle=".container" id="sidebar-toggle">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
        <div class="content">';

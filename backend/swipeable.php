<?php
print '<div class="container">    <div id="sidebar">        <ul>';
if ($sid==$pswd['sessionid']) {
	if ($pswd['type']=='user'){
		print '
    	        <li><a href="0.html">O nas</a></li>
        	    <li><a href="3.html">Kalendarz</a></li>
        	    <li><a href="4.html">Wizyty</a></li>
            	<li><a href="5.html">Umów wizytę</a></li>
                <li><a href="11.html">Edytuj dane użytkownika</a></li>
       		    <li><a href="7.html">Wyloguj</a></li>
			  ';
	}
	if ($pswd['type']=='admin'){
		print '
    	        <li><a href="0.html">O nas</a></li>
        	    <li><a href="3.html">Kalendarz</a></li>
        	    <li><a href="4.html">Wizyty</a></li>
            	<li><a href="5.html">Umów wizytę</a></li>
                <li><a href="9.html">Potwierdź wizyty</a></li>
            	<li><a href="6.html">Klienci</a></li>
       		    <li><a href="7.html">Wyloguj</a></li>
			  ';
	}
}	
else{
	print '
            <li><a href="0.html">O nas</a></li>
            <li><a href="1.html">Zarejestruj</a></li>
            <li><a href="2.html">Zaloguj</a></li>
          ';
}


print '</ul>    </div><div class="main-content"> 
        <div class="swipe-area"></div>
        <a href="#" data-toggle=".container" id="sidebar-toggle">
            <span class="bar"></span>
            <span class="bar"></span>
            <span class="bar"></span>
        </a>
        <div class="content">';

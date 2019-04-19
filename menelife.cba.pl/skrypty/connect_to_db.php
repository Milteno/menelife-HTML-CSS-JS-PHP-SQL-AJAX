<?php 
	$serwer = "mysql.cba.pl";
	$user = "menelife";
	$pass = "kappa123";
	$db = "menelife";
	
	@mysql_connect($serwer, $user, $pass) or die ("Niepoporawne dane logowania");
	@mysql_select_db($db) or die ("Niepoprawna baza danych");
	

?>
<?php
session_start();
require_once('/profiles/m/me/men/menelife/menelife.cba.pl/skrypty/funkcje.php');
require_once('/profiles/m/me/men/menelife/menelife.cba.pl/skrypty/connect_to_db.php');

$User = UserInfo($_SESSION['id']);

switch($_GET['type']) {
	case "strength":
		mysql_query("UPDATE Users SET sila=(sila+1), PU=(PU-1) WHERE id='" .$User['id']."'");
		echo 'Dodałeś 1 siły';
		break;
}


?>
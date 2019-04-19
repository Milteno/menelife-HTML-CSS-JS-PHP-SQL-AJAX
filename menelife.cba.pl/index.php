<?
	session_start();
	ob_start();
	require_once('/profiles/m/me/men/menelife/menelife.cba.pl/skrypty/funkcje.php');
	require_once('/profiles/m/me/men/menelife/menelife.cba.pl/skrypty/connect_to_db.php');
	userOnline($_SESSION['id']);
?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="Stylesheet" type="text/css" href="../css/style.css" />
<link rel="Stylesheet" type="text/css" href="../animations/css/hover.css" />
<title>Menelife</title>
</style>
</head>
<body>



 <div id="wrapper">
    <div id="header">   
     <div id="menu">
        <ul>
		<li><a href="?link=index">Strona głowna</a></li>
		<li><a href="?link=podstrona1">Podstrona 1 </a></li>
        <li><a href="?link=nowosci">Nowości</a></li>
        <li><a href="?link=onas">O nas</a></li>
        <li><a href="?link=kontakt">Kontakt</a></li>
		<li><a href="?link=rejestracja">Rejestracja</a></li>
		<li><a href="?link=logowanie">Logowanie</a></li>
        </ul>
    </div>
    </div>   
    
    <div id="login">
    <h2>Panel logowania</h2>
    <a href="#"></a><br/>
    <a href="#"></a><br/>
    </div>
    </div>
    <div id="footer">
        <p>GRZEGORZ KRUL STRONY - WSZELKIE PRAWA ZASTRZEŻONE!</p>
    </div>
    </div>
	
	
	
	
<?php
switch($_GET['link'])
{
	case "index";
		include ('#');
		break;
	case "podstrona1";
		include ('podstrona1.php');
		break;
	case "nowosci";
		include ('nowosci.php');
		break;
	case "onas";
		include ('onas.php');
		break;
	case "kontakt";
		include ('kontakt.php');
		break;
	case "logowanie";
		include ('logowanie.php');
		break;
	case "rejestracja";
		include ('rejestracja.php');
		break;
	default:
		include('info.php');
		break;
}

?>
</body>
</html>

<?
	ob_end_flush();
?>


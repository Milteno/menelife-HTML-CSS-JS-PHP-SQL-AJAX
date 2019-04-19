
<html>

	<head>

	</head>
	<body>
	<div>
		<?
session_start();
	ob_start();
	require_once('/profiles/m/me/men/menelife/menelife.cba.pl/skrypty/funkcje.php');
	require_once('/profiles/m/me/men/menelife/menelife.cba.pl/skrypty/connect_to_db.php');
	require_once('/profiles/m/me/men/menelife/menelife.cba.pl/game/postac.php');
$User = UserInfo($_SESSION['id']);

echo 'Witaj  <b>'.$User['login']."</b><br/>";
?>
	</div>
	<div>
	<a href="?link=postac">Twój menel</a><br/>
	<? if($poczta>0) 
	{
		echo"<a href='?link=wiadomosci'><b>Wiadomosci (".$poczta.")</b></a><br/>";
	}
		else 
	{
		echo "<a href='?link=wiadomosci'>Wiadomosci</a><br/>";
	}
	?>
	<a href="../wylogowanie.php">Wyloguj</a><br/>
	</div>
	</body>
</html>
<?

	require_once('/profiles/m/me/men/menelife/menelife.cba.pl/skrypty/funkcje.php');
	require_once('/profiles/m/me/men/menelife/menelife.cba.pl/skrypty/connect_to_db.php');
	require_once('/profiles/m/me/men/menelife/menelife.cba.pl/game/postac.php');
	
	userOffline($_SESSION['id']);
	$User = UserInfo($_SESSION['id']);
	$poczta = mysql_num_rows(mysql_query("SELECT * FROM wiadomosci WHERE odbiorca='".$User['id']."' AND przeczytane=0"));
	
	
	echo 'Witaj'.$User['login']."<br/>";
	
	switch($_GET['link']) {
		case "postac":
			include ('/postac.php');
			break;
		case "wiadomosci":
			include('/wiadomosci.php');
			break;
		default:
			include ('/postac.php');
			break;
	}
	ob_end_flush();
	?>
	
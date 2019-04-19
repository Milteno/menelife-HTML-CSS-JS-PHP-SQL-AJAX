<h1>Wiadomosci</h1>
<? 
	if(!isset($_GET['akcja'])) {
		$_GET['akcja'] = 0;
	$ask = mysql_query("SELECT *  FROM wiadomosci WHERE odbiorca='".$User['id']."' AND odbiorca='".$User['id']."' ORDER BY data DESC");
	$poczta_ile = mysql_num_rows($ask);
		if($poczta_ile > 0 ) {
			echo "<table border=1px width=90%>
			<tr><th>Odbiorca</th><th> Temat</th><th>Data</th></tr>
			";
			while ($p = mysql_fetch_array($ask)) {
				$poczta_od = mysql_fetch_array(mysql_query("SELECT * FROM Users WHERE id='".$p['odbiorca']."'"));
					if($p['przeczytane'] == 1) {
						echo "<tr><td width=20%>".$poczta_od['login']."</td><td><a href='?link=wiadomosci&akcja=1&msg_id=".$p['id']."'>".$p['temat']."</a></td><td width=30%>".date("j.n.Y (H:i) ",$p['data'])."</td></tr>"
					} else { 
				echo "<tr><td width=20%>".$poczta_od['login']."</td><td><a href='?link=wiadomosci&akcja=1&msg_id=".$p['id']."'>".$p['temat']."</a></td><td width=30%>".date("j.n.Y (H:i) ",$p['data'])."</td></tr>"
					}
		 }
		 echo "</table><br><br><a href='?link=wiadomosci_send'> Wyślij wiadomosc </a>";
		} else  echo "Brak wiadomosci.<br><br><a href='?link=wiadomosci_send'>Wyślij wiadomosc</a>";
	}elseif (isset($_GET['akcja']) && $_GET['akcja'] == 1) {
		$poczta_id = (int)$_GET['msg_id'];
			if(isset($_GET['msg_id'])) {
				$ask2 = mysql_query("SELECT * FROM wiadomosci WHERE id='".$poczta_id."' AND odbiorca='".$User['id']."'");
				$p_ile = mysql_num_rows($ask2);
				if($p_ile == 1);
					$p = mysql_fetch_array($ask2);
					$poczta_od = mysql_fetch_array(mysql_query("SELECT * FROM Users WHERE id='".$p['odbiorca']."'"));
					if ($p['przeczytane'] == 0 ) {
					mysql_query("UPDATE wiadomosci SET przeczytane=1 WHERE id='".$p['id']."' AND odbiorca='".$User['id']."'");
					}
					echo "
					<table border=1px width=90%>
						<tr><td width=40%> Wiadomosc wyslana od <b>".$poczta_od['login']."</b></td><td> Data: <b> </td></tr>
					</table>
					<table border=1px width=90%>
						<tr><td width=20%>Temat</td><td width=60%>".$p['temat']."</td></tr>
						<tr><td colspan=2>".$p['tresc']."</td></tr>
						<tr><td colspan=2><center><a href='?link=wiadomosci&akcja=2&msg_id=".$p['id']."'> USUN wiadomosci
					</table>
					";
				 } else echo "Nieoczekiwany blad Prosze odwiedzic poczte pozniej. #error_1";
	} else echo "Nieoczekiwany blad Prosze odwiedzic poczte pozniej. #error_2";
	}elseif(isset( //do zrobienia
					
			
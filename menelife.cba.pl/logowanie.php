<b style="font-size:25;">Logowanie</b>
<form method="POST" action='?link=logowanie'>
	<table>
		<tr><td>Login: 					</td><td><input type='text' name='login' /></td></tr>
		<tr><td>Haslo:					</td><td><input type='password' name='pass' /></td></tr>
		<tr><td><input type='submit' value='Zaloguj' name="submit"/></td></tr>
</table>
</form>
<?
	$login = checkData($_POST['login']);
	$pass = sha1($_POST['pass']);
	$submit = $_POST['submit'];
	
	if(!empty($_POST)){
		if(isset($submit)){
			if(!empty($login) && !empty($pass)){
				$ile= mysql_num_rows(mysql_query("SELECT * FROM Users WHERE login='".$login."' AND haslo='".$pass."'"));
					if($ile == 1){
						$sql = mysql_fetch_array(mysql_query("SELECT * FROM Users WHERE login='".$login."' AND haslo='".$pass."'"));
						$_SESSION = array();
						$_SESSION['id'] = $sql['id'];
						header('Location: game/index.php');
					} else echo "Błędne dane!";
			}else echo "Wypełnij wszystkie pola!";
		}
	}
						




<b style="font-size:25;"> Rejestracja</b>
<form method="POST" action='?link=rejestracja'>
	<table>
	<tr><td>Nazwa konta (6-20 znaków): 		</td><td><input type='text' name='login' /></td></tr>
	<tr><td>Haslo (8-20 znakow): 					</td><td><input type='password' name='pass1' /></td></tr>
	<tr><td>Powtórz hasło: 			 				</td><td><input type='password' name='pass2' /></td></tr>
	<tr><td>E-mail:									 		</td><td><input type='text' name='email' /></td></tr>
	<tr><td><input type='submit' value='Zarejestruj' name="submit"/></td></tr>
</table>
</form>
<?
	$login = $_POST["login"];
	$pass1 = $_POST["pass1"];
	$pass2 = $_POST["pass2"];
	$email = $_POST["email"];
	$submit = $_POST["submit"];
	
	if(!empty($_POST)){
		if(isset($submit)){
			if(!empty($login) && !empty($pass1) && !empty($pass2) && !empty($email)) {
				if(strlen($pass1) >= 8 && strlen($pass1) <=20){
					if($pass1 == $pass2){
						if(strlen($login) >= 6 && strlen($login)<=20){
							$login = checkData($login);
							$pass1 = sha1($pass1);
							$email = checkData($email);
							$ile = mysql_num_rows(mysql_query("SELECT * FROM Users WHERE login='".$login."' OR email='".$email."'"));
								if($ile == 0) {
									mysql_query("INSERT INTO Users (login, haslo, email) VALUES ('".$login."', '".$pass1."', '".$email."')");
									echo "<b style='color: red; font-size: 18;'> Konto zostalo stworzone! Przejdz do logowania</b>";
								}else echo "<b style='color: red; font-size: 18;'> Login lub email sa juz w uzyciu</b>";
						}else echo "<b style='color: red; font-size: 18;'> Nazwa konta musi zawierac od 6 do 20 znakow!</b>";
					}else echo "<b style='color: red; font-size: 18;'> Musisz powtorzyc to samo haslo!</b>";
				}else echo "<b style='color: red; font-size: 18;'> Haslo musi zawierac od 8 do 20 znakow!</b>";
			}else echo "<b style='color: red; font-size: 18;'> Wypelnij wszystkie dane!</b>";
		}
	}
?>
	





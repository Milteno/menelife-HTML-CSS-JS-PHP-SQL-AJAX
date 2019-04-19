<?php
	function checkData($tekst){
		return mysql_real_escape_string(strip_tags($tekst));
	}
	function userOffline($sesja){
		if(empty($sesja)) return header("Location: ../index.php");
		else {
			return $sesja;
		}
	}
	function userOnline($sesja){
		if(!empty($sesja)) return header("Location: game/index.php");
	}
	function UserInfo($sesja){
		$user = mysql_fetch_array(mysql_query("SELECT * FROM Users WHERE id='".$sesja."'"));
		return $user;
	}
	
?>
<h1> Menel </h1>
<?
	require_once('/profiles/m/me/men/menelife/menelife.cba.pl/skrypty/funkcje.php');
	require_once('/profiles/m/me/men/menelife/menelife.cba.pl/skrypty/connect_to_db.php');
	
	$User = UserInfo($_SESSION['id']);

	
	?>

<?php

	
function typ($player){
	switch($player['typ']) {
		case 1:
			return "menel_miotaczpuszek";
			break;
		case 2:
			return "menel_religijny";
			break;
		case 3:
			return "menel_ruski";
			break;
	}
}
function ranking($user){
	$ask = mysql_query("SELECT * FROM users ORDER BY level DESC");
	$i = 0;
	while($a=mysql_fetch_array($ask)){
		$i++;
		if($a['id'] ==$user['id']){
			echo $i;
			break;
		}
	}
}

$User_typ = typ($User);

if($User['PU'] == 0) 
{
	echo "
	<table style='border: solid 2px black;' width=100%>
	<tr>
		<th> Nazwa: </th><td>".$User['login']. "</td>
	</tr>
	<tr>
		<th> Poziom: </th><td>".$User['level']. "</td>
	</tr>
	<tr>
		<th> Klasa:  </th><td>".$User_typ. "</td>
	</tr>
	<tr>
	<th Ranking </th><td> ".ranking($User). "<td/>
	</tr>
		<th colspan=2>Statystyki || PU: ".$User['PU']. "
			<tr><td>Health Points </td><td>".$User['hp']. "/" .$User['maxhp']. " </td></tr>
			<tr><td>Sila</td><td>".$User['sila']. " </td></tr>
			<tr><td>Pancerz</td><td>".$User['pancerz']. " </td></tr>
			<tr><td>Inteligencja</td><td>".$User['inteligencja']. "</td></tr>
			<tr><td>Zrecznosc</td><td>".$User['zrecznosc']. "</td></tr>
	</th>
<tr>
</tr>
</table>";
} 
else {
	echo "
	<table style='border: solid 2px black;' width=100%>
		<tr>
		<th> Nazwa: </th><td>".$User['login']. "</td>
	</tr>
	<tr>
		<th> Poziom: </th><td>".$User['level']. "</td>
	</tr>
	<tr>
		<th> Klasa: </th><td>".$User_typ."</td>
	</tr>
	<tr>
	<th Ranking </th><td> ".ranking($User). "<td/>
	</tr>
		<th colspan=2 class='stats'>Statystyki || PU: ".$User['PU']. "
			<tr><td>Health Points</td><td>".$User['hp']. "/" .$User['maxhp']." </td></tr>
			<tr><td>Sila</td><td>".$User['sila']. " <span class='add-strength'> [+1] </span></td></tr>
			<tr><td>Pancerz</td><td>".$User['pancerz']. " <span class='add-armor'> [+1] </span></td></tr>
			<tr><td>Inteligencja</td><td>".$User['inteligencja']. "<span class='add-int'> [+1] </span></td></tr>
			<tr><td>Zrecznosc</td><td>".$User['zrecznosc']. "<span class='add-agility'> [+1] </span></td></tr>
	</th>
	</table>

	<p id='response'></p>";
}



?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script>
$("span").click(function() {
	var type = $(this).attr("class").split("-")[1];
	console.log(type);
	$.ajax({
		url: "postacapi.php",
		method: "GET",
		data: "type="+type,
		success: function(data) {
        	$("#response").html(data);
   		},
	})
})
</script>		






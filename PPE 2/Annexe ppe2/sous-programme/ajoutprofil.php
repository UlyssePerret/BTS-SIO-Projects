<?php
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$login = $_POST["mail"];	
$passe = $_POST["mdp"];
@mysql_connect("localhost","root","");
mysql_select_db("ppe2");
	$req2 = "insert into ppe2.profil (nom, prenom, mail, mdp) 
		values ('$nom', '$prenom', '$login', '$passe')";
	//echo $req2;
	$res2 = mysql_query($req2);
if(!$res2) echo mysql_error();
else {
		header("location:cahierdetexte.php");
	}
		


?>
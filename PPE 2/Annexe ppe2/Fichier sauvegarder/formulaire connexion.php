<?php session_start();
if(isset($_POST["bouton"]) )  //Connexion
{
$login = $_POST["mail"];	
$passe = $_POST["passe"];
@mysql_connect("localhost","root","");
	mysql_select_db("ppe2");
	$req1 = "select * from profil where mail= '$login'
					and mdp = '$passe'";
	$res1 = mysql_query($req1);
	$ligne1 = mysql_fetch_assoc($res1);
	
	if(mysql_num_rows($res1)>0)
		{
			$_SESSION["nom"] = $ligne1["nom"];
			$_SESSION["prenom"] = $ligne1["prenom"];
			header("location:cahierdetexte.php");
		}
	else{
				$erreur = "Erreur de connexion, veuillez ressayez ou de vous enregistrez....";
			}
	
} // D'aprés le travail sur l'hopital
?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>  <center>
<div class="haut">
<p>
<img src="image/logo_ipssi.png" alt="logo Ipssi" />
<img src="image/logo2.png" alt="logo Ip-Formation" />
</p>
</div>

<h1> Formulaire de connexion </h1>
<hr></hr>

<form action="formulairesimple.php" method="post">
<?php if(isset($erreur))  echo "<h3>$erreur</h3>"; 
?>
<div class="formulaire">
<br />
<label class="label" for="login">
IDENTIFIANT :</label> <input type="text" name="login" maxlength="49" placeholder="p.nom@ip-formation.net" /><br /><br />

<label class="label" for="mdp">
MOT DE PASSE : </label> <input type="password" maxlength="49"  name="mdp" placeholder="Mot de passe" /><br /><br />
<input type="submit" value="Entrer" name="bouton" />

</div>
</form>
</body>
</html>
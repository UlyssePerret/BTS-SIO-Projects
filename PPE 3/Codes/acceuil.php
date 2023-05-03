<?php session_start();
if(isset($_POST["bouton"]) )  //Connexion
{
if (empty(!$_POST['identifiant']) AND empty(!$_POST['mdp'])) // Pour verifier que les cases ne soit pas vide
	{
	$login = $_POST["identifiant"];//Donnée
	$passe = $_POST["mdp"];
	@mysql_connect("localhost","root",""); 
	mysql_select_db("sospartenaire");
	$req = "SELECT * FROM `utilisateur` WHERE `Identifiant`='$login'and `motdepasse` = '$passe'";
	$res = @mysql_query($req);
	$ligne = @mysql_fetch_assoc($res);
	
	if(@mysql_num_rows($res)>0) // on regarde le nombre de ligne de la requete
		{
			$_SESSION["nom"] = $ligne["nomutil"];
			$_SESSION["prenom"] = $ligne["prenomutil"];
			header("location:PartenaireDisponible.php"); 
		
		}
	else // gestion des erreurs
		{
			$erreur = "Erreur de connexion, veuillez ressayez ou de vous enregistrez....";
		}
	}
	else 
	{echo "Erreur : il faut remplir TOUS les champs";}
}

if(isset($_POST["bouton2"])) //Enregistrement
{

if(empty(!$_POST['identifiant']) AND empty(!$_POST['mdp']) AND empty(!$_POST['nom'])AND empty(!$_POST['prenom'])) // Gestion de validation des cases remplis
{
$login2 = $_POST["identifiant"];
@mysql_connect("localhost","root",""); 
mysql_select_db("sospartenaire");
$req5 = "SELECT * FROM `utilisateur` WHERE `Identifiant` = '$login2' ";//cherche l'id util
$res5 = mysql_query($req5);
if(mysql_num_rows($res5)>0)
{echo "Erreur : identifiant déja saisi";}
else{
$login = $_POST["mail"];	
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];

$passe = $_POST["mdp"];
@mysql_connect("localhost","root","");
mysql_select_db("sospartenaire");
$req2 = "insert into sospartenaire.utilisateur (nomutil, prenomutil, `Identifiant`, `motdepasse` ) 
		values ('$nom', '$prenom', '$login2', '$passe' )"; // on rentre les autres valeurs manuellement
	$res2 = mysql_query($req2);
if(!$res2) echo mysql_error();
else
{
	@mysql_connect("localhost","root","");
	mysql_select_db("sospartenaire");
	$req = "select * from utilisateur where `Identifiant`= '$login' and `motdepasse` = '$passe'";
	@$login = $_POST["login"];
	@$passe = $_POST["passe"];					
	$res = mysql_query($req);
	$ligne = mysql_fetch_assoc($res);
	if(mysql_num_rows($res)>0)
		{
			$_SESSION["nom"] = $ligne["nomutil"];
			$_SESSION["prenom"] = $ligne["prenomutil"];
			header("location:PartenaireDisponible.php");
		}
	else{
				$erreur = "Erreur de connexion, veuillez ressayez ou de vous enregistrez....";
			}	
}
}
}
else {echo "Erreur : il faut remplir TOUS les champs";}
}


?>


<html>
<!DOCTYPE html>
<head>
<link href="bootstrap/css/style.css" rel="stylesheet">
 <link rel="stylesheet/less" type="text/css" href="styles.less">
<script src="bootstrap/js/jquery.js"></script>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>


</head>
<body>  <center>

<h1> Formulaire de connexion </h1> <!--Connexion -->
<hr></hr>

<form class="form" action="acceuil.php" method="post">
<?php if(isset($erreur))  echo "<h3>$erreur</h3>"; 
?>
<div class="formulaire">
<br />
<label class="label" for="login">
IDENTIFIANT :</label> <input type="text" name="identifiant" maxlength="49" placeholder="Identifiant" /><br /><br />

<label class="label" for="mdp">
MOT DE PASSE : </label> <input type="password" maxlength="49"  name="mdp" placeholder="Mot de passe" /><br /><br />
<input type="submit" value="Entrer" name="bouton" />

</div>
</form>

<h1> Formulaire d'enregistrement </h1>  <!--Enregistrement -->
<hr>
<form class="form" method="post" action="acceuil.php" >

<div class="formulaire"> <br />
Nom : <input type="text" name="nom" maxlength="49" placeholder="Nom" /><br /><br />
Prenom :<input type="text" name="prenom" maxlength="49" placeholder="Prenom" /><br /><br />
Identifiant : <input type="text" name="identifiant" maxlength="49" placeholder="login" /><br /><br />
Motdepasse: <input type="password" name="mdp" maxlength="49" placeholder="Mot de passe" /><br /><br />
<input type="reset" value="Annuler" />
<input type="submit" value="Enregistrer"  name="bouton2"/>
</div>

</form>
</br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
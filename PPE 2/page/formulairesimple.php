<?php session_start();
if(isset($_POST["bouton"]) )  //Connexion
{
if (empty(!$_POST['login']) AND empty(!$_POST['mdp'])) // Pour verifier que les cases ne soit pas vide
	{
	$login = $_POST["login"];
	$passe = $_POST["mdp"];
	@mysql_connect("localhost","root",""); //Connexion base de donné SQL
	mysql_select_db("ppe2");
	$req = "select * from utilisateur where Identifiant= '$login' and mdp = '$passe'";
	$res = mysql_query($req);
	$ligne = mysql_fetch_assoc($res);
	
	if(mysql_num_rows($res)>0) // on regarde le nombre de ligne de la requete
		{
			$_SESSION["nom"] = $ligne["nom"];
			$_SESSION["prenom"] = $ligne["prenom"];
			header("location:cahierdetexte.php");
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
if(empty(!$_POST['mail']) AND empty(!$_POST['mdp']) AND empty(!$_POST['nom']) AND empty(!$_POST['prenom']) AND empty(!$_POST['Identifiant'])) // Gestion de validation des cases remplis
{
$mail = $_POST["mail"];
@mysql_connect("localhost","root",""); // connexion SQL
mysql_select_db("ppe2");
$req5 = "SELECT * FROM `utilisateur` WHERE `mail` = '$mail' ";
$res5 = mysql_query($req5);
if(mysql_num_rows($res5)>0)
{echo "Erreur : mail déja saisi";}
else{

$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$login = $_POST["login"];
$mail = $_POST["mail"];	
$passe = $_POST["mdp"];
@mysql_connect("localhost","root","");
mysql_select_db("ppe2");
$req2 = "insert into ppe2.utilisateur (nom, prenom, Identifiant, mail, mdp , IdGroupe) 
		values ('$nom', '$prenom', '$login', '$mail', '$passe' , '2')"; // attention ! stageaire doit être parametrer par l'admin aprés coup ! 
	//echo $req2;
	$res2 = mysql_query($req2);
if(!$res2) echo mysql_error();
else
{

	@mysql_connect("localhost","root","");
	mysql_select_db("ppe2");
	$req = "select * from utilisateur where Identifiant= '$login'
					and mdp = '$passe' ";
$login = $_POST["login"];
$passe = $_POST["passe"];					
	$res = mysql_query($req);
	$ligne = mysql_fetch_assoc($res);
	if(mysql_num_rows($res)>0)
		{
			$_SESSION["nom"] = $ligne["nom"];
			$_SESSION["prenom"] = $ligne["prenom"];
			header("location:cahierdetexte.php");
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

<!-- AJOUT empty test-->

<?php 
/*
	if (empty($_POST['login']) OR empty($_POST['mdp']) OR empty($_POST['nom']) OR empty($_POST['prenom']) OR empty($_POST['mail'])){
		echo "Erreur : il faut remplir TOUS les champs";
	}
	else // SINON (tous les champs ont bien été remplis) 
	{
		// code de redirection (header)
	}

	// Si au contraire tu veux tester si un champ N'EST PAS vide, tu rajoutes un point d'exclamation : 

	if (!empty($_POST['login'])) {} // = "si le champ login a bien été rempli"
*/
 ?>

<!-- FIN AJOUT -->

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
IDENTIFIANT :</label> <input type="text" name="login" maxlength="49" placeholder="identifiant" /><br /><br />

<label class="label" for="mdp">
MOT DE PASSE : </label> <input type="password" maxlength="49"  name="mdp" placeholder="Mot de passe" /><br /><br />
<input type="submit" value="Entrer" name="bouton" />

</div>
</form>

<h1> Formulaire d'enregistrement </h1>
<hr>
<form method="post" action="formulairesimple.php" >

<div class="formulaire"> <br />
Nom : <input type="text" name="nom" maxlength="49" placeholder="Nom" /><br /><br />
Prenom :<input type="text" name="prenom" maxlength="49" placeholder="Prenom" /><br /><br />
Identifiant: <input type="text" name="login" maxlength="49" placeholder="identifiant" /><br /><br />
Mail : <input type="text" name="mail" maxlength="49" placeholder="p.nom@ip-formation.net" /><br /><br />
Motdepasse: <input type="password" name="mdp" maxlength="49" placeholder="Mot de passe" /><br /><br />
<input type="reset" value="Annuler" />
<input type="submit" value="Enregistrer"  name="bouton2"/>
</div>

</form>
</br>

<div class="bas">
<a href="mentionlegal.php">Mention legal </a>|
<a href="faq.php" >FAQ</a>
</br>

© 1998-2013 groupe ip-formation | PARIS : 01 55 43 26 65 | LYON : 0811 692 888 | Tous droits réservés
</div>

</body>
</html>
<?php session_start();
if(!isset($_SESSION["nom"]))
{
	header("location:formulairesimple.php");
}

?>

<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css" />
</head>
<body>
<div class="haut">
<p>
<img src="image/logo_ipssi.png" alt="logo Ipssi" />
<img src="image/logo2.png" alt="logo Ip-Formation" />
</p>
<p>
<a href="cahierdetexte.php">Accueil</a> | 
<a href="recherche.php">Recherche</a> | 
<a href="mentionlegalc.php">Mention legal</a> | 
<a href="faq.php" > FAQ </a> | 
<a href="deconnexion.php">Deconnexion</a>
</p>
</div>

<p>
Vous êtes <?php 
@mysql_connect("localhost", "root", "");
mysql_select_db("ppe2");
$nom =$_SESSION["nom"];
$req = "SELECT IdGroupe FROM utilisateur WHERE nom='$_SESSION[nom]' ";
$res = mysql_query($req);
$ligne = @mysql_fetch_assoc($res);
echo $_SESSION["nom"]." " ;
echo $_SESSION["prenom"] ;
$var=$ligne["IdGroupe"];
$req2= "SELECT `NiveauSecurite` FROM `groupe` WHERE `IdGroupe`='$var' ";
$res2 = mysql_query($req2);
$ligne2 = @mysql_fetch_assoc($res2);
echo " et vous avez le statut de ".$ligne2["NiveauSecurite"];
$var2=$ligne2["NiveauSecurite"];
if ($ligne2["NiveauSecurite"] != 'Admin')
{
	header("location:cahierdetexte.php");
}
?>
</p>

Creation de compte de connexion :
<form method="post" action="creationcompte.php">
Nom  : <input type="text" name="nom" maxlength="49" placeholder="nom" /><br /><br />
Prenom : <input type="text" name="prenom" maxlength="49" placeholder="prenom" /><br /><br />
Login : <input type="text" name="login" maxlength="49" placeholder="login" /><br /><br />
MDP : <input type="text" name="mdp" maxlength="49" placeholder="motdepasse" /><br /><br />
IdGroupe : <input type="text" name="groupe" maxlength="2" placeholder="idgroupe" /><br /><br />
<input type="submit" value="Ajouter" name="boutona" />
</form>

<?php //Ajout
@mysql_connect("localhost", "root", "");
mysql_select_db("ppe2");
if(isset($_POST["boutona"]) )
{
$nom = $_POST["nom"];
$prenom = $_POST["prenom"];
$login = $_POST["login"];
$mdp = $_POST["mdp"];
$groupe = $_POST["groupe"];
$req3 = "INSERT INTO `ppe2`.`utilisateur` 
(`nom`, `prenom`, `mail`, `mdp`, `IdGroupe`) 
VALUES
 ('$nom', '$prenom', '$login', '$mdp', '$groupe');" ;
 $res3 = mysql_query($req3);
$ligne3 = @mysql_fetch_assoc($res3);
}
?>
</br>

<div class="bas">
<a href="mentionlegalc.php">Mention legal</a> |
<a href="plandusite.php" >Plan du Site</a> 
</br>

© 1998-2013 groupe ip-formation | PARIS : 01 55 43 26 65 | LYON : 0811 692 888 | Tous droits réservés
</div>

</body>
</html>
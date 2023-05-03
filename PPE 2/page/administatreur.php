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
$noms =$_SESSION["nom"];
$req2 = "SELECT IdGroupe FROM utilisateur WHERE nom='$_SESSION[nom]' ";
$res2 = mysql_query($req2);
$ligne2 = @mysql_fetch_assoc($res2);
echo $_SESSION["nom"]." " ;
echo $_SESSION["prenom"] ;
$var=$ligne2["IdGroupe"];
$req3= "SELECT `NiveauSecurite` FROM `groupe` WHERE `IdGroupe`='$var' ";
$res3 = mysql_query($req3);
$ligne3 = @mysql_fetch_assoc($res3);
echo " et vous avez le statut de ".$ligne3["NiveauSecurite"];
$var2=$ligne3["NiveauSecurite"];
if ($ligne3["NiveauSecurite"] != 'Admin')
{
	header("location:cahierdetexte.php");
}
?>
</p>

Creation de compte :
<form method="post" action="administrateur.php">

</form>


Mise a jour du mdp: 
<form method="post" action="administrateur.php">

</form>

</br>

<div class="bas">
<a href="mentionlegalc.php">Mention legal</a> |
<a href="plandusite.php" >Plan du Site</a> 
</br>

© 1998-2013 groupe ip-formation | PARIS : 01 55 43 26 65 | LYON : 0811 692 888 | Tous droits réservés
</div>

</body>
</html>
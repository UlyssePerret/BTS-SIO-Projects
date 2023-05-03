
<?php session_start();


if(!isset($_SESSION["nom"]))
{
	header("location:acceuil.php");
}

?>

<html>
<head>
<link href="bootstrap/css/style.css" rel="stylesheet">
 <link rel="stylesheet/less" type="text/css" href="styles.less">
<script src="bootstrap/js/jquery.js"></script>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<center>
<header>

<h1 >SOS Partenaires</h1>
<?php
@mysql_connect("localhost", "root", "");
mysql_select_db("sospartenaire");
$nom = $_SESSION["nom"];
$req = "SELECT * FROM `utilisateur` WHERE `nomutil`='$nom'"; // cherche l'utilisateur
$res = @mysql_query($req);
$ligne = @mysql_fetch_assoc($res);
if (empty($ligne['numeridetelephone']) AND empty($ligne['email']) )
{
	echo "<p>Vous n'avez pas enregistrez votre numéro de téléphone, ou votre email;
	celui ci vous permettra de vous connecter avec votre partenaire</p>";
}

?>
</header>
<a href="PartenaireDisponible.php" ; style="float:left" />Partenaires disponibles </a><br/>
<a style="float:right" ; href="MesSports.php"  />Mes sports</a><br/>
<a style="float:right" ; href="MonCompte.php"/>Mon compte</a><br/>
<a style="float:right" ; href="deconnexion.php"/>Déconnexion</a>
</center>
<h2> Plan du Site</h2>

<a href="acceuil.php"  />"Acceuil"<br/>
<a href="PartenaireDisponible.php"/>"Partenaires disponibles" </a><br/>
<a  href="MesSports.php"  />"Mes sports"</a><br/>
<a   href="MonCompte.php"/>"Mon compte"</a><br/>
<a  href="mentionlegal.php"/>"Mentions legales"</a><br/>
<a  href="plandusite.php"/>"Plan du site"</a><br/>
<a  href="cgu.php"/>"Conditions Générales d'Utilisation"</a><br/>
<center>
<footer>
<p>
Mention legal : <a href="mentionlegal.php" >ici</a>
Plan du site : <a href="plandusite.php">ici</a>
CGU : <a href="cgu.php">ici</a>
</p>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
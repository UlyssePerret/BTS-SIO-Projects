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
<body >
<center>

<div class="haut">
<p>
<img src="image/logo_ipssi.png" alt="logo Ipssi" />
<img src="image/logo2.png" alt="logo Ip-Formation" />
</p>
<p>
<a href="cahierdetexte.php">Accueil </a> |
<a href="recherche.php">Recherche </a> |
<a href="mentionlegalc.php">Mention legal </a> |
<a href="faq.php" > FAQ</a> |
<a href="deconnexion.php">Deconnexion</a>
</p>
</div>

<br/>
<div class="formulaire">

<h1> Formulaire de modification des modules </h1>
<hr >
Vous voulez modifier le medecin N°
<?php 
$num = $_GET["num"];
echo $_GET["num"];
@mysql_connect("localhost","root", "");
mysql_select_db("ppe2");
$req="select * from realiser where num ='$num'";
$res = mysql_query($req);
$ligne2 = mysql_fetch_assoc($res);

?>

<form method="POST" action="modif2.php">
IdModule: <input type="text" name="IdModule" 
	value="<?php echo $ligne2["IdModule"];?>" /><br /><br />
Date : <input type="text" name="Date" 
	value="<?php echo $ligne2["ContenueSequenceDate"];?>" /><br /><br />
Module :<input type="text" name="ContenueSequenceModule" 
	value="<?php echo $ligne2["ContenueSequenceModule"];?>" /><br /><br />
Description :<input type="text" name="Description" 
	value="<?php echo $ligne2["ContenueSequenceDescription"];?>" /><br /><br />
Nom: <input type="text" name="ContenueFormateurNom" 
	value="<?php echo $ligne2["ContenueFormateurNom"];?>" /> <br /><br />
Prenom: <input type="text" name="ContenueFormateurPrenom" 
	value="<?php echo $ligne2["ContenueFormateurPrenom"];?>" /> <br /><br />
Temps passé: <input type="text" name="NombreMinute" 
	value="<?php echo $ligne2["NombreMinute"];?>" /> <br /><br />
<input type="hidden" name="IdDate" value="<?php echo $ligne2["IdDate"];?>" >
<input type="hidden" name="num" value="<?php echo $ligne2["num"];?>" >
<input type="submit" value="Modification">

</form>
</div>
<br/><br/>
<div class="bas">
<a href="mentionlegalc.php">Mention legal</a> |
<a href="plandusite.php" >Plan du Site</a> 
</br>
© 1998-2013 groupe ip-formation | PARIS : 01 55 43 26 65 | LYON : 0811 692 888 | Tous droits réservés 
</div>

</body>
</html>
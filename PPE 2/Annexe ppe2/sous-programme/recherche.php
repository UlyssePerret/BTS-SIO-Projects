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

<a href="cahierdetexte.php"/>Accueil | </a>
<a href="recherche.php"/>Recherche | </a>
<a href="mentionlegalc.php"/>Mention legal | </a>
<a href="deconnexion.php"/>Deconnexion</a>
</div>


</br>
<h1>Recherche Multicritères : </h1>
<hr  />
<div class="formulaire">
<form method="post" action="recherche.php">
</br>
Par date : <input type="text" name="dater" maxlength="49" placeholder="aaaa-mm-jj" /><br /><br />

Par module : <input type="text" name="moduler" maxlength="49" placeholder="Module" /><br /><br />

Par formateur : <input type="text" name="formateurech" maxlength="49" placeholder="formateur " /><br /><br />

Par mots clés. : <input type="text" name="motclerech" maxlength="49" placeholder="motclé" /><br /><br />

<input type="submit" value="Entrer" name="boutonr" />

</form>
</div>


<h1>     Tableau des résultats </h1>
<hr />
<table >
<tr ><th> Date</th><th> Module</th> <th> Nom du Formateur </th><th> Prénom du Formateur </th><th> Description </th>
<th> TempsPassé </th><th> IdModule </th></tr>
<?php 
if(isset($_POST["boutonr"]) ) // si recherche effectué
{
@mysql_connect("localhost", "root", "");
mysql_select_db("ppe2");
$dater = $_POST["dater"];
$moduler = $_POST["moduler"];
$formateurech = $_POST["formateurech"];
$motclerech = $_POST["motclerech"];

// date
if(!empty($_POST["dater"]) ) {
	$req = "SELECT * FROM realiser WHERE ContenueSequenceDate LIKE '%$dater%'  ";
}
// module
else if(!empty($_POST["moduler"]) ){ 
	$req = "SELECT * FROM realiser WHERE  ContenueSequenceModule LIKE '%$moduler%' ";
}
// formateur (nom ou prenom)
else if(!empty($_POST["formateurech"]) ){
	$req = "SELECT * FROM realiser WHERE `ContenuFormateurNom` LIKE '%$formateurech%' or LIKE `ContenuFormateurPrenom` LIKE '%$formateurech%' " ;
}
// description
else if(!empty($_POST["motclerech"]) ){ 
	$req = "SELECT * FROM realiser WHERE  ContenueSequenceDescription LIKE '%$motclerech%' 
	OR  `ContenuFormateurNom` LIKE  '%$motclerech%' 
	OR  `ContenuFormateurPrenom` LIKE '%$motclerech%' 
OR  ContenueSequenceModule LIKE '%$motclerech%' 
OR  IdModule LIKE '%$motclerech%' 
OR 	ContenueSequenceDate LIKE '%$motclerech%' 
OR   IdDate LIKE '%$motclerech%' 
OR  NombreMinute LIKE  '%$motclerech%'  ";
}
else
{
	$req = "SELECT * FROM `realiser` order by `ContenuFormateurNom`";
}
$res = mysql_query($req);
if(!$res) echo mysql_error();
$ligne = @mysql_fetch_assoc($res);
$i = 0;
while($ligne)
{

echo "<tr><td>".$ligne["ContenueSequenceDate"]."</td><td>".$ligne["ContenueSequenceModule"]."</td><td>"
	.$ligne["ContenuFormateurNom"]."</td><td>".$ligne["ContenuFormateurPrenom"]."</td><td>".$ligne["ContenueSequenceDescription"]."</td><td>"
	.$ligne["NombreMinute"]."</td><td>".$ligne["IdModule"]."</td>
	</tr>";
	
	$ligne = mysql_fetch_assoc($res);
}
}
else
{
@mysql_connect("localhost", "root", "");
mysql_select_db("ppe2");
$req = "SELECT * FROM `realiser` order by `ContenuFormateurNom`";
$res = mysql_query($req);
if(!$res) echo mysql_error();
$ligne = mysql_fetch_assoc($res);
$i = 0;
while($ligne)
{

echo "<tr><td>".$ligne["ContenueSequenceDate"]."</td><td>".$ligne["ContenueSequenceModule"]."</td><td>"
	.$ligne["ContenuFormateurNom"]."</td><td>".$ligne["ContenuFormateurPrenom"]."</td><td>".$ligne["ContenueSequenceDescription"]."</td><td>"
	.$ligne["NombreMinute"]."</td><td>".$ligne["IdModule"]."</td>
	</tr>";
	
	$ligne = mysql_fetch_assoc($res);
}
}
?>
</table>
<div class="bas">
Mention legal : 
<a href="mentionlegal.php" >ici</a>
</br>

© 1998-2013 groupe ip-formation | PARIS : 01 55 43 26 65 | LYON : 0811 692 888 | Tous droits réservés
</div>
</body>
</html>
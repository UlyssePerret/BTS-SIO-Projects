<?php session_start();
if(!isset($_SESSION["nom"]))
{
	header("location:formulairesimple.php");
}

?>

<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<head><meta charset="UTF-8"></head>


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

<h1>     Tableau récapitulatif des modules enseignés en BTS SIO </h1>
<hr />
<table >
<tr ><th> Date</th><th> Module</th> <th> Nom du Formateur </th><th> Prénom du Formateur </th><th> Description </th>
<th> TempsPassé </th><th> IdModule </th></tr>
<?php
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
?>
</table>

</br>
<div class="bas">
Mention legal : 
<a href="mentionlegal.php" >ici</a>
</br>

© 1998-2013 groupe ip-formation | PARIS : 01 55 43 26 65 | LYON : 0811 692 888 | Tous droits réservés
</div>
</body>
</html>
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
<center>

<div class="haut">
<p>
<img src="image/logo_ipssi.png" alt="logo Ipssi" />
<img src="image/logo2.png" alt="logo Ip-Formation" />
</p>

<a href="cahierdetexte.php"/>Accueil </a>
<a href="recherche.php"/>Recherche</a>
<a href="mentionlegalc.php"/>Mention legal</a>
<a href="deconnexion.php"/>Deconnexion</a>
</div>


</br>
<h1>Recherche Multicritére : </h1>
<hr  />
<div class="formulaire">
<form method="post" action="recherche2.php">
</br>
Par date : <input type="text" name="dater" maxlength="49" placeholder="date" /><br /><br />

Par module : <input type="text" name="moduler" maxlength="49" placeholder="Module" /><br /><br />

Par formateur : <input type="text" name="formateurech" maxlength="49" placeholder="formateur " /><br /><br />

Par mots clés. : <input type="text" name="mcr" maxlength="49" placeholder="mc" /><br /><br />

<input type="submit" value="Entrer" name="boutonr" />
<?php  
/*Résultat $req = "SELECT * FROM realiser WHERE ContenueSequenceDate = '$dater' ";*/
?>
</form>
</div>


<h1>     Tableau des résultats </h1>
<hr />
<table >
<tr ><th> Date</th><th> Module</th> <th> Formateur </th><th> Description </th>
<th> TempsPassé </th><th> IdModule </th></tr>
<?php 
@mysql_connect("localhost", "root", "");
mysql_select_db("ppe2");
$dater = $_POST["dater"];
$moduler = $_POST["moduler"];
if(!empty($_POST["dater"]) AND !empty($_POST["moduler"])) // cas ou les deux cas sont remplis
{
$req = "SELECT * FROM realiser WHERE ContenueSequenceDate = '$dater' and ContenueSequenceModule = '$moduler' ";

}
if(!empty($_POST["moduler"]) ) // cas ou les deux cas sont remplis
{
$req = "SELECT * FROM realiser WHERE  ContenueSequenceModule = '$moduler' ";
}

if(!empty($_POST["dater"]) ) // cas ou les deux cas sont remplis
{
$req = "SELECT * FROM realiser WHERE ContenueSequenceDate = '$dater'  ";

}
$res = mysql_query($req);
if(!$res) echo mysql_error();
$ligne = mysql_fetch_assoc($res);
$i = 0;
while($ligne)
{

echo "<tr><td>".$ligne["ContenueSequenceDate"]."</td><td>".$ligne["ContenueSequenceModule"]."</td><td>"
	.$ligne["ContenueSequenceFormateur"]."</td><td>".$ligne["ContenueSequenceDescription"]."</td><td>"
	.$ligne["NombreMinute"]."</td><td>".$ligne["IdModule"]."</td>
	</tr>";
	
	$ligne = mysql_fetch_assoc($res);
}

?>
</table>
</body>
</html>
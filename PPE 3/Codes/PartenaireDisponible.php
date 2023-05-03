
<?php session_start(); // Session
if(!isset($_SESSION["nom"]))
{
	header("location:acceuil.php");
}
$nom=$_SESSION["nom"];
?>

<!DOCTYPE html>
<head>
<link href="bootstrap/css/style.css" rel="stylesheet">
<link rel="stylesheet/less" type="text/css" href="styles.less">
<script src="bootstrap/js/jquery.js"></script>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="jquery.js"></script>
<link href="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/css/select2.min.css" rel="stylesheet" />
<script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.0/js/select2.min.js"></script>

 <script>
        $(document).ready(function() {
  $(".sport").select2();
});
    </script>
	
</head>

<body>
<center>
<header>
<h1>SOS Partenaires</h1>
<?php //Gerer le cas ou l'utilisateur n'as pas d'email ou de telephone
@mysql_connect("localhost", "root", "");
mysql_select_db("sospartenaire");
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

<div>
<a href="PartenaireDisponible.php" ; style="float:left" />Partenaires disponibles </a><br/>
<a style="float:right" ; href="MesSports.php"  />Mes sports</a><br/>
<a style="float:right" ; href="MonCompte.php"/>Mon compte</a><br/>
<a style="float:right" ; href="deconnexion.php"/>Deconnexion</a>
</div>
<br/>
<h1>Formulaire de selection du partenaire</h1>
<div>

<form class="form" method="POST" action="PartenaireDisponible.php">
Sport : 
<?php // Bouton select2
	$req = "SELECT * FROM `utilisateur` WHERE `nomutil`='$nom' ";
	$res = @mysql_query($req);
	$ligne1 = @mysql_fetch_assoc($res);
	$var=$ligne1["IdUtilisation"];
$req2 = "SELECT distinct s.nomsport
FROM `sport` s, pratique p, utilisateur u
WHERE u.`IdUtilisation` = '$var' 
AND  u.`IdUtilisation` = p.`IdUtilisation`
AND p.idsport = s.IdSport
order by s.nomsport"; // requete pour seletionenr tout les sport de l'utilisateur
$res2 = mysql_query($req2);
$ligne2 = mysql_fetch_assoc($res2);
if(!$res2) echo mysql_error();
echo '<select name="nomsport" size="3" class="sport min-width= "100"">  
<script type="text/javascript"> 
 $("select").select2(); 
 </script>'; // affichage du bouton. attention mettre le code select2
while($ligne2)
{
	$nspo=$ligne2["nomsport"];
	echo '<option value="'.$nspo.'">'.$nspo.'</option>'; // option du bouton select
	$ligne2 = mysql_fetch_assoc($res2);
}
if(empty($ligne2))
{
	echo "Vous êtes inscrit a aucun sport";
}
?>
</select><br /><br />
<input type="submit" value="Rechercher" name="boutonr" />
</form>
</div>

<?php //Gestion du formulaire
if(isset($_POST["boutonr"]) ) 
{
@mysql_connect("localhost", "root", "");
mysql_select_db("sospartenaire");

if(empty($_POST["nomsport"])) // Gestion erreur
{
	echo "</br>Vous avez selectionner aucun sport";
} 
else  //Requete
{
$nomsport =  $_POST["nomsport"];//il nous faut l'id du sport et on a que le nom du sport
$req3= "SELECT * FROM `sport` WHERE `nomsport`='$nomsport '";
$res3 = mysql_query($req3);
$ligne3 = @mysql_fetch_assoc($res3);
$idsport= $ligne3["IdSport"];
$var = $ligne['IdUtilisation'];
//maintenant on peut tout chercher
$req4= "SELECT u.`Identifiant` , p.lieu, u.email, u.numeridetelephone
FROM `sport` s, pratique p, utilisateur u
WHERE s.IdSport= '$idsport'
AND  u.`IdUtilisation` = p.`IdUtilisation`
AND p.idsport = s.IdSport
AND u.`IdUtilisation` != '$var' ";	/*Requete qui permetra d'afficher tout les donné qu'on demandes
le u.`IdUtilisation` != '$var' permet d'exclure notre nom*/
$res4 = mysql_query($req4);
$ligne4 = @mysql_fetch_assoc($res4);
if(!$res4) echo mysql_error();
$i = 0;
if(empty($ligne4["lieu"])  AND empty($ligne4["Identifiant"]) ) // Gestion des erreur
{
	echo  "</br>Désolé, On a trouver aucun partenaire";
}
else // Validation
{
	echo "<h2>Resultat</h2>
	<table ><tr ><th>Identifiant</th>
<th> Lieu </th>
<th>Email</th>
<th>Telephone </th></tr>";

while($ligne4 )
{
echo "<tr>
	<td>".$ligne4["Identifiant"]."</td>
	<td>".$ligne4["lieu"]."</td>
	<td>".$ligne4["email"]."</td>
	<td>".$ligne4["numeridetelephone"]."</td>
	</tr></table>";
		$ligne4= mysql_fetch_assoc($res4);
}}}}?>
</br>
<footer>
<p>
Mentions legales : <a href="mentionlegal.php" >ici</a>
Plan du site : <a href="plandusite.php">ici</a>
CGU : <a href="cgu.php">ici</a></p>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
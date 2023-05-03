<?php session_start(); // Session
$nom=$_SESSION["nom"];
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
<h1>SOS Partenaires</h1>
<?php  //Gestion de l'utilisateur
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
<a href="PartenaireDisponible.php" ; style="float:left" />Partenaires disponibles </a><br/>
<a style="float:right" ; href="MesSports.php"  />Mes sports</a><br/>
<a style="float:right" ; href="MonCompte.php"/>Mon compte</a><br/>
<a style="float:right" ; href="deconnexion.php"/>Deconnexion</a>

<?php // Php pour afficher les sports du compte
$nom=$_SESSION["nom"];
$prenom=$_SESSION["prenom"]; // un utilisateur n'a pas de nom et de prenom identique
$req1 = "SELECT  s.`nomsport` ,  p.`niveau`,  p.`lieu` 
FROM `sport` s, pratique p, utilisateur u
Where u.`IdUtilisation` = p.`IdUtilisation`
AND p.idsport = s.IdSport
AND u.nomutil = '$nom' 
AND u.prenomutil = '$prenom'"; // cherche tout ce qu'on a beson
$res1 = @mysql_query($req1);
$ligne1 = @mysql_fetch_assoc($res1);
$i = 0;
if(empty($ligne1["nomsport"]))
{echo "<br/><p>Aucun sport pour le moment...</p>";
}
else
{
echo "<h1>     Tableau recapitulatif de vos sports </h1> 
<table ><tr ><th>Sport</th><th>Niveau</th> <th> Lieu </th></tr>" ; // Affichage Résultat
while($ligne1)
{
echo "<tr><td  >".$ligne1["nomsport"]."</td>
<td>".$ligne1["niveau"]."</td>
<td>".$ligne1["lieu"]."</td>
</tr>";
	
	$ligne1 = mysql_fetch_assoc($res1);
}
echo "</table>";
echo $ligne1["nomsport"];
}
?>

<h2>Formulaire d'ajout </h2>
<form class="form" method="post" action="MesSports.php" >
<div class="formulaire"> <br />
Sport : <input type="text" name="sport" maxlength="49" placeholder="nomdusport" /><br /><br />
Niveau :<input type="text" name="niveau" maxlength="49" placeholder="niveau" /><br /><br />
Lieu : <input type="text" name="lieu" maxlength="49" placeholder="ex:Paris" /><br /><br />
<input type="submit" value="Ajouter"  name="boutonajout"/>
</div>
</form>


<?php //gerer l'ajout
if(isset($_POST["boutonajout"]))
{

if(empty(!$_POST['sport']) AND empty(!$_POST['niveau']) AND empty(!$_POST['lieu'])) // Gestion de validation des cases remplis
{
$sport = $_POST['sport'];
$niveau = $_POST['niveau'];
$lieu = $_POST['lieu'];
$var= $ligne['IdUtilisation'] ; // Rappel de IdUtilisation car on a beasoin
@mysql_connect("localhost","root",""); // connexion SQL
mysql_select_db("sospartenaire");
//il nous faut encore idsport, et gerer le fait qu'il faudra inserer un nouveau sport si il n'a pas été entrée
$req2 = "SELECT `IdSport` FROM `sport` WHERE `nomsport`= '$sport '";
$res2 = mysql_query($req2);
$ligne2 = @mysql_fetch_assoc($res2);
$num_rows= mysql_num_rows ( $res2); 
if(!$res2) echo mysql_error();
if($num_rows <1)  // cas si le sport n'est jamais entrée
{
	$req3= "SELECT MAX(IdSport) FROM sport" ; // on utilise max pour avoir le maximum de id
	$res3 = mysql_query($req3);
	$ligne3 = @mysql_fetch_assoc($res3);
	$i = 1;
	$idSport = $ligne3["MAX(IdSport)"] +$i  ;  // on incremente de 1 l'id pour avoir id différent
	echo $idSport;
	$req4 = "insert into sospartenaire.sport ( nomsport , IdSport) 
	values ( '$sport', $idSport)";
	$res4 = mysql_query($req4);
	$ligne4 = @mysql_fetch_assoc($res4);
}
else // cas ou le sport existe
{
	$req3 = " SELECT `IdSport` FROM `sport` WHERE `nomsport` = '$sport' ";
	$res3 = mysql_query($req3);
	$ligne3 = @mysql_fetch_assoc($res3);
	$idSport = $ligne3["IdSport"];
	
}
$req5="SELECT * FROM `pratique` WHERE `IdUtilisation`= '$var' AND `idsport`='$idSport'" ;
$res5 = mysql_query($req5);
$ligne5 = @mysql_fetch_assoc($res5);
$num_rows1= mysql_num_rows ( $res5); 
if ($num_rows1 >0)//Erreur, car si on a un résultat, on trouve une correspondance
{
	echo "Vous avez déja pratiqué ce sport" ;
}
else // cas si l'id et le sport et différent
{
	$req6 = "insert into sospartenaire.pratique ( niveau, `Lieu`, `IdUtilisation` , idsport ) 
values ( '$niveau', '$lieu', '$var' , '$idSport' )";
$res6 = mysql_query($req6);
if(!$res6) echo mysql_error();
else {header("location:MesSports.php");	}
}
}
else
{echo "Erreur, vous avez oubliez de remplir une case";}
}
?>
</br>
<footer>
<p>
Mentions legales : <a href="mentionlegal.php" >ici</a>
Plan du site : <a href="plandusite.php">ici</a>
CGU : <a href="cgu.php">ici</a>
</p>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
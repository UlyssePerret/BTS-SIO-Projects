<?php session_start();
$nom=$_SESSION["nom"];
if(!isset($_SESSION["nom"]))
{
	header("location:acceuil.php");
}
?>

<head>
<link href="bootstrap/css/style.css" rel="stylesheet">
 <link rel="stylesheet/less" type="text/css" href="styles.less">
<script src="bootstrap/js/jquery.js"></script>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
<center><header>
<h1>SOS Partenaires</h1> 
<?php
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
<a style="float:right" ; href="deconnexion.php"/>Déconnexion</a>
</br>

<h2>Mes Informations</h2>
<div >

<?php
echo "Identifiant : ".$ligne['Identifiant']."<br />" ;
echo "Nom : ".$ligne['nomutil']."<br />" ;
echo "Prenom : ".$ligne['prenomutil']."<br />" ;
echo "Mot de passe : ".$ligne['motdepasse']."<br />" ;
echo "Telephone : ".$ligne['numeridetelephone']."<br />" ;
echo "Email : ".$ligne['email']."<br />" ;
?>
</div>
</br>
<h2>Formulaire de modification du telephone</h2><!--Telephone -->
<form class="form" method="post" action="MonCompte.php" >
<div class="formulaire"> <br />
Telephone: <input type="text" name="telephone" maxlength="49" placeholder="XX XX XX XX XX" /><br /><br />
<input type="submit" value="Modifier"  name="boutontel"/>
</div>
</form>

<?php // Telephone
@mysql_connect("localhost", "root", "");
mysql_select_db("sospartenaire");
$req = "SELECT * FROM `utilisateur` WHERE `nomutil`='$nom'"; // cherche l'utilisateur
$res = @mysql_query($req);
$ligne = @mysql_fetch_assoc($res);
$var=$ligne["IdUtilisation"];
if(!$res) echo mysql_error();

if(isset($_POST["boutontel"])) 
{
$_POST["telephone"] = htmlspecialchars($_POST["telephone"]); // permet de gerer les erreur d'entrer du html (type "" ou '' ou ..)
if(preg_match("#^0[1-68]([-. ]? [0-9]{2}){4}$#",$_POST["telephone"]))
	/* attention, j'ai utiliser les regex pour gerer le format du telephone! 
format de base #^$# car chaine de caractére
un numéro de telphone commence par 0 j'écris dont 0
le [1-68 ] permet les numéro et gérer les caractére speciaux
[-. ]? gére les tiret, les point et l'espacement , on met le ? car pas obligatoire
aprés un tiret , espace ou un point on a deux chiffres [0-9]{2}
étant donné qu'on a 4groupe de 2 chiffre on écrit ensuit {4} avec le reste en parrenthése

*/
{
$telephone = $_POST['telephone'];
$req2 ="UPDATE `utilisateur` SET `numeridetelephone` = '$telephone' WHERE `IdUtilisation` = $var"; //Modification
$res2 = @mysql_query($req2);
$ligne2 = @mysql_fetch_assoc($res2);
if(!$res2) echo mysql_error();  

}
else if ($_POST['telephone'] =='' OR empty($_POST['telephone'])) //gestion de case vide 
{
$telephone = $_POST['telephone'];
$req2 ="UPDATE `utilisateur` SET `numeridetelephone` = '$telephone' WHERE `IdUtilisation` = $var"; //le $telephone n'a rien en donné
$res2 = @mysql_query($req2);
$ligne2 = @mysql_fetch_assoc($res2);
if(!$res2) echo mysql_error();  
	
}
else
{ 
echo "Erreur, Vous êtes trompez dans le format du téléphone" ;
}
header("location:MonCompte.php");
}
?>

<h2>Formulaire de modification de l'email</h2> <!-- Email -->
<form class="form" method="post" action="MonCompte.php" >
<div class="formulaire"> <br />
Email: <input type="text" name="email" maxlength="49" placeholder="" /><br /><br />
<input type="submit" value="Modifier"  name="boutonemail"/>
</div>
</form>

<?php // Email
if(isset($_POST["boutonemail"]))
{
$_POST["email"] = htmlspecialchars($_POST["email"]); // permet de gerer les erreurs d'entrer du html (type "" ou '' ou ..)
if(preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,5}$#",$_POST["email"]))
	/*  pour l'adresse email, c'est plus compliquer
format de base #^$# car chaine de caractére
on rappelle qu'une adresse est de type xxxx@domaine.surfixe
dans xxx on peut avoir des chiffre, lettres , _ ou tiret. Je gére pas les majuscule ce qui donne [a-z0-9._-]+ (le plsu permet de dire qu'il a aumoin 1 caractére dans ce champs)
ensuit on gére l'aroba @
on a encore une suitre de chiffre , et on considére que nom de domaine a plus de 2 caractére on a donc : [a-z0-9._-]{2,}
on met le point, mais c'est un caracté spécial, on met un antislash avant \.
on fait le suffixe. fr, com, paris, on limite donc a 5 , que des chiffre [a-z]{2,5}
*/
{
$email = $_POST['email'];
$req2 ="UPDATE `utilisateur` SET `email` = '$email' WHERE `IdUtilisation` = $var"; //Modification
$res2 = @mysql_query($req2);
$ligne2 = @mysql_fetch_assoc($res2);
if(!$res2) echo mysql_error();  

}
else if ($_POST['email'] =='' OR empty($_POST['email'])) //gestion de case vide
{
$email = $_POST['email'];
$req2 ="UPDATE `utilisateur` SET `email` = '$email' WHERE `IdUtilisation` = $var";
$res2 = @mysql_query($req2);
$ligne2 = @mysql_fetch_assoc($res2);
if(!$res2) echo mysql_error();  
	}
else
{ 
echo "Erreur, Vous êtes trompez dans le format pour l'emal" ;
}
header("location:MonCompte.php");
}
?>

<h2>Formulaire de modification de mot de passe</h2> <!-- Mot de passe-->
<form class="form" method="post" action="MonCompte.php" >
<div class="formulaire"> <br />
Nouveaux mot de passe: <input type="password" name="mdp1" maxlength="49" placeholder="" /><br /><br />
Confirmer le mot de passe: <input type="password" name="mdp2" maxlength="49" placeholder="" /><br /><br />
<input type="submit" value="Modifier"  name="boutonmdp"/>
</div>
</form>
<?php
if(isset($_POST['boutonmdp']))
{$mdp1 = $_POST['mdp1'];
$mdp2 = $_POST['mdp2'];
if($mdp1 != $mdp2)
{echo "Erreur, vous êtes trompez dans la saisie du mot de passe";}
else if (empty($_POST['mdp2']) OR empty($_POST['mdp2']))
{echo "Erreur : Vous n'avez pas saisie le nouveau mot de passe";}
else
{
	$req3 ="UPDATE `utilisateur` SET `motdepasse` = '$mdp1' WHERE `IdUtilisation` = $var";
	$res3 = @mysql_query($req3);
$ligne3 = @mysql_fetch_assoc($res3);
if(!$res3) echo mysql_error();  
}
header("location:MonCompte.php");
}

?>
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
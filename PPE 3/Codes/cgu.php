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
<a style="float:right" ; href="deconnexion.php"/>Deconnexion</a>
</center>
<div class="Contenu cgu">
<style>
            h3
            {
                font-style: italic;
				text-decoration:underline;
            }
			
			
 </style>
<h3>Conditions de service</h3><br/>
Ce site est proposé en langages HTML5 , CSS3, PHP pour un meilleur confort d'utilisation et un graphisme plus agréable, nous vous recommandons de recourir à des navigateurs modernes comme Safari, Firefox, Chrome,...

<h3>Informations et exclusion</h3><br/>
Met en œuvre tous les moyens dont elle dispose, pour assurer une information fiable et une mise à jour fiable de ses sites internet. Toutefois, des erreurs ou omissions peuvent survenir. L'internaute devra donc s'assurer de l'exactitude des informations, et signaler toutes modifications du site qu'il jugerait utile. N'est en aucun cas responsable de l'utilisation faite de ces informations, et de tout préjudice direct ou indirect pouvant en découler.

<h3>Cookies</h3><br/>
Pour des besoins de statistiques et d'affichage, le présent site utilise des cookies. Il s'agit de petits fichiers textes stockés sur votre disque dur afin d'enregistrer des données techniques sur votre navigation. Certaines parties de ce site ne peuvent être fonctionnelle sans l’acceptation de cookies.

<h3>Recherche</h3><br/>
En outre, le renvoi sur un site internet pour compléter une information recherchée ne signifie en aucune façon que reconnaît ou accepte quelque responsabilité quant à la teneur ou à l'utilisation dudit site.

<h3>Précautions d'usage</h3><br/>
Il vous incombe par conséquent de prendre les précautions d'usage nécessaires pour vous assurer que ce que vous choisissez d'utiliser ne soit pas entaché d'erreurs voire d'éléments de nature destructrice tels que virus,....

<h3>Responsabilité</h3><br/>
Aucune autre garantie n'est accordée au client, auquel incombe l'obligation de formuler clairement ses besoins et le devoir de s'informer. Si des informations fournies par apparaissent inexactes, il appartiendra au client de procéder lui-même à toutes vérifications de la cohérence ou de la vraisemblance des résultats obtenus. Ne sera en aucune façon responsable vis à vis des tiers de l'utilisation par le client des informations ou de leur absence contenues dans ses produits y compris un de ses sites Internet.

<h3>Contactez-nous</h3><br/>
est à votre disposition pour tous vos commentaires ou suggestions. Vous pouvez nous écrire en français par courrier électronique à w.delbe@ip-formation.net ou u.perret@ip-formation.net .


</div>
<footer>
<p>
Mentions legales : <a href="mentionlegal.php" >ici</a>
Plan du site : <a href="plandusite.php">ici</a>
CGU: <a href="cgu.php">ici</a>
</p>
</footer>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
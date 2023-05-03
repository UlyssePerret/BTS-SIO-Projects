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

<div class="Contenu_Mention">

<h2>Nos mentions légales</h2>
<h3>Mentions légales</h3><br/>
Merci de lire attentivement les présentes modalités d'utilisation du présent site avant de le parcourir. En vous connectant sur ce site, vous acceptez sans réserve les présentes modalités.

<h3>Editeur du site</h3>
Ulysse PERRET
<br/>Delbe Wylhem
<br/>GIRONDE Jean-Christophe
<h3>Conditions d'utilisation</h3>
Le site accessible par les url suivants : www.xxxxxxx.fr est exploité dans le respect de la législation française. L'utilisation de ce site est régie par les présentes conditions générales. En utilisant le site, vous reconnaissez avoir pris connaissance de ces conditions et les avoir acceptées. Celles-ci pourront êtres modifiées à tout moment et sans préavis par la société.
ne saurait être tenu pour responsable en aucune manière d’une mauvaise utilisation du service.

<h3>Responsable éditorial</h3>
Ulysse PERRET
<br/>Delbe Wylhem<br/>
GIRONDE Jean-Christophe

<h3>Limitation de responsabilité</h3>
Les informations contenues sur ce site sont aussi précises que possibles et le site est périodiquement remis à jour, mais peut toutefois contenir des inexactitudes, des omissions ou des lacunes. Si vous constatez une lacune, erreur ou ce qui parait être un dysfonctionnement, merci de bien vouloir le signaler par email en décrivant le problème de la manière la plus précise possible (page posant problème, action déclenchant, type d’ordinateur et de navigateur utilisé, …).

<br/><br/>Tout contenu téléchargé se fait aux risques et périls de l'utilisateur et sous sa seule responsabilité. En conséquence, ne saurait être tenu responsable d'un quelconque dommage subi par l'ordinateur de l'utilisateur ou d'une quelconque perte de données consécutives au téléchargement.

<br/><br/>Les photos sont non contractuelles.

<br/><br/>Les liens hypertextes mis en place dans le cadre du présent site internet en direction d'autres ressources présentes sur le réseau Internet ne sauraient engager la responsabilité de .

<h3>Litiges</h3>
Les présentes conditions sont régies par les lois françaises et toute contestation ou litiges qui pourraient naître de l'interprétation ou de l'exécution de celles-ci seront de la compétence exclusive des tribunaux dont dépend le siège social de la société. La langue de référence, pour le règlement de contentieux éventuels, est le français.

<h3>Déclaration à la CNIL</h3>
Conformément à la loi 78-17 du 6 janvier 1978 (modifiée par la loi 2004-801 du 6 août 2004 relative à la protection des personnes physiques à l'égard des traitements de données à caractère personnel) relative à l'informatique, aux fichiers et aux libertés, le site a fait l'objet d'une déclaration auprès de la Commission nationale de l'informatique et des libertés (www.cnil.fr). 
<h3>Droit d'accès</h3><br/>
En application de cette loi, les internautes disposent d’un droit d’accès, de rectification, de modification et de suppression concernant les données qui les concernent personnellement par voie électronique à l’adresse email suivante : <p class="couleur">w.delbe@ip-formation.net</p> ou <p class="couleur">u.perret@ip-formation.net</p> .
Les informations personnelles collectées ne sont en aucun cas confiées à des tiers hormis pour l’éventuelle bonne exécution de la prestation commandée par l’internaute.
<h3>Confidentialité</h3><br/>
Vos données personnelles sont confidentielles et ne seront en aucun cas communiquées à des tiers hormis pour la bonne exécution de la prestation.
<h3>Propriété intellectuelle</h3><br/>
Tout le contenu du présent site, incluant, de façon non limitative, les graphismes, images, textes, vidéos, animations, sons, logos, gifs et icônes ainsi que leur mise en forme sont la propriété exclusive de la société à l'exception des marques, logos ou contenus appartenant à d'autres sociétés partenaires ou auteurs.
Toute reproduction, distribution, modification, adaptation, retransmission ou publication, même partielle, de ces différents éléments est strictement interdite sans l'accord exprès par écrit Ulysse PERRET. Cette représentation ou reproduction, par quelque procédé que ce soit, constitue une contrefaçon sanctionnée par les articles L.3335-2 et suivants du Code de la propriété intellectuelle. Le non-respect de cette interdiction constitue une contrefaçon pouvant engager la responsabilité civile et pénale du contrefacteur. 
En outre, les propriétaires des Contenus copiés pourraient intenter une action en justice à votre encontre
est identiquement propriétaire des "droits des producteurs de bases de données" visés au Livre III, Titre IV, du Code de la Propriété Intellectuelle (loi n° 98-536 du 1er juillet 1998) relative aux droits d'auteur et aux bases de données.


<br/>Pour toute demande d'autorisation ou d'information, veuillez nous contacter par email :  <p class="couleur">w.delbe@ip-formation.net</p> ou <p class="couleur">u.perret@ip-formation.net</p>. 
<h3>Hébergeur</h3>
WEBOU.net<br/>
Plateforme de gestion et création de sites internet<br/>
http://www.webou.net 
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
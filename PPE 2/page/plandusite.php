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

<div class="plandusite">
<p>

<ul>
<li><a href ="formulairesimple.php " > Page de Connexion * </a><br/></li>
<li><a href ="mentionlegal.php " > Mention legale sans connexion * </a><br/></li>
</ul>
<ul>
<li><a href ="cahierdetexte.php " >Acceuil</a><br/></li>
<li><a href ="recherche.php" > Recherche</a><br/></li>
<li><a href ="mentionlegalc.php" > Mention Legale</a><br/></li>
<li><a href ="faq.php " > FAQ </a><br/></li>
<li><a href ="plandusite.php " > Plan du site</a><br/></li>
<li><a href="deconnexion.php">Deconnexion </a> </li>
</ul>

</ul>
 </p>
 
</div>
 
 <p>
* ATTENTION ! Vous serez serez deconnectez !

 </p>
 
<div class="bas">
<a href="mentionlegalc.php">Mention legal</a> |
<a href="plandusite.php" >Plan du Site</a> 
</br>
© 1998-2013 groupe ip-formation | PARIS : 01 55 43 26 65 | LYON : 0811 692 888 | Tous droits réservés 
</div>

</body>
</html>
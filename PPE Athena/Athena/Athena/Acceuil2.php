<?php
session_start();

    $login = $_SESSION['login'] ;
    $motdepasse = $_SESSION['motdepasse'] ;
    
    if(($login=='') && ($motdepasse=='') )
    {
     header('Location: deconnexion.php');
    }
?>


<!DOCTYPE html > 
<html   lang="fr">
    <head> 
		<meta charset="utf-8" /> 
        <title>Athena/Accueil</title> 
	
<link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style2.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
    </head> 
<body> 

 <?php include("menu2.php"); ?>

<h1>Athena</h1>
<h2>Site de vente entre particulier</h2>

<p>Athena vous proposse de vendre et d'acheter vos produits : </br>
* Propossez vos produits.</br>
* Rechercher un produit.</br>
* Acheter vos produits.</br>
</p>


<!-- tableau affichage produit-->
 <?php include("affichep.php"); ?>

</body> 
</html>
<!DOCTYPE html > 
<html   lang="fr">
<head> 
	<meta charset="utf-8" /> 
	<title>Athena/Accueil</title> 
	
	<link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head> 
    
<body> 

 <!-- En tête/Menu-->
 <?php include("menu1.php"); ?>

 <!-- Contenu -->
<h1>Athena</h1>
<?php 
if (isset($_GET['message']) && $_GET['message'] == '3') { 
    echo "<span style=’color:#ff0000’>Vous avez été deconnecter</span>"; 
} 
?> 

<h2>Site de vente entre particulier</h2>

<p>Athena vous proposse de vendre et d'acheter vos produits : </br>
* Propossez vos produits.</br>
* Rechercher un produits.</br>
* Acheter vos produits.</br>
</p>


<!-- tableau affichage produit-->
 <?php include("affichep.php"); ?>


</body> 
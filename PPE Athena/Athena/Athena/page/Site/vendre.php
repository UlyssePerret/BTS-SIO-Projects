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
        <title>Athena/Vendre</title> 
		
<link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style2.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
    </head> 
<body> 
 
     <?php include("menu2.php"); ?>

<h1>Athena</h1>

<!-- Produit que vous vendez -->
 <?php include("affichepu.php"); ?>
   
<!-- Ajouter un produit -->
 <?php include("vendrep.php"); ?>
   
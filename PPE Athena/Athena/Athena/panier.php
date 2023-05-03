<?php
session_start();

    $login = $_SESSION['login'] ;
    $motdepasse = $_SESSION['motdepasse'] ;
    
    if(($login=='') && ($motdepasse=='') )
    {
     header('Location: deconnexion.php');
    }
    

echo '<?xml version="1.0" encoding="utf-8" ?>';
?>

<!DOCTYPE html > 
<html   lang="fr">
    <head> 
		<meta charset="utf-8" /> 
        <title>Athena/Panier</title> 
		
<link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style2.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
    </head> 
<body> 

 <?php include("menu2.php"); ?>

<h1>Athena</h1>

<!-- formulaire ajout d'un produit dans le panier-->
 <?php include("ajoutpanier.php"); ?>

  <!-- panier-->
 <?php include("consulpanier.php"); ?>
  
</body>
</html>
    

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
    
    
<div class='container'>
    <div class="row">
    <div class="col-md-offset-1 col-md-10">
    <h1> Votre panier</h1>
    </div>
    </div>


    <!-- Connection -->
<?php
     include ('connection.php'); 

@$id=  $_SESSION['id'] ;  

$reponse = $bdd->query("SELECT `prix`,`stock`,`id_produit`,`nom` FROM `commande` WHERE 1 ");
/* Récupération de toutes les lignes d'un jeu de résultats */
?>
    
<fieldset>
 <h1> Consultation de votre panier<br/>
 <small> Voici toutes les produits que vous avez  achetez</small></h1>
  <!-- début table-->
     <table class="table">
      <thead>
          <tr>
        <th>Nom</th>
        <th>Quantité</th>
        <th>Prix</th>
        
            </tr>
       </thead>
       
       <!-- contenue de la table table-->
<?php
while ($donnees = $reponse->fetch())
{
    //On affiche les données dans le tableau

    echo "<tr>";
    echo "<td> $donnees[nom] </td>";
    echo "<td> $donnees[stock] </td>";
    echo "<td> $donnees[prix] </td>";
    echo "</tr>";

}
?>
</table>
 </fieldset>
</body>
</html><?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


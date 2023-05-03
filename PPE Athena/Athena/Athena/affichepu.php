<!DOCTYPE html > 
<html   lang="fr">
    <!--head -->
    <head> 
	<meta charset="utf-8" /> 
      
	<link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
    </head> 

    <!-- Connection -->
<?php
@$id=  $_SESSION['id'] ;  
 
     include ('connection.php');      
     // code pour l'affichage produit
$reponse = $bdd->query("SELECT * FROM `produit` "
        . "WHERE `id_vendeur`= '".$id."';")
/* Récupération de toutes les lignes d'un jeu de résultats */
?>
    
<!-- Début de table-->
 <fieldset>
           <h1> Consultation des produits que vous vendez actuellement <br/>
 <small> Voici toutes les  produits que vous vendez </small></h1>
  <!-- début table-->
     <table class="table">
      <thead>
          <tr>
        <th>Nom</th>
        <th>prix</th>
        <th>fiche</th>
          </tr>
       </thead>
       
       <!-- contenue de la table table-->
<?php
while ($donnees = $reponse->fetch())
{
    //On affiche les données dans le tableau

    echo "<tr>";
    echo "<td> $donnees[titre] </td>";
    echo "<td> $donnees[prix] </td>";
    echo "<td> $donnees[fiche] </td>";
    echo "</tr>";
 
     
}
?>

            </table>
 </fieldset>
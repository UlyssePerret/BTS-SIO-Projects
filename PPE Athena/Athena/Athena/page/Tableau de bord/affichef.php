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
 
     include ('connection.php');      
$reponse = $bdd->query("SELECT `produit`.`id_produit`, `produit`.`titre`,`produit`.`date`, `produit`.`fiche`,`produit`.`prix`, "
        . "`utilisateur`.`nom` FROM `produit`, `utilisateur`"
        . " WHERE `utilisateur`.`id` = `produit`.`id_vendeur` "
        . "AND `validation`= 0 ;" );
/* Récupération de toutes les lignes d'un jeu de résultats */
?>
    
<!-- Début de table-->
 <fieldset>
           <h1> Consultation des fiches à valider<br/>
 <small> Voici toutes les fiches à valider</small></h1>
  <!-- début table-->
     <table class="table">
      <thead>
          <tr>
        <th>Id_Produit</th>
        <th>Titre</th>
        <th>Date</th>
        <th>Description</th>
        <th>Prix</th>
        <th>Vendeur</th>
          </tr>
       </thead>
       
       <!-- contenue de la table table-->
<?php
while ($donnees = $reponse->fetch())
{
    //On affiche les données dans le tableau

    echo "<tr>";
     echo "<td> $donnees[id_produit] </td>";
    echo "<td> $donnees[titre] </td>";
   echo  "<td> $donnees[date] </td>";
    echo "<td> $donnees[fiche] </td>";
    echo "<td> $donnees[prix] </td>";
    echo "<td> $donnees[nom] </td>";
    echo "</tr>";
 
     
}
?>

            </table>
 </fieldset>
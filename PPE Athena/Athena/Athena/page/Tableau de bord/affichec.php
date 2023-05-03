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
$reponse = $bdd->query("SELECT * FROM `categorie` ");

?>
    
<!-- Début de table-->
 <fieldset>
           <h1> Consultation des catégories<br/>
 <small> Voici toutes les catégories </small></h1>
  <!-- début table-->
    <table class="table">
     <thead>
       <tr>
        <th>Id catégorie</th>
        <th>Libelle</th>
       </tr>
      </thead>
       
       <!-- contenue de la table table-->
<?php
while ($donnees = $reponse->fetch())
{
    //On affiche les données dans le tableau

    echo "<tr>";
    echo "<td> $donnees[id_categorie] </td>";
    echo "<td> $donnees[libelle_categorie] </td>";
    echo "</tr>";
 
     
}
?>

            </table>
 </fieldset>
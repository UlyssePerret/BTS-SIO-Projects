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
$reponse = $bdd->query("SELECT * FROM utilisateur");
/* Récupération de toutes les lignes d'un jeu de résultats */
?>
    
<!-- Début de table-->
 <fieldset>
           <h1> Consultation des comptes <br/>
 <small> Voici toutes les utilisateurs enregistrés</small></h1>
  <!-- début table-->
     <table class="table">
      <thead>
        <th>Id</th>
        <th>Login</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>E-mail</th>
        <th>Groupe </th>
        <th>Mot de passe</th>
        <th>Rue</th> 
        <th>Code Postal</th> 
        <th>Ville</th>
                </tr>
       </thead>
       
       <!-- contenue de la table table-->
<?php
while ($donnees = $reponse->fetch())
{
    //On affiche les données dans le tableau

    echo "<tr>";
    echo "<td> $donnees[id] </td>";
    echo "<td> $donnees[login] </td>";
    echo "<td> $donnees[nom] </td>";
    echo "<td> $donnees[prenom] </td>";
    echo "<td> $donnees[mail] </td>";
    echo "<td> $donnees[groupe] </td>";
    echo "<td> $donnees[motdepasse] </td>";
    echo "<td> $donnees[rue] </td>";
    echo "<td> $donnees[codepostal] </td>";
    echo "<td> $donnees[ville] </td>";
    echo "</tr>";

}
?>
</table>
 </fieldset>
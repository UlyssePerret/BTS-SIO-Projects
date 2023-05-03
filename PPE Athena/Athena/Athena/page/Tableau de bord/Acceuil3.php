<?php
session_start();

      include ('connection.php');
        
                $login = $_SESSION['login'];
                $motdepasse = $_SESSION['motdepasse'];
                $groupe = $_SESSION['groupe'];
                
                //$salt="4jsd@dfh";
                //$mdp = sha1(sha1($mdp).$salt);
                
                $sql = "SELECT * FROM utilisateur WHERE login = :login AND motdepasse = :motdepasse AND groupe ='3' ";
                $connection = $bdd->prepare($sql);
                $connection->execute(array(':login' => $login, ':motdepasse' => $motdepasse)); 
                
                if($connection->rowCount() > 0)
                {
                    //echo 'vous êtes connectez';
                }
                
                else 
                {
                    header('Location: Acceuil2.php');
                    }
?>

<!DOCTYPE html > 
<html   lang="fr">
    <!-- Boot strap-->
    <head> 
	<meta charset="utf-8" /> 
        <title>Athena/tableau de bord</title> 
      
	<link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
    </head> 
    
    <!-- Barre de navigation -->
 <?php include("menu3.php"); ?>
    
    <!-- Contenue -->
    
      <h1> Tableau de bord<br/>
 <small> Voici les fonctions que vous pouvez faire : </small></h1>
    

<ul >

	   <li><a href="gcompte.php">Gestion des comptes</a></li>
           <ul>
               <li><a href="afficheu.php">Afficher les comptes</a> </li>
               <li><a href="modifu.php"> Modifier les comptes</a> </li>
               <li><a href="ajoutu.php"> Ajouter les comptes</a> </li>
           </ul>
        
            <li><a href="fiche.php">Fiches</a></li>
               <ul>
               <li><a href="affichef.php"> Afficher les fiches</a> </li>
               <li><a href="validerf.php"> Valider les fiches</a> </li>
           </ul>
            
              <li><a href="carticle.php">Articles</a></li>
              <ul> 
              <li><a href="affichef.php"> Afficher les articles</a> </li>
              </ul>
                <li><a href="mcategorie.php">Catégories</a></li>
              <ul>
               <li><a href="affichec.php"> Afficher les catégories</a> </li>
               <li><a href="ajoutc.php"> Ajouter les catégories</a> </li>
             
    </ul>
</body>
</html>
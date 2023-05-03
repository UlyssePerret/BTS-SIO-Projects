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
 <!-- Style en tête-->
    <head> 
	<meta charset="utf-8" /> 
        <title>Athena/Gestion des comptes</title> 
      
	<link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
    </head> 
    
<!-- Barre de menu -->
 <?php include("menu3.php"); ?>
   
<!-- Affichage-->
<?php
 include ('afficheu.php');
?>

<!--Modification -->
<?php
 include ('modifu.php');
?>

<!--Ajout -->
 <?php
 include ('ajoutu.php');
 ?>

</body>
</html>
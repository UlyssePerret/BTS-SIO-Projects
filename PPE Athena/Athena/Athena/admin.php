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
        <title>Athena/Admin</title> 
      
	<link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
    </head> 
<body> 

 <!-- En tête/Menu-->
 <?php include("menu2.php"); ?>
 
<h1>Athena</h1>

<div class="container">
    <!-- Formulaire base admin -->
<div class="row">
<div class="col-md-offset-2 col-md-8">
<h1> Connnexion à la base Admin <br/>
 <small> Merci de renseigner vos informations </small></h1>
</div>
</div>
    
    <!-- Login -->
<form action="" method="post">
<div class="row">
<div class="col-md-offset-2 col-md-3">
<div class="form-group">
<label for="login">Login</label>
<input type="text" class="form-control" name="login" placeholder="mettre votre email" require>
</div>
</div>
</div>

    <!-- Mot de passe -->
<div class="row">
<div class="col-md-offset-2 col-md-3">
<div class="form-group">
<label for="Password">Mot de passe</label>
<input type="password" class="form-control" name="motdepasse" placeholder="Mot de passe">
</div>
</div>
</div>

<br/>
<div class="row">
<div class="col-md-offset-5 col-md-1">
<input name="envoi" type="submit" class="btn btn-primary" value="Se Connecter"/>
</div>
</div>

<!-- Code, connection tableau de bord -->
 <?php
$bdd = new PDO('mysql:host=localhost:3306;dbname=athena','root','');
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);     

        include ('connection.php');
        
        if(isset($_POST['envoi'])) {
            
            if(!empty($_POST['login']) AND !empty($_POST['motdepasse']))
                {
                
                $login = $_POST['login'];
                $motdepasse = $_POST['motdepasse'];
                
                // selectionne et vérfie que l'utilisateur est bien dans le groupe administrateur
                
                $sql = "SELECT * FROM utilisateur WHERE login = :login AND motdepasse = :motdepasse AND groupe ='3' ";
                $connection = $bdd->prepare($sql);
                $connection->execute(array(':login' => $login, ':motdepasse' => $motdepasse)); 
                
                if($connection->rowCount() > 0)
                    {
                    
                    $data = $connection->fetch();
                    
                    $_SESSION['login'] = $data['login'];
                    $_SESSION['motdepasse'] = $data['motdepasse'];
                    $_SESSION['id'] = $data['id'];     
                    $_SESSION['mail'] = $data['mail'];
                    $_SESSION['nom'] = $data['nom'];
                    $_SESSION['prenom'] = $data['prenom'];
                    $_SESSION['groupe'] = $data['groupe'];
                    $_SESSION['rue'] = $data['rue'];
                    $_SESSION['codepostal'] = $data['codepostal'];
                    $_SESSION['ville'] = $data['ville'];
                    
                    header('Location: Acceuil3.php');
                }
                
                else 
                    {
                    
                $sql = "SELECT * FROM utilisateur WHERE login = :login AND motdepasse = :motdepasse ";
                $connection = $bdd->prepare($sql);
                $connection->execute(array(':login' => $login, ':motdepasse' => $motdepasse)); 
                if($connection->rowCount() <= 0)
                    { 
                    echo'<font color=red><b>Pseudo ou mot de passe incorrect</b></font>';}
                    
                    else
                        { 
                    
                        header('Location: Acceuil2.php');
                       }
                    }
            }
            
            else {
                echo '<font color=red><b>Merci de remplir tous les champs</b></font>';
            }
            
        }
        
        ?>
 </div>
</body> 

</html>
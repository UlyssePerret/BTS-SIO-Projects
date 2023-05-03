<?php 
include ('connection.php');
?>
<!DOCTYPE html > 
<html   lang="fr">
    <head> 
		<meta charset="utf-8" /> 
        <title>Athena/Inscription</title> 
      
	<link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
    </head> 
<body> 

 <!-- En tête/Menu-->
  <?php include("menu1.php"); ?>

<h1>Athena</h1>


<div class="container">
<div class="row">
<div class="col-md-offset-2 col-md-8">
<h1> Inscription <br/>
 <small> Merci de renseigner vos informations </small></h1>
</div>
</div>
<!-- Formulaire -->
<form action="" method="post">
    
<!-- Nom /Prénom-->  
<div class="row">
<div class="col-md-offset-2 col-md-3">
<div class="form-group">
<label for="Nom">Nom</label>
<input type="text" class="form-control" name="name" placeholder="Nom" require>
</div>
</div>
<div class="col-md-offset-1 col-md-3">
<div class="form-group">
<label for="Prenom">Prénom</label>
<input type="text" class="form-control" name="prenom" placeholder="Prénom" require>
</div>
</div>
</div>

<!-- Email--> 
<div class="row">
<div class="col-md-offset-2 col-md-7">
<div class="form-group">
<label for="Email">Email address</label>
<input type="text" class="form-control" name="email" placeholder="Enter email">
</div>
</div>
</div>

<!-- Mot de passe--> 
<div class="row">
<div class="col-md-offset-2 col-md-3">
<div class="form-group">
<label for="Password">Mot de passe</label>
<input type="password" class="form-control" name="password" placeholder="Mot de passe">
</div>
</div>
<div class="col-md-offset-1 col-md-3">
<div class="form-group">
<label for="Vpassword">Vérification mot de passe</label>
<input type="password" class="form-control" name="vpassword" placeholder="Vérification mot de passe">
</div>
</div>
</div>

<div class="row">
<div class="col-md-offset-2 col-md-3">

<!-- adresse--> 
<div class="input-group">
<span class="input-group-addon glyphicon glyphicon-globe"></span>
<label for="Adresse">Adresse</label>
<input type="text" class="form-control" name="rue" placeholder="Rue">
<input type="text" class="form-control" name="code_Postal" placeholder="Code Postal" aria-describedby="basic-addon1">
<input type="text" class="form-control" name="ville" placeholder="Ville" aria-describedby="basic-addon1">

</div>
</div>
</div>

<br/>
<!-- Bouton--> 
<div class="row">
<div class="col-md-offset-5 col-md-1">
<input name="envoi" type="submit" class="btn btn-primary" value="Envoyer mes informations"/>
</div>
</div>
 </form>

<!-- Php : Inscription--> 
  <?php
    
    if (isset($_POST['envoi'])) {
        
        $nom = htmlspecialchars($_POST['name']);
        $prenom= htmlspecialchars(trim($_POST['prenom']));
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);
        $vpassword = htmlspecialchars($_POST['vpassword']);
        $rue = htmlspecialchars($_POST['rue']);
        $codepostal = htmlspecialchars($_POST['code_Postal']);
        $ville= htmlspecialchars($_POST['ville']);
        

        
       echo $nom, $prenom,$email,$password,$vpassword,$rue,$ville,$codepostal ;
       
        if(($nom!='') && ($prenom!='')&&($email!='') && ($password!='') && ($vpassword!='') && ($rue!='') && ($ville!='') && ($codepostal!=''))
                {
            if(($password==$vpassword)){
                          
                //login et mot de passe qui se crée dans la base
                    $sql = "INSERT INTO utilisateur(nom, prenom, mail, login, motdepasse, groupe, rue, codepostal, ville) "
                            . "VALUES('".$nom."','".$prenom."','".$email."','".$email."','".$password."', 4 ,'".$rue."','".$codepostal."','".$ville."')";
                    
                    $bdd->exec($sql);

                    
                   //$bdd->execute($sql);
                    
                    echo '<font color=green>Inscription terminer</font>';
                    echo 'Veuillez vous connectez';
                    header("Refresh: 1;url=Acceuil2.php");
                    
                }
            
            else{
                echo 'Erreur entre le nouveau mot de passe et la confirmation du mot de passe';
            }
        }
        else{
            echo 'Veuillez remplir tous les champs';
        }
    }
?>
</div>



</body> 
</html>	
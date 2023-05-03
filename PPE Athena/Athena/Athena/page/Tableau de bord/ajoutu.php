<!DOCTYPE html > 
<html   lang="fr">
<!-- head -->
    <head> 
	<meta charset="utf-8" /> 
      
	<link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
    </head> 

<div class="container">
 <!-- Ajout des comptes html-->  
 <div class="ajout">
<div class="row">
<div class="col-md-offset-2 col-md-8">
<h1> Ajout d'un compte <br/>
 <small> Merci de renseigner les information de l'utilisateur </small></h1>
</div>
</div>

<form action="" method="post">
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

<div class="row">
<div class="col-md-offset-2 col-md-7">
<div class="form-group">
<label for="Email">Email address</label>
<input type="text" class="form-control" name="email" placeholder="Enter email">
</div>
</div>
</div>

<div class="col-md-offset-2 col-md-7">
<div class="form-group">
<label for="groupe">Groupe</label>
<input type="text" class="form-control" name="groupe" placeholder="Groupe" require>
</div>
</div>
    
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

<div class="input-group">
<span class="input-group-addon glyphicon glyphicon-globe"></span>
<label for="adresse">Adresse</label>
<input type="text" class="form-control" name="rue" placeholder="Rue">
<input type="text" class="form-control" name="code_Postal" placeholder="Code Postal" aria-describedby="basic-addon1">
<input type="text" class="form-control" name="ville" placeholder="Ville" aria-describedby="basic-addon1">

</div>
</div>
</div>

<br/>
<div class="row">
<div class="col-md-offset-5 col-md-1">
<input name="envoi" type="submit" class="btn btn-primary" value="Ajouter l'utilisateur"/>
</div>
</div>
 </form>
</div>   
 
<!-- Ajout des comptes php-->
<div id='ajout'>
    <?php
    
    if (isset($_POST['envoi'])) 
        {
        
        $nom = htmlspecialchars($_POST['name']);
        $prenom= htmlspecialchars(trim($_POST['prenom']));
        $email = htmlspecialchars($_POST['email']);
        $groupe = htmlspecialchars($_POST['groupe']);
        $password = htmlspecialchars($_POST['password']);
        $vpassword = htmlspecialchars($_POST['vpassword']);
        $rue = htmlspecialchars($_POST['rue']);
        $codepostal = htmlspecialchars($_POST['code_Postal']);
        $ville= htmlspecialchars($_POST['ville']);
        
       echo $nom, $prenom,$email,$password,$vpassword,$rue,$ville,$codepostal,$groupe ;
       
        if(($nom!='') && ($prenom!='')&&($email!='') && ($groupe!='') && ($password!='') && ($vpassword!='') && ($rue!='') && ($ville!='') && ($codepostal!=''))
                {
            if(($password==$vpassword)){
                 //inserer un utilisateur 
                
                    $sql = "INSERT INTO utilisateur(nom, prenom, groupe, mail, login, motdepasse, rue, codepostal, ville) "
                            . "VALUES('".$nom."','".$prenom."','".$groupe."','".$email."','".$email."','".$password."','".$rue."','".$codepostal."','".$ville."')";
                    
                    $bdd->exec($sql);

                    
                    echo '<font color=green>ajout terminer</font>';
                
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

</div>

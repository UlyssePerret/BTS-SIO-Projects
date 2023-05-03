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

  <!--Formulaire -->
<div class="container">
<div class="modif">
    <form action="" method="post">
      <!-- En tête form-->
<div class="row">
<div class="col-md-offset-2 col-md-8">
<h1> Modification d'un compte <br/>
 <small> Merci de tout remplir </small></h1>
</div>
</div>
    
    <!-- ID important ! -->
<div class="row">
<div class="col-md-offset-2 col-md-7"> 
<label for="id">Indiquer quel id d'utilisateur vous allez changez</label>
<input type="text" class="form-control" name="id" placeholder="Id" require>
</div>
</div>
 
    <!-- Nom / Prenom -->
<div class="row">
<div class="col-md-offset-2 col-md-3">
<label for="Nom">Nom</label>
<input type="text" class="form-control" name="name" placeholder="Nom" require>
</div>
    
<div class="col-md-offset-1 col-md-3">
<div class="form-group">
<label for="Prenom">Prénom</label>
<input type="text" class="form-control" name="prenom" placeholder="Prénom" require>
</div>
</div>
</div>

<!-- email -->
<div class="row">
<div class="col-md-offset-2 col-md-7">
<div class="form-group">
<label for="Email">Email address</label>
<input type="text" class="form-control" name="email" placeholder="Enter email">
</div>
</div>
</div>

<!-- Groupe -->
<div class="row">
<div class="col-md-offset-2 col-md-7">
<div class="form-group">
<label for="groupe">Groupe</label>
<input type="text" class="form-control" name="groupe" placeholder="Groupe" require>
</div>
</div>
</div>

<!-- mot de passe -->
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

<!-- Adresse -->  
<div class="row">
<div class="col-md-offset-2 col-md-3">
<div class="input-group">
<span class="input-group-addon glyphicon glyphicon-globe"></span>
<label for="Rue">Adresse</label>
<input type="text" class="form-control" name="rue" placeholder="Rue">
<input type="text" class="form-control" name="code_Postal" placeholder="Code Postal" aria-describedby="basic-addon1">
<input type="text" class="form-control" name="ville" placeholder="Ville" aria-describedby="basic-addon1">

</div>
</div>
</div>
<br/>

<!-- Bouto, -->
<div class="row">
<div class="col-md-offset-5 col-md-1">
<input name="modifu" type="submit" class="btn btn-primary" value="Modifer l'utilisateur"/>
</div>
</div>
 </form>
</div>   
 </div>   
 
<!-- Modifcation des comptes php-->
<div id='modif2'>
    <?php
    
    if (isset($_POST['modifu'])) 
        {
        $id = htmlspecialchars($_POST['id']);
        $nom = htmlspecialchars($_POST['name']);
        $prenom= htmlspecialchars(trim($_POST['prenom']));
        $email = htmlspecialchars($_POST['email']);
        $groupe = htmlspecialchars($_POST['groupe']);
        $password = htmlspecialchars($_POST['password']);
        $vpassword = htmlspecialchars($_POST['vpassword']);
        $rue = htmlspecialchars($_POST['rue']);
        $codepostal = htmlspecialchars($_POST['code_Postal']);
        $ville= htmlspecialchars($_POST['ville']);
        
   
    
        if(($id!='') &&($nom!='') && ($prenom!='')&&($email!='') && ($groupe!='') && ($password!='') && ($vpassword!='') && ($rue!='') && ($ville!='') && ($codepostal!=''))
                {
            if(($password==$vpassword))
                {

                    $reponse =  "UPDATE athena.utilisateur SET nom ='".$nom."', prenom ='".$prenom."', groupe = '".$groupe."',"
                            . " mail = '".$email."', login ='".$email."' , motdepasse = '".$password."',"
                            . " rue= '".$rue."', codepostal = '".$codepostal."', ville = '".$ville."' "
                            . "WHERE `utilisateur`.`id` = '".$id."' ;";
                   
                    
                $bdd->exec($reponse);

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

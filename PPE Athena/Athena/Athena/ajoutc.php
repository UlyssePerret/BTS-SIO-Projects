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
<h1> Ajout d'une catégorie <br/>
 <small> Quel nouvelle catégorie voulez-vous créer?</small></h1>
</div>
</div>

<form action="" method="post">
<div class="row">
    
<div class="col-md-offset-1 col-md-3">
<div class="form-group">
<label for="Libelle">Libelle</label>
<input type="text" class="form-control" name="libelle" placeholder="Libelle" require>
</div>
</div>
</div>

<br/>
<div class="row">
<div class="col-md-offset-5 col-md-1">
<input name="envoi" type="submit" class="btn btn-primary" value="Ajouter la catégorie"/>
</div>
</div>
 </form>
</div>   
 
<!-- Ajout des comptes php-->
<div id='envoi'>
    <?php
    
    if (isset($_POST['envoi'])) 
        {
        
        $libelle = htmlspecialchars($_POST['libelle']);
        
       echo $libelle ;
       
        if($libelle!='')
                {
            
             //Inserer une nouvelle catégorie 
                
                    $sql = "INSERT INTO categorie (libelle_categorie) "
                            . "VALUES('".$libelle."')";
                    
                    $bdd->exec($sql);

                    
                    echo '<font color=green>ajout terminer</font>';
                
                }
        else{
            echo 'Veuillez remplir tous les champs';
        }
        
        }

?>
    </div>

</div>

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
<h1> Validation d'une fichee <br/>
 <small> Merci de tout remplir </small></h1>
</div>
</div>
    
    <!-- ID important ! -->
<div class="row">
<div class="col-md-offset-2 col-md-7"> 
<label for="id">Quelle fiche voulez vous valider?</label>
<input type="text" class="form-control" name="id" placeholder="Id produit" require>
</div>
</div>


<!-- Bouto, -->
<div class="row">
<div class="col-md-offset-5 col-md-1">
<input name="modiff" type="submit" class="btn btn-primary" value="Valider la fiche"/>
</div>
</div>
 </form>
</div>   
 </div>   
 
<!-- Validation php-->
<div id='modif2'>
    <?php
    
    if (isset($_POST['modiff'])) 
        {
        $id = htmlspecialchars($_POST['id']);
        
   
    
        if($id!='')
            {
           // Valider la fiche
                $reponse =  "UPDATE `athena`.`produit` SET `validation` = '1' WHERE `produit`.`id_produit` = '".$id."';";
       
                $bdd->exec($reponse);
                }
         else{
            echo 'Veuillez remplir l id produit de la fiche que vous voulez modifier';
            }
        }
         
?>
    </div>
</div>

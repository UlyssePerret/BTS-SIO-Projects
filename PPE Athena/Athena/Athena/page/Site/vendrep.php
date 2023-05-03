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
<h1> Vendre un produit <br/>
 <small> Quel produit voulez vous vendre?</small></h1>
</div>
</div>

<form action="" method="post">
<div class="row">
<div class="col-md-offset-1 col-md-3">
<div class="form-group">
<label for="Libelle">Nom</label>
<input type="text" class="form-control" name="nom" placeholder="Nom du produit" require>
</div>
</div>
</div>

    <div class="row">  
<div class="form-group">
<div class="col-md-offset-1 col-md-3">
<label for="prix">Prix</label>
<input type="text" class="form-control" name="prix" placeholder="prix" >
</div>
</div>
</div>
    
<div class="row">  
<div class="form-group">
<div class="col-md-offset-1 col-md-3">
<label for="fiche">Fiche</label>
<input type="text" class="form-control" name="fiche" placeholder="fiche" >
</div>
</div>
</div>

<div class="row">  
<div class="form-group">
<div class="col-md-offset-1 col-md-3">
<label for="Tag">Tag</label>
<input type="text" class="form-control" name="tag" placeholder="tag" >
</div>
</div>
</div>
   
<br/>
<div class="row">
<div class="col-md-offset-5 col-md-1">
<input name="envoi" type="submit" class="btn btn-primary" value="Vendre le produit"/>
</div>
</div>
 </form>
</div>   
 
<!-- Ajout des comptes php-->
<div id='envoi'>
    <?php
    
    if (isset($_POST['envoi'])) 
        {
        
        $id_vendeur = $_SESSION['id'];
        $nom = htmlspecialchars($_POST['nom']);
        $prix = htmlspecialchars($_POST['prix']);
        $fiche = htmlspecialchars($_POST['fiche']);
        $tag = htmlspecialchars($_POST['tag']);
        
      
        
       
        if(($id_vendeur!='') && ($nom!='') && ($prix!='')&& ($fiche!='') )
                {
            
                 //execute($sql)  
                
                    $sql = " INSERT INTO `athena`.`produit` (`id_produit`, `titre`, `image`, `prix`, `fiche`, `stock`, `validation`, `id_vendeur`, `id_categorie`, `date`, `tag`)
                        VALUES (NULL,'".$nom."', '".$prix."', '' ,'".$fiche."',"
                            . " '1', '0', '".$id."', '', NOW() , '".$tag."'); " ;
                    
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

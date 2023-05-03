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
<h1> Achetez un produit <br/>
 <small> Quel produit voulez vous Achetez?</small></h1>
</div>
</div>

<form action="" method="post">
<div class="row">
<div class="col-md-offset-1 col-md-3">
<div class="form-group">
<label for="Nom">Nom</label>
<input type="text" class="form-control" name="nom" placeholder="Nom du produit" require>
</div>
</div>
</div>


     <div class="row">  
<div class="form-group">
<div class="col-md-offset-1 col-md-3">
<label for="prix">Quantité</label>
<input type="text" class="form-control" name="stock" placeholder="stock" >
</div>
</div>
</div>   
   
<br/>
<div class="row">
<div class="col-md-offset-5 col-md-1">
<input name="envoi" type="submit" class="btn btn-primary" value="Achetez produit"/>
</div>
</div>
 </form>
</div>   
 
<!-- Ajout des comptes php-->
<div id='envoi'>
    <?php
    
    if (isset($_POST['envoi'])) 
        {
        
         include ('connection.php');
         
        $idu = $_SESSION['id'];
        $nom = htmlspecialchars($_POST['nom']);
        $stock = htmlspecialchars($_POST['stock']);
      
        // on cherche le produit avec le nom
            $recherche = htmlspecialchars($_POST['nom']);
            $recherchec = '%' . $recherche . '%';
            
// recherche
    $reponse = $bdd->query("SELECT * FROM produit "
    . "where ('nom' LIKE '$recherchec' ) OR (`fiche` LIKE '%$recherchec%' )"
    . "OR (`commentaire`LIKE '%$recherchec%' )ORDER BY 'nom' ;");

    $donnees = $reponse->fetch();
    @$idp= $donnees[id_produit];
    
    @$prix= $donnees[prix];
    $prixt= $prix * $stock ;
 
  
                
        if(($idu!='') && ($nom!='') && ($stock!='') )
                {
//execute($sql)  
                
$sql = " INSERT INTO `athena`.`commande` (`id_commande`, `id_utilisateur`, `id_produit`, `stock`, `prix`, `nom`)"
        . "VALUES (NULL, '".$idu."', '".$idp."', '".$stock."', '".$prixt."', '".$nom."'); " ;


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

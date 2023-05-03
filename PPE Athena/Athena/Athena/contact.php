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

    <head> 
		<meta charset="utf-8" /> 
        <title>Athena/Contact</title> 
				
<link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/style2.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	
    </head> 
    <body>

 <?php include("menu2.php"); ?>
    
<h1>Athena</h1>
<div class="container">
<div class="row">
<div class="col-md-offset-2 col-md-8">
<h1> Contact<br/>
 <small> Pour envoyer un message à l'administrateur du site</small></h1>
</div>
</div>
<!-- Formulaire -->
<form action="" method="post">
    
<!-- Sujet--> 
<div class="row">
<div class="col-md-offset-2 col-md-7">
<div class="form-group">
<label for="Sujet">Objet</label>
<input type="text" class="form-control" name="sujet" placeholder="objet">
</div>
</div>
</div>
<br/>

<!-- Message--> 
<div class="row">
<div class="col-md-offset-2 col-md-7">
<div class="form-group">
<label for="Message">Message</label>
<input type="text" class="form-control" name="message" placeholder="Votre message">
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
 
<?php
   if (isset($_POST['envoi'])) 
       {
$sujet = htmlspecialchars($_POST['sujet']);
$message = htmlspecialchars($_POST['message']);
$destinataire = 'ulysseperret.com';
// Envoi du mail
@mail($destinataire, $sujet, $message);

echo "Votre message a été bien  envoyer";
   }
?>
</body>
</html>
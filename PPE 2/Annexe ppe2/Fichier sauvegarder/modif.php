<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
<div class="haut">
<p>
<img src="image/logo_ipssi.png" alt="logo Ipssi" />
<img src="image/logo2.png" alt="logo Ip-Formation" />
</p>
</div>

<center>
<div class="form">
<h1> Formulaire de modification </h1>
<hr  />
Vous voulez modifier le module N°
<?php 
$num = $_GET["num"];
echo $_GET["num"];
@mysql_connect("localhost","root", "");
mysql_select_db("sospartenaire");
$req="select * from sospartenaire where IdModule ='$num'";
$res = mysql_query($req);
$ligne2 = @mysql_fetch_assoc($res);

?>

<form method="POST" action="modif2.php">
IdModule : <input type="text" name="IdModule" 
	value="<?php echo $ligne2["IdModule"];?>" /> <br /><br />
Date : <input type="text" name="ContenueSequenceDate" 
	value="<?php echo $ligne2["ContenueSequenceDate"];?>" /><br /><br />
Module : <input type="text" name="ContenueSequenceModule" 
	value="<?php echo $ligne2["ContenueSequenceModule"];?>" /><br /><br />
Description : <input type="text" name="ContenueSequenceDescription" 
	value="<?php echo $ligne2["ContenueSequenceDescription"];?>" /><br /><br />
Nombres de Minutes : <input type="text" name="NombreMinute" 
	value="<?php echo $ligne2["NombreMinute"];?>" /> <br /><br />
Nom du Formateur : <input type="text" name="ContenueSequenceFormateurNom" 
	value="<?php echo $ligne2["ContenueSequenceFormateurNom"];?>" /> <br /><br />	
Prenom du Formateur	:<input type="text" name="ContenueSequenceFormateurPrenom" 
value="<?php echo $ligne2["ContenueSequenceFormateurPrenom"];?>" /> <br /><br />	
<input type="hidden" name="IdDate" value="<?php echo $ligne2["IdDate"];?>" >
<input type="submit" value="Modification">

</form>
</div>

<div class="bas">
Mention legal : 
<a href="mentionlegal.php" >ici</a>
</br>

© 1998-2013 groupe ip-formation | PARIS : 01 55 43 26 65 | LYON : 0811 692 888 | Tous droits réservés
</div>
</body>
</html>
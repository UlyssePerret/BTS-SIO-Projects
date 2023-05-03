<?php 
$num = $_POST["num"];
$IdModule = $_POST["IdModule"];
$IdDate= $_POST["IdDate"];
$ContenueSequenceDate = $_POST["ContenueSequenceDate"];
$ContenueSequenceModule = $_POST["ContenueSequenceModule"];
$ContenueSequenceDescription = $_POST["ContenueSequenceDescription"];
$NombreMinute = $_POST["NombreMinute"];
$ContenueSequenceFormateurNom = $_POST["ContenueSequenceFormateurNom"];
$ContenueSequenceFormateurPrenom = $_POST["ContenueSequenceFormateurPrenom"];

echo $_GET["num"];
@mysql_connect("localhost","root", "");
mysql_select_db("sospartenaire");
$req="update `ppe2`.`realiser set
IdModule = $IdModule ,
ContenueSequenceDate='$ContenueSequenceDate',
ContenueSequenceDate =  $ContenueSequenceDate,
ContenueSequenceModule = $ContenueSequenceModule,
ContenueSequenceDescription = $ContenueSequenceDescription,
NombreMinute = $NombreMinute,
ContenueSequenceFormateurNom = $ContenueSequenceFormateurNom,
ContenueSequenceFormateurPrenom =  $ContenueSequenceFormateurPrenom,
 where numed=$num";
 mysql_query($req);
header("location:cahierdetexte.php");
?>


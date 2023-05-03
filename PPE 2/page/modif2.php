<?php 
$num = $_POST["num"];
$IdModule= $_POST["IdModule"];
$Date= $_POST["Date"];
$ContenueSequenceModule= $_POST["ContenueSequenceModule"];
$Description= $_POST["Description"];
$ContenueFormateurNom = $_POST["ContenueFormateurNom"];
$ContenueFormateurPrenom = $_POST["ContenueFormateurPrenom"];
$NombreMinute = $_POST["NombreMinute"];
$IdDate = $_POST["IdDate"];
echo $_GET["num"];
@mysql_connect("localhost","root", "");
mysql_select_db("ppe2");
$req="
UPDATE `ppe2`.`realiser`
SET 
`IdModule`= '$IdModule',
`IdDate` = '$IdDate',
`ContenueSequenceDate` = '$Date', 
`ContenueSequenceModule` = '$ContenueSequenceModule', 
`ContenueSequenceDescription` = '$Description',
`ContenueFormateurNom` = '$ContenueFormateurNom',
`ContenueFormateurPrenom` = '$ContenueFormateurPrenom',
`NombreMinute` = '$NombreMinute'

WHERE `realiser`.`num` = '$num';";
 mysql_query($req);
header("location:cahierdetexte.php");
?>

<?php
$num = $_GET["num"];

mysql_connect("localhost", "root", "");
mysql_select_db("ppe2");

$req = "DELETE FROM `ppe2`.`realiser` WHERE `realiser`.`num` = '$num' ";
mysql_query($req);
header("location:cahierdetexte.php");


?>

 <?php
 //Connection
try {

    $bdd = new PDO('mysql:host=localhost:3306;dbname=athena','root','');
	$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
}

// Exception
    catch (Exception $e) {
        
        die('erreur :'.$e->getMessage());
        
    }

?>

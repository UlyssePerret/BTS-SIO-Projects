<?php
session_start();

$login = $_SESSION['login'];
$motdepasse = $_SESSION['motdepasse'];

if (($login == '') && ($motdepasse == '')) {
    header('Location: deconnexion.php');
}
?>

<!DOCTYPE html > 
<html   lang="fr">
    <head> 
        <meta charset="utf-8" /> 
        <title>Athena/Recherchez</title> 

        <link rel="stylesheet" href="bootstrap-3.3.6-dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style2.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">

    </head> 
    <body> 

        <?php include("menu2.php"); ?>

        <h1>Athena</h1>

        <!--Affichage -->
        <div class="container">
            <!-- Ajout des comptes html-->  
            <div class="affiche">
                <div class="row">
                    <div class="col-md-offset-2 col-md-8">
                        <h1> Rechercher</h1>
                    </div>
                </div>

                <form action="" method="post">
                    <div class="row">

                        <div class="col-md-offset-1 col-md-10">
                            <label for="Libelle">Rechercher</label>
                            <input type="text" class="form-control" name="recherche" placeholder="nom, fiche..." require>
                        </div>
                    </div>
                    <br/>
                    <div class="row">
                        <div class="col-md-offset-4 col-md-2">
                    <input name="envoi" type="submit" class="btn btn-primary" value="Rechercher"/>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- Code -->
        <?php
// Connection
        include ('connection.php');

        if (isset($_POST['envoi'])) {

            $recherche = htmlspecialchars($_POST['recherche']);
            $recherchec = '%' . $recherche . '%';
// recherche
            $reponse = $bdd->query("SELECT * FROM produit "
                    . "where ('nom' LIKE '$recherchec' ) OR (`fiche` LIKE '%$recherchec%' )"
                    . " OR (`tag` LIKE '%$recherchec%' )"
                    . "ORDER BY 'nom' ;");


// Verification recherche             
            echo '<font color=green>recherche terminer</font>';

            echo "<table class='table'>";
            echo "  <thead> ";
            echo "  <tr>";
            echo "  <th>Nom</th>";
            echo "  <th>prix</th>";
            echo "  <th>fiche</th>";
           
            echo "  <th>stock</th> ";
            echo "  </tr>";
            echo "  </thead>";

            while ($donnees = $reponse->fetch()) {
                //On affiche les données dans le tableau

                echo "<tr>";
                echo "<td> $donnees[titre] </td>";
                echo "<td> $donnees[prix] </td>";
                echo "<td> $donnees[fiche] </td>";
               
                echo "<td> $donnees[stock] </td>";
                echo "</tr>";
            }
        }
        ?>
    </table>
</fieldset>
</html>

<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarGo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<?php
    include_once("header.php");
?>
<body>
    <form action="voiture_affichage.php" method="post">

    <label for="modele-select">choix modele:</label>
    <select name="modele" size="1" id="modele-select">
    <?php

        try {
            $connexion = new PDO('mysql:host=localhost;dbname=locautoV2',
            'root', '');
            $requete = 'SELECT * FROM modele';
            $resultat = $connexion->query($requete);
            while ($ligne = $resultat->fetch()) {
                echo "\t\t<option value ='" . $ligne["id_modele"] . "'>"
                . $ligne["libelle"] . "</option>\n";
                }
            }
            catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage() . "<br/>";
            die();
        }

        echo "</select>";
    ?>

        <!-- Validation -->
        <br/><br/>
        <input type="submit" value="Valider"/>
        
    </form>
</body>
</html>
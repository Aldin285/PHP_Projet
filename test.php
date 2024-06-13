<!DOCTYPE html>
<html>
    <head>
        <title> page1 </title>
    </head>
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
        ?>
        </select>


        <!-- Validation -->
        <br/><br/>
        <input type="submit" value="Valider"/>
        
        </form>
    </body>
</html>
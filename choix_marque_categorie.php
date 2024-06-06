<!DOCTYPE html>
<html>
    <head>
        <title> Choix Marque Categorie </title>
    </head>
        <body>
        <form action="voiture_affichage.php" method="get">
        <!-- barre étendue des modeles -->
        <!-- <label for="modele-select">choix modele:</label>
        <select name="modele" size="1" id="modele-select">
        < php
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
        </select>   -->

            <!-- barre étendue des marques  -->
        <label for="marque-select">choix marque:</label>
        <select name="marque" size="1" id="marque-select">
        <option value="">--select--</option>
        <?php
            try {
                $connexion = new PDO('mysql:host=localhost;dbname=locautoV2',
                'root', '');
                $requete = 'SELECT * FROM marque';
                $resultat = $connexion->query($requete);
                while ($ligne = $resultat->fetch()) {
                    echo "\t\t<option value ='" . $ligne["id_marque"] . "'>"
                    . $ligne["libelle"] . "</option>\n";
                    }
                }
                catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage() . "<br/>";
                die();
            }
        ?>
        </select>

            <!-- barre étendue des categories -->
        <label for="categorie-select">choix categorie:</label>
        <select name="categorie" size="1" id="categorie-select">
        <option value="">--select--</option>
        <?php
            try {
                $connexion = new PDO('mysql:host=localhost;dbname=locautoV2',
                'root', '');
                $requete = 'SELECT * FROM categorie';
                $resultat = $connexion->query($requete);
                while ($ligne = $resultat->fetch()) {
                    echo "\t\t<option value ='" . $ligne["id_categorie"] . "'>"
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
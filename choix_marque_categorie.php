<!DOCTYPE html>
<html>
    <head>
        <title> Choix Marque Categorie </title>
    </head>
        <body>
            <!-- debut code choix marque categorie -->
        <form action="voiture_affichage.php" method="get">
    
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


        <!-- Validation choix marque categorie-->
        <br/><br/>
        <a href="voiture_affichage.php" >
        <input type="submit" value="Valider"/>
        </a>
        
        </form>
        <!-- fin code choix marque categorie -->
    </body>
</html>
// FormEmploye.php
<!DOCTYPE html>
<html>
    <head><title>Saisie</title></head>
        <body>
            <form action="MaJEmploye.php" method=get>
            <h2>Saisie d'un client</h2>
            Nom : <input type="text" name="nom" size="25" /><br/><br/>
            prenom : <input type="text" name="prenom" size="3" /><br/><br />
            adresse : <input type="text" name="adresse" size="25" /><br/><br />
            adress mail : <input type="text" name="mail" size="3" /><br/><br />
            Mot de passe : <input type="password" name="password" size="25" /><br/><br />
            Type client :<br /><br />
            <select name="type_client" size="1">
            <?php
            try {
                $connexion = new PDO('mysql:host=localhost;dbname=locautov2',
                'root', '');
                $requete = 'SELECT * FROM type_de_client';
                $resultat = $connexion->query($requete);
                while ($ligne = $resultat->fetch()) {
                    echo "\t\t<option value ='" . $ligne["id_type_de_client"] . "'>"
                    . $ligne["libelle"] . "</option>\n";
                }
                } 
                catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage() . "<br/>";
                die();
            }
            ?>
            </select>
            <p><input type="submit" value = "S'enregistrer" />
            <input type="reset" value="Annuler" /></p>
            </form>
        </body>
</html>
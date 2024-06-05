// FormEmploye.php
<!DOCTYPE html>
<html>
    <head><title>Nouveau User</title></head>
        <body>
            <form action="s'enregistré.php" method=get>
            <h2>Saisie d'un client</h2>
            <label for="nom"><b>Nom:</b></label>
            <input type="text" name="nom" size="25" placeholder="Veuillez saisir votre nom" required /><br/><br/>

            <label for="prenom"><b>Prenom :</b></label>
            <input type="text" name="prenom" size="25" placeholder="Veuillez saisir votre prénom " required /><br/><br />

            <label for="adresse"><b>Adresse</b></label>
            <input type="text" name="adresse" size="35" placeholder="Veuillez saisir votre adresse" required /><br/><br />

            <label for="mail"><b>Adresse mail:</b></label>
            <input type="text" name="mail" size="30" placeholder="Veuillez saisir votre adresse mail " required /><br/><br />

            <label for="password"><b>Mot de passe:</b></label>
            <input type="password" name="password" size="30" minlength='8'  placeholder="Veuillez saisir votre mot de passe " required /><br/><br />

            <label for="type_client"><b>Type de client:</b></label>
            <br /><br />
            <select name="type_client" size="1" >
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
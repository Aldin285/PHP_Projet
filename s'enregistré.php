
<!DOCTYPE html>
<html>
<head><title>Ajout d'un client</title></head>
    <body>
        <?php
        // variables passées par le formulaire
        $prenom = $_GET["prenom"];
        $nom = $_GET["nom"];
        $adresse = $_GET["adresse"];
        $mail = $_GET["mail"];
        $password = $_GET["password"];
        $type_client = $_GET["type_client"];
        try {
            $connexion = new PDO('mysql:host=localhost;dbname=locautov2',
            'root', '');
            $requete = 'INSERT INTO client
            (nom,prenom,adresse,adresse_mail,mot_de_pass,id_type_de_client)
            VALUES
            ("'.$nom.'", "'.$prenom.'", "'.$adresse
            .'", "'.$mail.'", "'.$password.'",'.$type_client.')';
            $resultat = $connexion->query($requete);
            $ligne = $resultat->fetch();
            // l'insertion s'est bien passée => retourner l'info à l'user
            echo "Vous avez été ajouté avec succés !";
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage() . "<br/>";
            die();
        }
        ?>
    </body>
</html>
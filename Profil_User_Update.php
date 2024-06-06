<!DOCTYPE html>
<html>
<head><title>Mise à jour profil</title></head>
    <body>
        <?php
        try {
            $connexion = new PDO('mysql:host=localhost;dbname=locautov2',
            'root', '');

            $update = "UPDATE client
            SET nom='".$_GET["nom_user_modif"] ."',
            prenom='".$_GET["prenom_user_modif"] ."',
            adresse='".$_GET["adresse_user_modif"] ."',
            adresse_mail='".$_GET["mail_user_modif"] ."',
            mot_de_pass=".$_GET["password_user_modif"] ."";

            $resultat = $connexion->exec($update);
            // l'insertion s'est bien passée => retourner l'info à l'user
            echo "Votre profil a été modifié";
        } 
        catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage() . "<br/>";
            die();
        }
        ?>
    </body>
</html>
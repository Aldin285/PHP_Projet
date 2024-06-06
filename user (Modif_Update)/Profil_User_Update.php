<!DOCTYPE html>
<html>
<head><title>Mise à jour profil</title></head>
    <body>
        <?php
        session_start();
        try {
            $connexion = new PDO('mysql:host=localhost;dbname=locautov2',
            'root', '');

            $update = "UPDATE client
            SET nom='".$_GET["nom_user_modif"] ."',
            prenom='".$_GET["prenom_user_modif"] ."',
            adresse='".$_GET["adresse_user_modif"] ."',
            adresse_mail='".$_GET["mail_user_modif"] ."',
            mot_de_pass='".$_GET["password_user_modif"] ."'
            WHERE id_client=".$_SESSION["id_client"];

            $resultat = $connexion->exec($update);
        } 
        catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage() . "<br/>";
            die();
        }
        ?>

    Votre profil est à jour<br/>
            <a href="Profil_User.php" > <input type="submit" value="OK"> </a>

    </body>
</html>
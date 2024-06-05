<!DOCTYPE html>
<html>
<head><title>Profil user_error</title></head>
    <body>
        <?php
        session_start();
        echo "Nom: ".$_SESSION['nom_client'];
        echo "<br/>Prenom: ".$_SESSION['prenom_client'];
        echo "<br/>Adresse mail: ".$_SESSION['mail'];
        echo "<br/>Adresse: ".$_SESSION['adresse_client'];
        ?>
        <br/>
        <a href="Profil_User_Modif.php" >
            <input type="submit" value="Modifier">
        </a>
    </body>
</html>
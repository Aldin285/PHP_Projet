<!DOCTYPE html>
<html>
<head><title>Profil user</title></head>
    <body>
        <?php
        
        session_start();
        echo "Nom: ".$_SESSION['nom_client'];
        echo "<br/>Prenom: ".$_SESSION['prenom_client'];
        echo "<br/>Adresse: ".$_SESSION['adresse_client'];
        echo "<br/>Adresse mail: ".$_SESSION['mail'];
        
        ?>
        <br/>
        <a href="Profil_User_Modif.php" >
            <input type="submit" value="Modifier">
        </a>
    </body>
</html>
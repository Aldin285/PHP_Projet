<?php
session_start();
?>
// connexion à un compte:
<!DOCTYPE html>
<html>
    <head><title>Connexion compte</title></head>
        <body>
            <form action="se_connecter2.php" method=get>
            <h2>CONNEXION</h2>
            <label for="mail"><b>Adresse mail:</b></label>
            <input type="text" name="mail" size="30" placeholder="Veuillez saisir votre adresse mail " required /><br/><br />

            <label for="password"><b>Mot de passe:</b></label>
            <input type="password" name="password" size="30" minlength='8'  placeholder="Veuillez saisir votre mot de passe " required /><br/><br />

            <p> Nouveau client? Enregistrez-vous <a href="ajout_client.php">ici</a> </p> 
            <p><input type="submit" value = "Se connecter" />
            <input type="reset" value="Annuler" /></p>
            </form>
        </body>
</html>
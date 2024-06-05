<!DOCTYPE html>
<html>
<head><title>Profil user_error</title></head>
    <body>
    <h2>modification profil client</h2>

    Nom :<input type="text" name="nom_user_modif" size="25" value= <?php session_start(); echo ''.$_SESSION['nom_client'].''?> ><br/>
    Prenom :<input type="text" name="prenom_user_modif" size="25" value= <?php  echo ''.$_SESSION['prenom_client'].''?> ><br/>
    Adresse_mail :<input type="text" name="mail_user_modif" size="30" value= <?php  echo ''.$_SESSION['mail'].''?> ><br/>
    Mot de passe :<input type="text" name="password_user_modif" size="30" minlength="8" value= <?php  echo ''.$_SESSION['password_client'].''?> ><br/>
        
    </body>
</html>
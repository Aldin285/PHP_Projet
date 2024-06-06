<!DOCTYPE html>
<html>
<head><title>Profil user Modification</title></head>
    <body>
    <form action="Profil_User_Update.php" method=get>
    <h2>modification profil client</h2>

    Nom :<input type="text" name="nom_user_modif" size="25" value= <?php session_start(); echo ''.$_SESSION['nom_client'].''?> ><br/><br/>
    Prenom :<input type="text" name="prenom_user_modif" size="25" value= <?php  echo ''.$_SESSION['prenom_client'].''?> ><br/><br/>
    Adresse :<input type="text" name="adresse_user_modif" size="35" value= <?php  echo ''.$_SESSION['adresse_client'].''?> ><br/><br/>
    Adresse_mail :<input type="text" name="mail_user_modif" size="30" value= <?php  echo ''.$_SESSION['mail'].''?> ><br/><br/>
    Mot de passe :<input type="text" name="password_user_modif" size="30" minlength="8" value= <?php  echo ''.$_SESSION['password_client'].''?> ><br/><br/>
    
    <input type="submit" value="Valider">
       
    <a href="Profil_User.php" >
    <input type="submit" value="Annuler">
    </a><br/><br/>
        
    </body>
</html>
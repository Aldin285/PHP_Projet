<!DOCTYPE html>
<html>
<head><title>Profil user</title></head>
    <body>
        <?php
        session_start();
        
        try {
            $connexion= new PDO('mysql:host=localhost;dbname=locautov2','root','',);
            $requete = 'SELECT nom,prenom,adresse,adresse_mail,mot_de_pass
                        FROM client
                        WHERE id_client='.$_SESSION["id_client"] ;
                        
            $resultat = $connexion->query($requete);
            $ligne= $resultat-> fetch();
            
            
            echo "Nom: ".$ligne["nom"]."<br/><br/>";
            echo "Prenom: ".$ligne["prenom"]."<br/><br/>";
            echo "Adresse: ".$ligne["adresse"]."<br/><br/>";
            echo "Adresse Mail: ".$ligne["adresse_mail"]."<br/><br/>";
            echo "Mot de passe: ".$ligne["mot_de_pass"]."<br/><br/>";
    
            } 
        catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage() . "<br/>";
            die();
        }
        ?>
        <br/>
        <a href="Profil_User_Modif.php" >
            <input type="submit" value="Modifier">
        </a>
    </body>
</html>
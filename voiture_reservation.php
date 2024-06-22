<!DOCTYPE html>
<html>
<head><title>Connexion</title></head>
    <body>
        <?php
        session_start();



        try {
            $connexion= new PDO('mysql:host=localhost;dbname=locautov2','root','',);
            $requete = 'INSERT INTO location
             (date_debut,date_fin,compteur_debut,compteur_fin,id_client,id_voiture)
            VALUES
            ("'.$_GET["debut_location"].'","'.$_GET["fin_location"].'","'.$_GET["compteur_debut"].'",
            "'.$_GET["compteur_fin"].'","'.$_SESSION["id_client"].'","'.$_GET["id_voiture"].'");
            UPDATE voiture
            SET reservation=1
            WHERE id_voiture='.$_GET['id_voiture'] ;
            
            
            
            $resultat = $connexion->query($requete);
            $ligne = $resultat->fetch();

           
        echo "Réservation éfféctuée<br/>";
        }
        catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage() . "<br/>";
            die();
    
        }
        ?>
        <a href="Voiture_test.php" > <input type="submit" value="OK"> </a>
    </body>
</html>
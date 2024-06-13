<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>location</title>
</head>
<body>
    <form action="" method="get">
    <?php

    session_start();
    $_SESSION["voiture_reserve"]= $_GET["voiture"];

    try {
        $connexion= new PDO('mysql:host=localhost;dbname=locautov2','root','',);
        $requete = 'SELECT image,m.libelle ,immatriculation,compteur, ma.libelle as nom_marque,c.libelle as nom_categorie,id_voiture
                    FROM voiture AS v
                    NATURAL JOIN modele m
                    JOIN categorie c ON m.id_categorie = c.id_categorie
                    JOIN marque ma ON m.id_marque = ma.id_marque
                    WHERE id_voiture='.$_GET["voiture"];

        $resultat = $connexion->query($requete);
        $ligne = $resultat->fetch();    
        echo "<img src='images/".$ligne["image"]."' >";
        echo "<h1>".$ligne["libelle"]."</h1>";
        echo "<p>Matricule: ".$ligne["immatriculation"]."</p>";
        echo "<p>Catégorie: ".$ligne["nom_categorie"]."</p>";
        echo "<p>Modele: ".$ligne["libelle"]."</p>";
        echo "<p>Compteur: ".$ligne["compteur"]." KM</p>";
        echo "<p>Marque: ".$ligne["nom_marque"]."</p>";

    }
    catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage() . "<br/>";
        die();

    }
    ?>

    <label for="date_min" > Date début: </label>
    <input type='date' id="date_min" name="debut_location"></input> 
    <br/><br/>
    <label for="date_max" > Date fin: </label>
    <input type='date'  id="date_max" name="fin_location"></input> 
    <br/><br/>
    <label for="compteur_debut" > Compteur debut (KM): </label>
    <input type="number" value="0" id="compteur_debut" name="compteur_debut">
    <br/><br/>
    <label for="compteur_fin" > Compteur fin (KM): </label>
    <input type="number" value="0" size="15" id="compteur_fin" name="compteur_fin">
    <br/><br/>
    <input type="submit" value="Réserver">   

    <!-- script pour avoir la date actuelle et éviter que le client réserve les jours précédents -->
    <script>
        const d = new Date();
        var day= d.getDate();
        var day_tommorow= d.getDate()+1;
        if (day<10){
            day="0"+day;
        }
        if (day_tommorow<10){
            day_tommorow="0"+day_tommorow;
        }
        var mois=d.getMonth()+1;
        if (mois<10){
            mois="0"+mois;
        }
        var annee=d.getFullYear();
        var today=annee+"-"+mois+"-"+day;
        var tommorow=annee+"-"+mois+"-"+day_tommorow;
        document.getElementById("date_min").min = today;
        document.getElementById("date_max").min = tommorow;
   
    </script>
    <!-- style pour ne pas afficher la flèhce dans input number -->
    <style>
    
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
    }
    </style>

    </form>
</body>
</html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="logo valo.png">
    <title>voiture_affichage  </title>
    <link  href="voiture_affichage.css" media="all" rel="stylesheet" type="text/css" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<style>

    /* html{
        background: url(valorant\ wallpaper.jpg) no-repeat center center fixed; 
  -webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
} */
</style>
<body> 
    <!-- <div class="text">
        <span1 class="item1">
            <img src="images/bmw-3.jpg" class="image-grid">
        </span1>
        <div class="item1-1">
            <h1> BMW</h1>
            <p1 class="p1">
                <p>klk</p>
                <p>fdf</p>
                <p>gfhgfh</p>
            </p1>
        </div>
    </div> -->


    <?php
        try {

            $connexion= new PDO('mysql:host=localhost;dbname=locautoV2','root','',);
            $requete = 'SELECT image,libelle
                        FROM modele';
                        
            $resultat = $connexion->query($requete);

            echo "<div class='text'>\n";
            while ($ligne = $resultat->fetch()) {
                echo "\t\t<span1 class='item1'\n\n>";    
                echo "\t\t\t<img src='images/".$ligne["image"]."' class='image-grid'>\n\n\n";
                echo "\t\t</span1>\n\n";

                echo "\t\t<div class='item1-1'>\n\n";
                echo "\t\t\t <h1>".$ligne["libelle"]."</h1>\n\n\n";
                echo "\t\t  </div> \n\n";
            }
            echo "\t</div> \n";

            } 
        catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage() . "<br/>";
            die();

        }
    ?> 


    
    

</body>
</html>
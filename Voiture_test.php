<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarGo</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <header class="header">

        <div id="menu-btn" class="fas fa-bars"></div>

        <a href="#" class="logo"> <span>Car</span>Go</a>

        <nav class="navbar">
            <a href="#home">Home</a>
            <a href="voiture_choix.php">Vehicule</a>
            <a href="#services">Services</a>
            <a href="#contact">Contact</a>
        </nav>

        <div id="Login-btn">
            <button class="btn">Profil</button>
            <i class="far fa-user"></i>
        </div>

    </header>

    <div class="login-form-container">

        <span class="fas fa-times" id="close-login-form"></span>

        <form action="">

            <h3>User login</h3>

            <input type="email" placeholder="email" class="box">
            <input type="password" placeholder="password" class="box">
            <p>Forget your password <a href="#"> click here</a></p>
            <input type="submit" value="Login now" class="btn">
            <p>or login with</p>

            <div class="buttons">
                <a href="#" class="btn">google</a>
                <a href="#" class="btn">facebook</a>
            </div>
            <p>Don't have an account? <a href="#">create one</a></p>
            

        </form>

    </div>

    <!--home section -->
 <!-- ne pas commenter cette section sinon on ne peut pas défiler la page -->
    <section class="home" id="home">
        <!-- <h1 class="home-parallax" data-speed="-2"> Find your car</h1>
        <img class="home-parallax" data-speed="5" src="images/home2.png" alt="">
        <a href="#" class="btn home-parallax" data-speed="7"> Explore cars</a> -->
    </section>

    <!--icons selectio-->
   
    <!--voiture selection-->

        <selection class="vehicules" id="vehicules">

            <h1 class="heading"> Popular <span> vehicules</span></h1>

            <div class="swiper vehicules-slider">

                <div class="swiper-wrapper">

                <form action="voiture_location.php" method="get">
    <?php
        
       
        //j'ai utilisé id_modele dans deux sites différent
        // l'identifiant avait des noms différents. Pour utiliser la meme variable,
        //j'ai utilisé isset() afin que la variable $modele prennne le bon GET
        //en se basant sur le nom utilsé. (le site renvoie une erreur si le GET renvoie à rien)
        if ( isset($_GET['modele']) ) {
          $modele=$_GET["modele"];
        }elseif(isset($_GET['id_modele'])){
          $modele=$_GET["id_modele"];  
        }

        
        try {
            $connexion= new PDO('mysql:host=localhost;dbname=locautoV2','root','',);

            //Affiche les voitures qui appartiennent à la categorie séléctioné
            if (isset($_GET["categorie"],$_GET["marque"]) && ( $_GET["categorie"]!=="" && $_GET["marque"]=="")){
                 $requete = 'SELECT image,m.libelle ,immatriculation,compteur, ma.libelle as nom_marque,c.libelle as nom_categorie,id_voiture
                        FROM voiture AS v
                        NATURAL JOIN modele m
                        JOIN categorie c ON m.id_categorie = c.id_categorie
                        JOIN marque ma ON m.id_marque = ma.id_marque
                        WHERE c.id_categorie="'.$_GET["categorie"].'"';
            }
            //Affiche les voitures qui appartiennent à la marque séléctionée
            elseif (isset($_GET["categorie"],$_GET["marque"]) &&($_GET["marque"]!=="" && $_GET["categorie"]=="")){
                $requete = 'SELECT image,m.libelle ,immatriculation,compteur, ma.libelle as nom_marque,c.libelle as nom_categorie,id_voiture
                        FROM voiture AS v
                        NATURAL JOIN modele m
                        JOIN categorie c ON m.id_categorie = c.id_categorie
                        JOIN marque ma ON m.id_marque = ma.id_marque
                        WHERE ma.id_marque='.$_GET["marque"];
            }
            //Affiche les voitures qui appartiennent à la marque et à la catégorie séléctionée
            elseif(isset($_GET["categorie"],$_GET["marque"]) && ($_GET["marque"]!=="" && $_GET["categorie"]!=="")){
                $requete = 'SELECT image,m.libelle ,immatriculation,compteur, ma.libelle as nom_marque,c.libelle as nom_categorie,id_voiture,prix
                        FROM voiture AS v
                        NATURAL JOIN modele m
                        JOIN categorie c ON m.id_categorie = c.id_categorie
                        JOIN marque ma ON m.id_marque = ma.id_marque
                        WHERE ma.id_marque='.$_GET["marque"].' AND c.id_categorie="'.$_GET["categorie"].'"';
            }
            //Affiche les voitures qui appartiennent au modele séléctioné
            elseif(isset($modele)){
                $requete = 'SELECT image,m.libelle ,immatriculation,compteur, ma.libelle as nom_marque,c.libelle as nom_categorie,id_voiture
                        FROM voiture AS v
                        NATURAL JOIN modele m
                        JOIN categorie c ON m.id_categorie = c.id_categorie
                        JOIN marque ma ON m.id_marque = ma.id_marque
                        WHERE id_modele='.$modele;
            }
            //Affiche toutes les voitures quand aucune option est séléctionée
            else{
                $requete = 'SELECT image,m.libelle ,immatriculation,compteur, ma.libelle as nom_marque,c.libelle as nom_categorie,id_voiture,prix
                        FROM voiture AS v
                        NATURAL JOIN modele m
                        JOIN categorie c ON m.id_categorie = c.id_categorie
                        JOIN marque ma ON m.id_marque = ma.id_marque
                        ORDER BY m.libelle';
                }
           
            //si aucunn résultat est retourné
            $resultat = $connexion->query($requete);
            $ligne = $resultat->fetch();
            
            //si on a des résultats
            // j'ai mis le if puis le while car il n'affichait pas le premier résultat avec le while
            // alors le if affiche le premier et le while affiche le reste
            echo "<div class='text'>\n";

            if (isset($ligne["immatriculation"])){
                echo "<div class='swiper-lider box'><br/>";    
                echo "<img src='images/".$ligne["image"]."' alt=''><br/>";
                echo "<div class='content'><br/>";

                echo " <h3>".$ligne["libelle"]."</h3><br/>";
                echo " <div class='price'> <span> Prix: </span> ".$ligne["prix"]."€/jour</div><br/>";
                echo "<p><br/>";
                echo "<span class='fas fa-circle'>Categorie: </span>".$ligne["nom_categorie"]."<br/> ";
                echo "<span class='fas fa-circle'>Marque: </span>".$ligne["nom_marque"]."<br/> ";
                echo "<span class='fas fa-circle'>Compteur:</span>".$ligne["compteur"]."KM<br/> ";
                echo " <button type='submit' value='".$ligne["id_voiture"]."' name='voiture' class='btn'>Voir l'offre</button> </a>";
                echo " </p><br/> ";
                echo "</div><br/>";
                echo "</div><br/>";
           }elseif (!isset($ligne["immatriculation"])){
            // si aucun résultat
            echo "Aucun résultat :(";
       }

            while ($ligne = $resultat->fetch()) {
                
              echo "<div class='swiper-lider box'><br/>";    
                echo "<img src='images/".$ligne["image"]."' alt=''><br/>";
                echo "<div class='content'><br/>";

                echo " <h3>".$ligne["libelle"]."</h3><br/>";
                echo " <div class='price'> <span> Prix: </span> ".$ligne["prix"]."€/jour</div><br/>";
                echo "<p><br/>";
                echo "<span class='fas fa-circle'>Categorie: </span>".$ligne["nom_categorie"]."<br/> ";
                echo "<span class='fas fa-circle'>Marque: </span>".$ligne["nom_marque"]."<br/> ";
                echo "<span class='fas fa-circle'>Compteur:</span>".$ligne["compteur"]."KM<br/> ";
                echo " <button type='submit' value='".$ligne["id_voiture"]."' name='voiture' class='btn'>Voir l'offre</button> </a>";
                echo " </p><br/> ";
                echo "</div><br/>";
                echo "</div><br/>";
            }

        
        } 
        catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage() . "<br/>";
            die();

        }
        
    ?> 

    </form>
                </div>

            </div>

            <div class="swiper-pagination"></div>

        </selection>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <script src="Js.js"></script>
</body>
</html>


// connexion à un compte:
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion compte</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="connection/style_connexion.css"

<body>


    <header class="header">

        <div id="menu-btn" class="fas fa-bars"></div>

        <a href="#" class="logo"> <span>Car</span>Go</a>

        <nav class="navbar">
            <a href="#home">Home</a>
            <a href="voiture_choix.php">Vehicule</a>
            <a href="#services">Modeles</a>
            <a href="#contact">Contact</a>
        </nav>

        <div id="Login-btn">

            <button class="btn">Profil</button>
            <i class="far fa-user"></i>
            
        </div>

    </header>
    
        <!-- connexion -->

    <div class="login-form-container">
        <form action='Voiture_test.php' >
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
           
        
        }
        catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage() . "<br/>";
            die();
        }
        ?>
        <h3>Réservation éfféctuée</h3>
        <a href="Voiture_test.php" > <input type="submit" value="OK" class='btn'> </a>
        </form>
    
    </div>

    <section class="home" id="home">
        <h1 class="home-parallax" data-speed="-2"> Find your car</h1>
        <img class="home-parallax" data-speed="5" src="connection/home2.png" alt="">
        <a href="#" class="btn home-parallax" data-speed="7"> Explore cars</a>



    </section>

    

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <script src="Js2.js"></script>

</body>

</html>
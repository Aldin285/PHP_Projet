

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
            <a href="#services">Services</a>
            <a href="#contact">Contact</a>
        </nav>

        <div id="Login-btn">

            <button class="btn">Profil</button>
            <i class="far fa-user"></i>
            
        </div>

    </header>
    
        <!-- connexion -->

    <div class="login-form-container">
        <form >
    <?php
        session_start();
        try {
            $connexion = new PDO('mysql:host=localhost;dbname=locautov2',
            'root', '');

            $update = "UPDATE client
            SET nom='".$_GET["nom_user_modif"] ."',
            prenom='".$_GET["prenom_user_modif"] ."',
            adresse='".$_GET["adresse_user_modif"] ."',
            adresse_mail='".$_GET["mail_user_modif"] ."',
            mot_de_pass='".$_GET["password_user_modif"] ."'
            WHERE id_client=".$_SESSION["id_client"];

            $resultat = $connexion->exec($update);
        } 
        catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage() . "<br/>";
            die();
        }
        ?>

     <h3> Votre profil est à jour </h3>
     
     <a href="Accueil.php" > <button type="button"  class="btn">OK</button> </a>
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
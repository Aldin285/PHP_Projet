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
            <a href="Accueil.php">Home</a>
            <a href="Voiture_test.php">Vehicule</a>
            <a href="choix_modele.php">Modeles</a>
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

            <h3>Profil Info</h3>
            <!-- code php pour afficher info user -->
            <?php
        session_start();
        
        try {
            $connexion= new PDO('mysql:host=localhost;dbname=locautov2','root','',);
            $requete = 'SELECT nom,prenom,adresse,adresse_mail,mot_de_pass
                        FROM client
                        WHERE id_client='.$_SESSION["id_client"] ;
                        
            $resultat = $connexion->query($requete);
            $ligne= $resultat-> fetch();
            
            
            echo "<h4>Nom: </h4>
             <p>".$ligne["nom"]." </p><br/><br/>";
             echo "<h4>Prenom: </h4>
             <p>".$ligne["prenom"]." </p><br/><br/>";
             echo "<h4>Adresse: </h4>
             <p>".$ligne["adresse"]." </p><br/><br/>";
             echo "<h4>Adresse Mail: </h4>
             <p>".$ligne["adresse_mail"]." </p><br/><br/>";
            } 
        catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage() . "<br/>";
            die();
        }
        ?>
           
            <div class="buttons">
                <a href="Modif_user.php" class="btn">Modifier</a>
                <a href="user (Modif_Update)/logout.php" class="btn">Se Déconnecter</a>
            </div>
        </form>

    </div>

    <!--home section -->

    <section class="home" id="home">
        <h1 class="home-parallax" data-speed="-2"> Find your car</h1>
        <img class="home-parallax" data-speed="5" src="images/home2.png" alt="">
        <a href="Voiture_test.php" class="btn home-parallax" data-speed="7"> Explore cars</a>



    </section>

    <script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

    <script src="Js.js"></script>
</body>
</html>
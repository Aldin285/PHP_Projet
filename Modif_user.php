<?php
session_start();
?>

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
            <form action="Update_user.php" method=get>

            <h3>Modifier</h3>
            <h4>Nom: </h4>
            <input type="text" name="nom_user_modif" size="25"  class="box" required value= <?php echo ''.$_SESSION['nom_client'].''?> ><br/><br/>

            <h4>Prenom: </h4>
            <input type="text" name="prenom_user_modif" size="25"  class="box" required value= <?php  echo ''.$_SESSION['prenom_client'].''?> ><br/><br/>

            <h4>Adresse: </h4>
            <input type="text" name="adresse_user_modif" size="35"  class="box" required value= <?php  echo ''.$_SESSION['adresse_client'].''?> ><br/><br/>

            <h4>Adresse Mail: </h4>
            <input type="text" name="mail_user_modif" size="30"  class="box" required value= <?php  echo ''.$_SESSION['mail'].''?> ><br/><br/>

            <h4>Nouveau Mot de Passe: </h4>
            <input type="text" name="password_user_modif" size="30" minlength="8" class="box" required >
            

            <input type="submit" value="Valider" class="btn">
            <a href="Accueil.php" >
              <button type="button" class="btn"> Annuler</button>
            </a><br/><br/>
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
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
    <link rel="stylesheet" href="style_connexion.css">
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
    
        <!-- connexion -->

    <div class="login-form-container">




        <form method="POST" action="">

            <form action="se_connecter2.php" method=get>

                <h3>User login</h3>

                <input type="email" name="email" placeholder="email" class="box">
                <input type="password" name="password" size="30" minlength='8' placeholder="password" class="box" required>

                <p>Forget your password <a href="#"> click here</a></p>
                <input type="submit" value="Login now" class="btn">
                <p>or login with</p>

                <div class="buttons">

                    <a href="#" class="btn">google</a>
                    <a href="#" class="btn">facebook</a>

                </div>

                <p>Don't have an account? <a href="#">create one</a></p>

            </form>

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
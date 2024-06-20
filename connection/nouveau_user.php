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
            <form action="s'enregistré.php" method=get>

            <h3>Nouveau Utilisateur</h3>
            <label for="nom"><b>Nom:</b></label>
            <input type="text" name="nom" size="25" placeholder="Veuillez saisir votre nom" class="box" required /><br/><br/>

            <label for="prenom"><b>Prenom :</b></label>
            <input type="text" name="prenom" size="25" placeholder="Veuillez saisir votre prénom " class="box" required /><br/><br />

            <label for="adresse"><b>Adresse</b></label>
            <input type="text" name="adresse" size="35" placeholder="Veuillez saisir votre adresse" class="box" required /><br/><br />

            <label for="mail"><b>Adresse mail:</b></label>
            <input type="text" name="mail" size="30" placeholder="Veuillez saisir votre adresse mail " class="box" required /><br/><br />

            <label for="password"><b>Mot de passe:</b></label>
            <input type="password" name="password" size="30" minlength='8'  placeholder="Veuillez saisir votre mot de passe " class="box" required /><br/><br />

            <label for="type_client"><b>Type de client:</b></label>
            <br /><br />
            <select name="type_client" size="1" >
            <?php
            try {
                $connexion = new PDO('mysql:host=localhost;dbname=locautov2',
                'root', '');
                $requete = 'SELECT * FROM type_de_client';
                $resultat = $connexion->query($requete);
                while ($ligne = $resultat->fetch()) {
                    echo "\t\t<option value ='" . $ligne["id_type_de_client"] . "'>"
                    . $ligne["libelle"] . "</option>\n";
                }
                } 
                catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage() . "<br/>";
                die();
            }
            ?>
            </select>

            <input type="submit" value="Créer le compte" class="btn">

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

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nouveau User</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css"/>
    <link rel="stylesheet" href="style_connexion.css">

</head>
    <body>
    <!-- header -->
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


    <!-- code PHP pour ajouter le client dans la base de données -->
        <?php
        // variables passées par le formulaire
        $prenom = $_GET["prenom"];
        $nom = $_GET["nom"];
        $adresse = $_GET["adresse"];
        $mail = $_GET["mail"];
        $password = $_GET["password"];
        $type_client = $_GET["type_client"];
        try {
            $connexion = new PDO('mysql:host=localhost;dbname=locautov2',
            'root', '');
            $requete = 'INSERT INTO client
            (nom,prenom,adresse,adresse_mail,mot_de_pass,id_type_de_client)
            VALUES
            ("'.$nom.'", "'.$prenom.'", "'.$adresse
            .'", "'.$mail.'", "'.$password.'",'.$type_client.')';
            $resultat = $connexion->query($requete);
            $ligne = $resultat->fetch();

        ?>

<!-- l'insertion s'est bien passée => retourner l'info au user -->
    <div class="login-form-container"> 
        <form action="se_connecter.php">
        <h3>Vous avez été ajouté avec succés ! </h3>
        <br/><a href='se_connecter.php' > <input type='submit' value='OK' class="btn"> </a>
        </form>
    </div>

    <!-- suite code PHP -->
        <?php
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage() . "<br/>";
            die();
        }
        ?>
    </body>
</html>
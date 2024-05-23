/ chemin du site : http://localhost/pages/SiteVoiture/Accueil.php /


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CarGo</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">

    <?php
        // Exécuter une action spécifique lorsque le formulaire de connexion est soumis
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];

            // Vous pouvez ajouter ici votre logique d'authentification
            // Exemple : vérifier l'email et le mot de passe dans la base de données

            echo "Email: $email<br>";
            echo "Password: $password<br>";
        }
    ?>
</head>
<body>

    <header class="header">

        <div id="menu-btn" class="fas fa-bars"></div>

        <a href="#" class="logo"> <span>Car</span>Go</a>

        <nav class="navbar">
            <a href="#home">Home</a>
            <a href="#vehicule">Vehicule</a>
            <a href="#services">Services</a>
            <a href="#contact">Contact</a>
        </nav>

        <div id="Login-btn">
            <button class="btn">Login</button>
            <i class="far fa-user"></i>
        </div>

    </header>

    <div class="login-form-container">

        <span class="fas fa-times" id="close-login-form"></span>

        <form method="POST" action="">

            <h3>User login</h3>

            <input type="email" name="email" placeholder="email" class="box">
            <input type="password" name="password" placeholder="password" class="box">
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

<script src="Js.js"></script>
</body>
</html>

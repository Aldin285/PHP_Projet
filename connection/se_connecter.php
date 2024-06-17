<?php
session_start();
?>
// connexion à un compte:
<!DOCTYPE html>
<html>
    <head>
        <title>Connexion compte</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
        <link rel="stylesheet" href="style.css">
    </head>

        <body>


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

            </div>
        </body>
</html>
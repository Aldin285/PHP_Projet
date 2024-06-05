<!DOCTYPE html>
<html>
<head><title>Connexion</title></head>
    <body>
        <?php
        session_start();

        // variables passées par le formulaire
        $mail = $_GET["mail"];
        $password = $_GET["password"];
        

        $DATABASE_HOST = 'localhost';
        $DATABASE_USER = 'root';
        $DATABASE_PASS = '';
        $DATABASE_NAME = 'locautov2';

        // Try and connect using the info above.
        $con = mysqli_connect($DATABASE_HOST, $DATABASE_USER, $DATABASE_PASS, $DATABASE_NAME);
        if ( mysqli_connect_errno() ) {

        // If there is an error with the connection, stop the script and display the error.
            exit('Failed to connect to MySQL: ' . mysqli_connect_error());
        }

        // Now we check if the data from the login form was submitted, isset() will check if the data exists.
        if ( !isset($_GET['mail'], $_GET['password']) ) {
            // Could not get the data that should have been sent.
            exit('Please fill both the username and password fields!');
        }
        // Prepare our SQL, preparing the SQL statement will prevent SQL injection.
        if ($stmt = $con->prepare('SELECT id_client, mot_de_pass,nom, prenom FROM client WHERE adresse_mail= ?')) {

            // Bind parameters (s = string, i = int, b = blob, etc), in our case the username is a string so we use "s"
            $stmt->bind_param('s', $_GET['mail']);
            $stmt->execute();

            // Store the result so we can check if the account exists in the database.
            $stmt->store_result();
            // $stmt->bind_result sert à sauvegarder les attributs selectioner dans le SELECT afin de pouvoir 
            //les utiliser apres en tant que variable avec les valeurs qui leurs sont atriuées dans le code SQL
            //Pour utiliser les attributs, il faut les écrire  
            if ($stmt->num_rows > 0) {
                $stmt->bind_result($id_client, $mot_de_pass,$nom,$prenom);
                $stmt->fetch();
                // Account exists, now we verify the password.
                // Note: remember to use password_hash in your registration file to store the hashed passwords.
                if (password_verify($_GET["password"], password_hash($mot_de_pass,PASSWORD_DEFAULT))) {
                    // Verification success! User has logged-in!
                    // Create sessions, so we know the user is logged in, they basically act like cookies but remember the data on the server.
                    session_regenerate_id();
                    $_SESSION['loggedin'] = TRUE;
                    $_SESSION['mail'] = $mail;
                    $_SESSION['id_client'] = $id_client;
                    $_SESSION['nom_client'] = $nom;
                    $_SESSION['prenom_client'] = $prenom;
                    $_SESSION['password_client']=$mot_de_pass;

                    //test:
                    // echo 'Welcome back, ' .$nom.' '.$prenom.'!';

                    header('Location: Accueil.html');
                } else {
                    // Incorrect password
                    echo 'Incorrect  password!';
                }
            } else {
                // Incorrect mail
                echo 'Incorrect mail!';
            }

            //Logout script
            
            // <?php
            // session_start();
            // session_destroy();
            // // Redirect to the login page:
            // header('Location: index.html');
            //?/>
            



            $stmt->close();
        }
        

        
        
        ?>
    </body>
</html>
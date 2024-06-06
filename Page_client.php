<!DOCTYPE html>
<html>
<head><title>Page Client</title></head>
<body>
<form action=# method=get>
<?php
try {

        $connexion= new PDO('mysql:host=localhost;dbname=locautov2','root','',);
        $requete = 'SELECT nom,prenom,adresse,adresse_mail,libelle
                    FROM client NATURAL JOIN type_de_client' ;
                
    $resultat = $connexion->query($requete);
    echo "<h1>Info client</h1>";
    echo "<table>\n";
    echo "<tr><th>Nom</th>
            <th>Prenom</th>
            <th>Adresse</th>
            <th>Adresse Mail</th>
            <th>Type Client</th>
         </tr>";
    while ($ligne = $resultat->fetch()) {
            echo "\t<tr>\n";
            echo "\t\t<td>" . $ligne["nom"] ."\n";
            echo "\t\t<td>" . $ligne["prenom"] . "</td>\n";
            echo "\t\t<td>" . $ligne["adresse"] . "</td>\n";
            echo "\t\t<td>" . $ligne["adresse_mail"] . "</td>\n";
            echo "\t\t<td>" . $ligne["libelle"] . "</td>\n";
            echo "\t</tr>\n";
    }
    echo "</table>";
    } 
catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage() . "<br/>";
    die();

}
?>
</body>
</html>

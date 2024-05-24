<!DOCTYPE html>
<html>
<head><title>essaie 1</title></head>
<body>

<h1>fhouhfhfhs</h1>
<?php
try {

    

    $connexion= new PDO('mysql:host=localhost;dbname=locautoV2','root','',);
    $requete = 'SELECT nom,prenom,libelle
                FROM client  natural join type_de_client';
                
    $resultat = $connexion->query($requete);
    echo "<table>\n";
    echo "<tr><th>Nom client  </th>
            <th>prénom</th>
            <th>type</th>
         </tr>";
    while ($ligne = $resultat->fetch()) {
            echo "\t<tr>\n";
            echo "\t\t<td>". $ligne["nom"] ."</a></td>\n";
            echo "\t\t<td>" . $ligne["prenom"] . "</td>\n";
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

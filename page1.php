<!DOCTYPE html>
<html>
<head><title>Premier script php</title></head>
<body>
<?php
try {

    $service=$_POST["service"];

    echo" <h1>Liste de tous les employés du département:";
    switch($service)
    {
        case 10: echo " recherche </h1> <br/>";
        break;
        case 20: echo " vente</h1> <br/>";
        break;
        case 30: echo " direction</h1> <br/>";
        break;
        case 40: echo " fabrication</h1> <br/>";
        break;


    };

    $connexion= new PDO('mysql:host=localhost;dbname=departement','root','',);
    $requete = 'SELECT e.nom as "employesNom",num,fonction,d.nom,lieu
                FROM employes as e  join departements as d on
                (d.dept=e.dept)
                where d.dept='.$service;
    $resultat = $connexion->query($requete);
    echo "<table>\n";
    echo "<tr><th>Nom de l'employe</th>
            <th>Numero</th>
            <th>Fonction</th>
            <th>Nom du departement</th>
            <th>Lieu</th>
         </tr>";
    while ($ligne = $resultat->fetch()) {
            echo "\t<tr>\n";
            echo "\t\t<td>" . $ligne["employesNom"] . "</td>\n";
            echo "\t\t<td>" . $ligne["num"] . "</td>\n";
            echo "\t\t<td>" . $ligne["fonction"] . "</td>\n";
            echo "\t\t<td>" . $ligne["nom"] . "</td>\n";
            echo "\t\t<td>" . $ligne["lieu"] . "</td>\n";
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

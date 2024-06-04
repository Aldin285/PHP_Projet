<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="shortcut icon" href="logo valo.png">
    <title>voiture_affichage  </title>
    <link  href="voiture_affichage.css" media="all" rel="stylesheet" type="text/css" >
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body> 
    <?php

        //j'ai utilisé id_modele dans deux sites différent
        // l'identifiant avait des noms différents. Pour utiliser la meme variable,
        //j'ai utilisé isset() afin que la variable $modele prend le bon GET
        //en se basant sur le nom utilsé. (le site renvoie une erreur si le GET renvoie à rien)
        if ( isset($_GET['modele']) ) {
          $modele=$_GET["modele"];
        }elseif(isset($_GET['id_modele'])){
          $modele=$_GET["id_modele"];  
        }

        
        try {
            $connexion= new PDO('mysql:host=localhost;dbname=locautoV2','root','',);

            //Affiche les voitures qui appartiennent à la categorie séléctioné
            if (isset($_GET["categorie"],$_GET["marque"]) && ( $_GET["categorie"]!=="" && $_GET["marque"]=="")){
                 $requete = 'SELECT image,m.libelle ,immatriculation,compteur, ma.libelle as nom_marque,c.libelle as nom_categorie
                        FROM voiture AS v
                        NATURAL JOIN modele m
                        JOIN categorie c ON m.id_categorie = c.id_categorie
                        JOIN marque ma ON m.id_marque = ma.id_marque
                        WHERE c.id_categorie="'.$_GET["categorie"].'"';
            }
            //Affiche les voitures qui appartiennent à la marque séléctionée
            elseif (isset($_GET["categorie"],$_GET["marque"]) &&($_GET["marque"]!=="" && $_GET["categorie"]=="")){
                $requete = 'SELECT image,m.libelle ,immatriculation,compteur, ma.libelle as nom_marque,c.libelle as nom_categorie
                        FROM voiture AS v
                        NATURAL JOIN modele m
                        JOIN categorie c ON m.id_categorie = c.id_categorie
                        JOIN marque ma ON m.id_marque = ma.id_marque
                        WHERE ma.id_marque='.$_GET["marque"];
            }
            //Affiche les voitures qui appartiennent à la marque et à la catégorie séléctionée
            elseif(isset($_GET["categorie"],$_GET["marque"]) && ($_GET["marque"]!=="" && $_GET["categorie"]!=="")){
                $requete = 'SELECT image,m.libelle ,immatriculation,compteur, ma.libelle as nom_marque,c.libelle as nom_categorie
                        FROM voiture AS v
                        NATURAL JOIN modele m
                        JOIN categorie c ON m.id_categorie = c.id_categorie
                        JOIN marque ma ON m.id_marque = ma.id_marque
                        WHERE ma.id_marque='.$_GET["marque"].' AND c.id_categorie="'.$_GET["categorie"].'"';
            }
            //Affiche les voitures qui appartiennent au modele séléctioné
            elseif(isset($modele)){
                $requete = 'SELECT image,m.libelle ,immatriculation,compteur, ma.libelle as nom_marque,c.libelle as nom_categorie
                        FROM voiture AS v
                        NATURAL JOIN modele m
                        JOIN categorie c ON m.id_categorie = c.id_categorie
                        JOIN marque ma ON m.id_marque = ma.id_marque
                        WHERE id_modele='.$modele;
            }
            //Affiche toutes les voitures quand aucune option est séléctionée
            else{
                    $requete = 'SELECT image,m.libelle ,immatriculation,compteur, ma.libelle as nom_marque,c.libelle as nom_categorie
                            FROM voiture AS v
                            NATURAL JOIN modele m
                            JOIN categorie c ON m.id_categorie = c.id_categorie
                            JOIN marque ma ON m.id_marque = ma.id_marque
                            ORDER BY m.libelle';
                }
           
            //si aucunn résultat est retourné
            $resultat = $connexion->query($requete);
            $ligne = $resultat->fetch();
            
            //si on a des résultats
            echo "<div class='text'>\n";

            if (isset($ligne["immatriculation"])){
                echo "\t\t<span1 class='item1'\n\n>";    
                echo "\t\t\t<img src='images/".$ligne["image"]."' class='image-grid'>\n\n\n";
                echo "\t\t</span1>\n\n";

                echo "\t\t<div class='item1-1'>\n\n";
                echo "\t\t\t <h1>".$ligne["libelle"]."</h1>\n\n\n";
                echo "\t\t\t <p1>Matricule: ".$ligne["immatriculation"]."</p1>";
                echo "\t\t\t <p1>Catégorie: ".$ligne["nom_categorie"]."</p1>";
                echo "\t\t\t <p1>Modele: ".$ligne["libelle"]."</p1>";
                echo "\t\t\t <p1>Compteur: ".$ligne["compteur"]." KM</p1>";
                echo "\t\t\t <p1>Marque: ".$ligne["nom_marque"]."</p1>";
                echo "\t\t  </div> \n\n";
           }

            while ($ligne = $resultat->fetch()) {
                
                echo "\t\t<span1 class='item1'\n\n>";    
                echo "\t\t\t<img src='images/".$ligne["image"]."' class='image-grid'>\n\n\n";
                echo "\t\t</span1>\n\n";

                echo "\t\t<div class='item1-1'>\n\n";
                echo "\t\t\t <h1>".$ligne["libelle"]."</h1>\n\n\n";
                echo "\t\t\t <p1>Matricule: ".$ligne["immatriculation"]."</p1>";
                echo "\t\t\t <p1>Catégorie: ".$ligne["nom_categorie"]."</p1>";
                echo "\t\t\t <p1>Modele: ".$ligne["libelle"]."</p1>";
                echo "\t\t\t <p1>Compteur: ".$ligne["compteur"]." KM</p1>";
                echo "\t\t\t <p1>Marque: ".$ligne["nom_marque"]."</p1>";
                echo "\t\t  </div> \n\n";
            }
            
           if (!isset($ligne)){
                 echo "Aucun résultat :(";
            }

            

            echo "\t</div> \n";

            } 
        catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage() . "<br/>";
            die();

        }
        
    ?> 


    
    

</body>
</html>
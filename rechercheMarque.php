<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
* {
  box-sizing: border-box;
}

#myInput {
  background-image: url('images/bmw-3.jpg');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}

#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: blue;
  display: block
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
}
</style>
</head>
<body>
    <?php 

    echo "<h2>My Phonebook</h2>";
    echo "<input type='text' id='myInput' onkeyup='myFunction()' placeholder='recherche marque...' title='Type in a name'>";

    $connexion= new PDO('mysql:host=localhost;dbname=locautoV2','root','',);
    $requete = 'SELECT libelle
                FROM marque';
                
    $resultat = $connexion->query($requete);

    echo "<ul id='myUL'>";
    while ($ligne = $resultat->fetch()){
        echo "<li><a href='#'>".$ligne["libelle"]."</a></li>";
    }
    echo "</ul>"
?>


<script>
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>

</body>
</html>

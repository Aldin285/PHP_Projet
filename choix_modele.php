<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');

* {
  box-sizing: border-box;
  font-family: "Poppins", sans-serif;
}

#myInput {
  background-image: url('/css/searchicon.png'); /* Add a search icon to input */
  background-position: 10px 12px; /* Position the search icon */
  background-repeat: no-repeat; /* Do not repeat the icon image */
  width: 100%; /* Full-width */
  font-size: 16px; /* Increase font-size */
  padding: 12px 20px 12px 40px; /* Add some padding */
  border: 1px solid #ddd; /* Add a grey border */
  margin-bottom: 12px; /* Add some space below the input */
}

#myTable {
  border-collapse: collapse; /* Collapse borders */
  width: 100%; /* Full-width */
  border: 1px solid #ddd; /* Add a grey border */
  font-size: 18px; /* Increase font-size */
}

#myTable th, #myTable td {
  text-align: left; /* Left-align text */
  padding: 12px; /* Add padding */
}

#myTable tr {
  /* Add a bottom border to all table rows */
  border-bottom: 1px solid #ddd;
}

a{
  text-decoration: none;
  color: black;
}

#myTable tr.header, #myTable tr:hover {
  /* Add a grey background color to the table header and on hover */
  background-color: #f9d806;
}
</style>
<title>Choix Modele</title>
</head>
<body>

    <input type='text' id='myInput' onkeyup='myFunction()' placeholder='Rechereche modele' title='Marque'>

    <table id="myTable" >

  <tr class="header">
    <th style="width:33%;">Modele</th>
    <th style="width:33%;">Marque</th>
    <th style="width:33%;">Categorie</th>
  </tr>
    <?php 
    $connexion= new PDO('mysql:host=localhost;dbname=locautoV2','root','',);
    $requete = 'SELECT m.libelle,c.libelle as nom_categorie, ma.libelle as nom_marque,id_modele
                FROM modele m
                JOIN categorie c ON m.id_categorie = c.id_categorie
                JOIN marque ma ON m.id_marque = ma.id_marque
                ';
                
    $resultat = $connexion->query($requete);

    
    while ($ligne = $resultat->fetch()){
    echo "<tr>";  
        echo "<td><a href='Voiture_test.php?id_modele=".$ligne["id_modele"]."'>".$ligne["libelle"]."</a></td>";
        echo "<td>".$ligne["nom_categorie"]."</td>";
        echo "<td>".$ligne["nom_marque"]."</td>";
       echo "</tr>"; 
    }
    

?>
</table>


<script>

function myFunction() {
  // Declare variables
  var input, filter, table, tr, td, i, txtValue;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");

  // Loop through all table rows, and hide those who don't match the search query
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      txtValue = td.textContent || td.innerText;
      if (txtValue.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>

</body>
</html>

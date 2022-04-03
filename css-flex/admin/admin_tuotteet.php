<?php

include("./admin_requirelogin.php"); //Tämä tarkistaa että session on olemassa ja validi.

//Tämä sivu listaa tuotteet ja linkit niiden muokkaamisee, poistamiseen ja lisäämiseen.

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./admin.css">
    <title>Kukkakauppa</title>
</head>
<body>

<?php
        error_reporting(E_ALL);
        ini_set("display_errors",1);


        //Tarkis
        if ($_SESSION["login"] == "OK"){
            


            include('../asetukset.php');
            //TUOTTEIDEN TULOSTUS

            echo "<h1> Kukkakaupan hallintasivu</h1>";
            echo "<a href='./admin_logout.php' ><button> Kirjaudu ulos </button></a>"; 
            echo "<a href='./admin_lataakuva.php' ><button> Lataa kuva </button></a>";
            echo "<a href='./admin_lisaatuote.php' ><button> Lisää Tuote </button></a>";
            echo "<a href='../tuotteet.php' ><button> Siirry kauppaan</button></a>";
            $sql = "SELECT * FROM tuote";

            $stmt = $pdo->prepare($sql);
            $stmt->execute();
    
            $rivit = $stmt -> fetchAll();
    
            echo '
            <div class="product-table-div" >
            <table class="product-table" >
            <tr>
                <th>tuoteID</th>
                <th>nimi</th>
                <th>kuva</th>
                <th>hinta</th>
                <th>kuvaus</th>
                <th>tyyppi</th>
                <th>linkit </th>
            <tr>
            ';
    
            foreach( $rivit as $rivi ) {
                echo '<tr>';
                    echo '<td>'.$rivi['tuoteID'].'</td>';
                    echo '<td>' . $rivi['nimi'] . '</td>';
                    if (is_null($rivi["kuva"])){
                        echo '<td class="img-product-td" ><img class="img-product" src="../morsius.jpg" alt="kukkia"> </td>';
                    }
                    else {
                        echo '<td class="img-product-td" ><img class="img-product" src="../images/'.$rivi['kuva'].'" alt="'.$rivi['kuva'].'"> </td>';
                    }
                    echo '<td>' . $rivi['hinta'] . ' € </td>';
                    echo '<td>' . $rivi['kuvaus'] . '</td>';
                    echo '<td>' . $rivi['tyyppi'] . '</td>';
                    echo '<td> <a href="./admin_poistatuote.php?tuoteID='.$rivi['tuoteID'].'">Poista</a><br>
                          <a href="./admin_edittuote.php?tuoteID='.$rivi['tuoteID'].'">Muokkaa</a>
                    </td>';
                echo '<tr>';
            }
            
            echo '</table>
            </div>
            '; 
    
            // Suljetaan yhteys asettamalla pdo-objekti tyhjäksi
            $pdo->connection = null;

        }
        else {
            echo "<p>Session token not found </p>";
            //header("Location:./index.php");
        }

    ?>


</body>
</html>
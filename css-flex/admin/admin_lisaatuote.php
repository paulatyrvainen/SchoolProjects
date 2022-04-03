<?php
include("./admin_requirelogin.php");
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
   <h1> LISÄÄ TUOTE </h1>
   <a href="./admin_tuotteet.php" > Palaa takaisin </a> 
    
   <?php
    include('../asetukset.php');

    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        $sql = "INSERT into tuote (nimi,tyyppi,kuvaus,kuva,hinta) VALUES (?,?,?,?,?)";
        $stmt = $pdo->prepare($sql);

        $nimi = $_POST['nimi'];
        $tyyppi = $_POST['tyyppi'];
        $kuvaus = $_POST['kuvaus'];
        $kuva = $_POST['kuva'];        
        $hinta  = $_POST['hinta'];


        $stmt->execute([$nimi, $tyyppi, $kuvaus, $kuva, $hinta]);
        // Tulostetaan moneen riviin tehtiin muutoksia
        $updated = $stmt->rowCount();
        echo "Tietokantaan lisättyjä tietoja: " . $updated;

        $pdo->connection = null;

        echo "Tiedot tallennettu onnistuneesti ".$tuoteID;

        echo("<script>location.href = './admin_tuotteet.php';</script>");
        
    }
    else{

        echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'"enctype="multipart/form-data">';
        echo '<p>Tuotenimi: <input type="text" id="tuote_nimi" name="nimi" ></p>';
        echo '<p>Tyyppi: <select id="tuote_tyyppi" name="tyyppi" >';
        echo '<option value="Häät" >Häät </option>';
        echo '<option value="Hautajaiset" >Hautajaiset </option>';
        echo '<option value="Korkeat kimput" >Korkeat kimput </option>';
        echo '<option value="Matalat kimput" >Matalat kimput </option>';
        echo '<option value="Viherkasvit" > Viherkasvit </option>';
        echo '</select>';
        //echo '<p>Tyyppi: <input type="text" id="tuote_tyyppi" name="tyyppi" ></p>';
        echo '<p>Kuvaus: <textarea type="text" id="tuote_kuvaus" name="kuvaus"></textarea></p>';
        echo '<p>Hinta: <input type="number" min=0.0 step=0.01 id="tuote_hinta" name="hinta" ></p>';
        echo '<p>Kuva:';
        $files = scandir("../images/");
        
        foreach( $files as $img ) { //loopataan kuvat kansio ja listataan mahdolliset kuvat
            if ( $img == ".") { //poistetaan . polku
                continue;
            }
            if ( $img == "..") {  //poistetaan . polku
                continue;
            }
            echo '<input type="radio" value="'.$img.'" ID="'.$img.'" name="kuva"><label for="'.$img.'"><img height=50 width=50 src="../images/'.$img.'"</label>
            ';          
        }       
        echo '<p><input type="hidden" id="tuote_tuoteID" name="tuoteID" ></p>';
        echo '<br><p><input type="submit"></p>';
        echo '</form>';
    }

    ?>
</body>
</html>
<?php
include("./admin_requirelogin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./niklas-admin.css">
    <title>Kukkakauppa</title>
</head>
<body>
   <h1> Muokkaa tuotetta </h1>
   <a href="./admin_tuotteet.php" > Palaa takaisin </a> 


   <?php
    include('../asetukset.php');


    if ($_SERVER["REQUEST_METHOD"] == "POST") { 
        $sql = "UPDATE tuote SET nimi = ?, tyyppi = ?, kuvaus = ?, kuva = ?, hinta = ? WHERE tuoteID = ?";
        $stmt = $pdo->prepare($sql);

        $nimi = $_POST['nimi'];
        $tyyppi = $_POST['tyyppi'];
        $kuvaus = $_POST['kuvaus'];
        $hinta  = $_POST['hinta'];
        $kuva = $_POST['kuva']; 
        $tuoteID= $_POST['tuoteID'];

        //Sanitointi

        $nimi = filter_var($nimi, FILTER_SANITIZE_STRING);
        $tyyppi = filter_var($tyyppi, FILTER_SANITIZE_STRING);
        $kuvaus = filter_var($kuvaus, FILTER_SANITIZE_STRING);
        $kuva = filter_var($kuva, FILTER_SANITIZE_STRING);
        $hinta = filter_var($hinta, FILTER_SANITIZE_STRING);
        $hinta = filter_var($hinta, FILTER_SANITIZE_NUMBER_INT);

        //Validointi

        $errors="";
        if (!is_numeric($hinta))
        {
            $errors.="<p>Hinta ei ole numeerinen</p>";
        }

        // validointeja kaikille muuttujille

        if ($errors=="")
        {
        $stmt->execute([$nimi, $tyyppi, $kuvaus, $kuva, $hinta, $tuoteID]);
        // Tulostetaan moneen riviin tehtiin muutoksia
        $updated = $stmt->rowCount();
        echo "Muokattuja tietoja: " . $updated;

        $pdo->connection = null;

        echo "Tiedot tallennettu onnistuneesti ".$tuoteID;
    }
    }
    elseif (false == (empty($_GET['tuoteID']))){

        $tuoteID = $_GET['tuoteID'];

        
        $stmt = $pdo->prepare("SELECT * FROM tuote WHERE tuoteID = ?");
        $stmt->bindParam(1, $tuoteID,PDO::PARAM_INT);
        $stmt->execute();
        $rivit = $stmt -> fetchAll();

        echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'">';
        
        echo '<p>Tuotenimi: <input type="text" id="tuote_nimi" name="nimi" value="'.$rivit[0]["nimi"].'"></p>
        ';
        echo '<p>Tyyppi: <select name="tyyppi" id="tuote_tyyppi">';
        echo '<option value="Häät" '; if ($rivit[0]["tyyppi"] == "Häät") echo "selected" ; echo ' >Häät </option>';
        
        echo '<option value="Hautajaiset" '; if ($rivit[0]["tyyppi"] == "Hautajaiset") echo "selected" ; echo ' >Hautajaiset </option>';
        echo '<option value="Korkeat kimput" '; if ($rivit[0]["tyyppi"] == "Korkeat kimput") echo "selected" ; echo ' >Korkeat kimput </option>';
        echo '<option value="Matalat kimput" '; if ($rivit[0]["tyyppi"] == "Matalat kimput") echo "selected" ; echo ' >Matalat kimput </option>';
        echo '<option value="Viherkasvit" '; if ($rivit[0]["tyyppi"] == "Viherkasvit") echo "selected" ; echo '> Viherkasvit </option>';
        echo '</select>';

        //echo '<p>Tyyppi: <input type="text" id="tuote_tyyppi" name="tyyppi" value="'.$rivit[0]["tyyppi"].'"></p>
        //';
        echo '<p>Kuvaus: <textarea type="text" id="tuote_kuvaus" name="kuvaus">'.$rivit[0]["kuvaus"].'</textarea></p>
        ';
        echo '<p>Kuva:';

        $files = scandir("../images/");
        
        foreach( $files as $img ) { //loopataan kuvat kansio ja listataan mahdolliset kuvat
            if ( $img == ".") { //poistetaan . polku
                continue;
            }
            if ( $img == "..") {  //poistetaan . polku
                continue;
            }
            if ($img == $rivit[0]["kuva"]){ // jos kuva on valittu merkataan se valtuksi
                echo '<input type="radio" value="'.$img.'" ID="'.$img.'" name="kuva" checked><label for="'.$img.'"><img height=50 width=50 src="../images/'.$img.'"</label>
            ';
            }
            else{ // kuva ei ollut valittu, jätetään ennalleen
                echo '<input type="radio" value="'.$img.'" ID="'.$img.'" name="kuva"><label for="'.$img.'"><img height=50 width=50 src="../images/'.$img.'"</label>
            ';
            }
                        
        }
        
        echo '<p>Hinta: <input type="number" min=0.0 step=0.01 id="tuote_hinta" name="hinta" value="'.$rivit[0]["hinta"].'"></p>
        ';
        echo '<input type="hidden" id="tuote_tuoteID" name="tuoteID" value="'.$rivit[0]["tuoteID"].'">
        ';
        echo '<input type="submit">
        ';
        echo '</form>
        ';

    }
    else{        
        echo '<a href="./admin_tuotteet.php" > Tuotetta ei määritelty, palaa takaisin </a>';
        echo $errors;
    }





    ?>
   
    

</body>
</html>
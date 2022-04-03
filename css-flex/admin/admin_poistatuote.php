<?php
include("./admin_requirelogin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kukkakauppa</title>
</head>
<body>
   <h1> POISTA TUOTE </h1>
   <a href="./admin_tuotteet.php" > Palaa takaisin </a> 
   <?php
    include('../asetukset.php');


    if ($_SERVER["REQUEST_METHOD"] == "POST") { 


        
        $sql = "DELETE FROM tuote WHERE tuoteID = ?";
        $stmt = $pdo->prepare($sql);
        $tuoteID= $_POST['tuoteID'];
        $stmt->execute([$tuoteID]);
        // Tulostetaan moneen riviin tehtiin muutoksia
        $updated = $stmt->rowCount();
        echo "Poistettuja tietoja: " . $updated;

        $pdo->connection = null;

        echo "Tiedot tallennettu onnistuneesti ".$tuoteID;

        //echo("<script>location.href = './admin_tuotteet.php';</script>");

    }
    elseif (false == (empty($_GET['tuoteID']))){

        $tuoteID = $_GET['tuoteID'];

        //TODO validoi sanitoi jne...
        $stmt = $pdo->prepare("SELECT * FROM tuote WHERE tuoteID = ?");
        $stmt->bindParam(1, $tuoteID,PDO::PARAM_INT);
        $stmt->execute();
        $rivit = $stmt -> fetchAll();



        echo '<form method="post" action="'.$_SERVER['PHP_SELF'].'">';
        
        echo '<p>Tuotenimi: '.$rivit[0]["nimi"].'</p>';
        echo '<p>Tyyppi: '.$rivit[0]["tyyppi"].'</p>';
        echo '<p>kuvaus: '.$rivit[0]["kuvaus"].'</p>';
        echo '<p>Hinta: '.$rivit[0]["hinta"].'</p>';
        echo '<input type="hidden" id="tuote_tuoteID" name="tuoteID" value="'.$rivit[0]["tuoteID"].'">';
        echo '<input type="submit" value="poista" >';
        echo '</form>';

    }
    else{        
        echo '<a href="./admin_tuotteet.php" > Tuotetta ei määritelty, palaa takaisin </a>';
    }

    ?>

    


</body>
</html>
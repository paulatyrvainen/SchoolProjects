<?php
// Start the session SALASANA qwerty
session_start();

//tämä sivu tarkistaa käyttäjän antaman salasanan.
//Mikäli salasana on ok, luodaan sessio ja ohjataan eteenpäin.
//Jos salasana on väärä, annetaan virhe ilmoitus.

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
<div class="admin-login"> 
<h1> Kirjatuminen epäonnistui</h1>

<?php
        error_reporting(E_ALL);
        ini_set("display_errors",1);

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            
            $salasana = $_POST['salasana'];


            //Tarkistetaan että salasana on annettu
            if (empty($salasana)){
                echo "<p style='color:red;' > Syötä salasana </p><br><a href='./index.php' ><button> Takaisin </button></a> ";
                $_SESSION["login"] = "Failed";
            }

            //Tarkistetaan salasana
            elseif ($salasana == "qwerty"){
                $_SESSION["login"] = "OK";
                echo("<script>location.href = './admin_tuotteet.php';</script>");

            }
            //Virheellinen salasana
            else {
                echo "<p style='color:red;' > Virheellinen salasana</p>  <a href='./index.php' ><button> Takaisin </button> </a>";
                $_SESSION["login"] = "Failed";
            }

        
        }
        
?>

</div>

</body>
</html>
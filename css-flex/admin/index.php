<?php
// Start the session
session_start();

//tarkista jos käyttäjä on jo kirjautunut sisään -> mene admin_tuotteet.php sivulle.

if (!empty($_SESSION)){
    $login_tila = $_SESSION["login"];
    if (empty($login_tila)){

    }
    elseif ($login_tila == "OK"){
        header("Location:./admin_tuotteet.php");
    }

}

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
        <h1> Kukkakaupan ylläpito </h1>
        <h2> Kirjaudu sisään muokataksesi sivustoa </h2>


        <form method="post" action="./admin_login.php" >
        <ul class="no-bullets">
            <li><label for="salasana" >Anna salasana </lable><input type="password" id="salasana" name="salasana" ></input></li>
            <li><input type="submit" value="Kirjaudu" ></li>
        </ul>
        
        
        

        </form>
    </div>

</body>
</html>
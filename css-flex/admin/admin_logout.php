<?php

session_start();
//Tämä kirjaa käyttäjän session ulos


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
    <?php
        error_reporting(E_ALL);
        ini_set("display_errors",1);
        $_SESSION["login"] = "Failed";
        echo("<script>location.href = './index.php';</script>");

?>
</body>
</html>
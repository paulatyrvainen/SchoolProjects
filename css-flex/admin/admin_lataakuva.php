<?php
include("./admin_requirelogin.php");
?>
<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./admin.css">
    <title>Kukkakauppa - Lataa kuva</title>

</head>
<body>
   <h1> LATAA KUVA </h1>
   <a href="./admin_tuotteet.php" > Palaa takaisin </a> 
    <!--Lomake kuvan lataamista images -kansioon varten-->
    <h1>Lataa kuva kansioon:</h1>

    <form action="uploadimg.php" method="post" enctype="multipart/form-data">
    Valitse ladattava kuva:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Lataa kuva" name="submit">
    </form>
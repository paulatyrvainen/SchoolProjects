<?php
//Tarkistetaan että käyttäjän on kirjautunut sisään.
//Jos ei ohjataan kirjautumissivulle.

session_start();
error_reporting(E_ALL);
ini_set("display_errors",1);

//Tarkisteaan että session on olemassa
if (!empty($_SESSION)){

    $login_tila = $_SESSION["login"];

    if (empty($login_tila)){ 

        header("Location:./index.php");  // Ei validia sessiota -> Kirjautumissivulle
    }
    elseif ($login_tila != "OK"){ 

        header("Location:./index.php"); // Ei validia sessiota -> Kirjautumissivulle
    }
}
else { // Ei sessiota -> Kirjautumissivulle
    
    header("Location:./index.php");
}

?>
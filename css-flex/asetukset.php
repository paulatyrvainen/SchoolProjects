<?php

// Näyttää virheet
error_reporting(E_ALL);
ini_set("display_errors", 1);

// Tietokanta-asetukset
$palvelin = "localhost";
$kayttajatunnus = "";
$salasana = "";
$tietokanta = "";


try {
    $pdo = new PDO("mysql:host=$palvelin;dbname=$tietokanta", $kayttajatunnus, $salasana);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Saattaa korjata mahdollisen ääkkösongelman
    // $pdo->exec("SET NAMES 'utf8';");
    }
catch(PDOException $e)
    {
    // vaihtoehto 1
    echo "<p>Yhteys epäonnistui</p><p>" . $e->getMessage() . "</p>";
    // vaihtoehto 2
    //file_put_contents('PDOErrors.txt', $e->getMessage(), FILE_APPEND);
    }

/*
Tulostaa muodostetun SQL-lauseen 
Kutsutaan:
echo preparedQuery($sql,array($nimi,$hinta));
*/

function preparedQuery($sql,$params) {
    for ($i=0; $i<count($params); $i++) {
      $sql = preg_replace('/\?/',$params[$i],$sql,1);
    }
    return $sql;
}



?>
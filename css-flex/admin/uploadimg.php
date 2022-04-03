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
    <title>Kuvan lataus kansioon</title>
</head>
<body>

<?php
include('../asetukset.php');

$target_dir = "../images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Tarkistaa, että kuva on kuva
if(isset($_POST["submit"])) 
{
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "Tiedosto on kuva - " . $check["mime"] . ".<br>";
    $uploadOk = 1;
  } else {
    echo "Tiedosto ei ole kuva.<br>";
    $uploadOk = 0;
  }
}

// Tarkistaa onko tiedosto jo kansiossa
if (file_exists($target_file)) {
  echo "Tiedostosi on jo kansiossa.<br>";
  $uploadOk = 0;
}

// Tarkistaa kuvan koon
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Pahoittelut, tiedostosi on liian suuri.<br>";
  $uploadOk = 0;
}

// Hyväksyy vain tietyt tiedostotyypit
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Pahoittelut, vain JPG, JPEG, PNG & GIF tiedostomuodot ovat sallittuja.<br>";
  $uploadOk = 0;
}

// Tarkistaa, että $uploadOk on asetettu 0, jos error
if ($uploadOk == 0) {
  echo "Pahoittelut, tiedostoasi ei voitu ladata..<br>";
// jos kaikki on okei, koitetaan ladata tiedosto
}
 else 
{
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) 
  {
    echo "Tiedosto ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " on ladattu.<br>";
  } 
  else
   {
    echo "Pahoittelut, tiedoston lataus ei jostain syystä onnistunut.<br>";
  }
}
?>

<a href='./admin_tuotteet.php' ><button> Palaa hallinnan etusivulle </button></a>
<a href='./admin_lataakuva.php' ><button> Lataa uusi kuva </button></a>
    
</body>
</html>

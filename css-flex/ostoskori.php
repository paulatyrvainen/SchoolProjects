<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ostoskori</title>
    <link rel="stylesheet" href="roosa_tyylit.css"> 
    <link rel="stylesheet" type="text/css" href="header-footer.css">
    <link rel="stylesheet" href="ostoskori.css">
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet"> 
</head>
<body>
    
	<header>
		<div class="logo">
		  <a href="index.php"><img src="images/logo.png" alt="Kukkakauppa"></a>
		</div>

		  <nav>
			<ul class="nav-links">
				<li><a href="index.php">Etusivu</a></li>
				<li><a href="tuotteet.php">Tuotteet</a></li>
				<li><a href="kukkakauppa.html">Yritys</a></li>
				<li><a href="ota-yhteytta.html">Yhteystiedot</a></li>
			</ul>
		</nav>
		<div class="buttons">
			<button class="btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
				<path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
			  </svg></button>

        <div class="dropdown">      
            <button class="dropbtn">
                <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#4F4F4F" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </button>
                <div class="dropdown-content">
                  <a href="index.php">Etusivu</a>
                  <a href="tuotteet.php">Tuotteet</a>
                  <a href="kukkakauppa.html">Yritys</a>
                  <a href="ota-yhteytta.html">Yhteystiedot</a>
                </div>
        </div>
			</div>
	</header>

<main>
    <div class="content-container">  

<?php
include('/asetukset.php');

//Poista tuote tai lisää määrää
session_start();
$status="";

//Tuotteen poisto


if (isset($_POST['action']) && $_POST['action']=="remove")
{
if(!empty($_SESSION["ostoskori"])) 
{
    foreach($_SESSION["ostoskori"] as $key => $value) 
    {
      if($_POST["tuoteID"] == $key)
      {
      unset($_SESSION["ostoskori"][$key]);
      echo "<div class='box'>
      Tuote on poistettu ostoskoristasi!</div>";
      }
      //Lopetetaan ostoskori sessio ostoskorin ollessa tyhja
      if(empty($_SESSION["ostoskori"]))
      unset($_SESSION["ostoskori"]);
      }		
    }
 }


//Muuta tuotteen maaraa

//if (isset($_POST['action']) && $_POST['action']=="change")
//{
//  foreach($_SESSION["ostoskori"] as $value)
//  {
//    if($value['tuoteID'] === $_POST["tuoteID"])
//    {
//        $value['maara'] = $_POST["maara"];
//        break;
//    }
//  }
  	
//}
if (isset($_POST['action']) && $_POST['action']=="change")
{
  foreach($_SESSION["ostoskori"] as $key => $value){
    if($_POST["tuoteID"] == $key){
      $_SESSION["ostoskori"][$key]["maara"] = $_POST["maara"];
      break;
    }
  }
}


?>

<!-- Tulosta ostoskori -->
<div class="ostoskori">

<?php
if(isset($_SESSION["ostoskori"]))
{
    $yhteensa = 0;
?>	

<table class="table">
<tbody>
<tr>
<td></td>
<td>NIMI</td>
<td>MÄÄRÄ</td>
<td>HINTA</td>
<td>YHTEENSÄ</td>
</tr>	

<?php		
foreach ($_SESSION["ostoskori"] as $tuote)
{
?>
<tr>
<td>
<img src='./images/<?php echo $tuote["kuva"]; ?>' width="50" height="40" />
</td>
<td><?php echo $tuote["nimi"]; ?><br />
<form method='post' action=''>
<input type='hidden' name='tuoteID' value="<?php echo $tuote["tuoteID"]; ?>" />
<input type='hidden' name='action' value="remove" />
<button type='submit' class='remove'>Poista tuote</button>
</form>
</td>
<td>
<form method='post' action=''>
<input type='hidden' name='tuoteID' value="<?php echo $tuote["tuoteID"]; ?>" />
<input type='hidden' name='action' value="change" />
<select name='maara' class='maara' onChange="this.form.submit()">
<option <?php if($tuote["maara"]==1) echo "selected ";?>
value="1">1</option>
<option <?php if($tuote["maara"]==2) echo "selected ";?>
value="2">2</option>
<option <?php if($tuote["maara"]==3) echo "selected ";?>
value="3">3</option>
<option <?php if($tuote["maara"]==4) echo "selected ";?>
value="4">4</option>
<option <?php if($tuote["maara"]==5) echo "selected ";?>
value="5">5</option>
</select>
</form>
</td>
<td><?php echo $tuote["hinta"] . "€"; ?></td>
<td><?php echo $tuote["hinta"]*$tuote["maara"] . "€"; ?></td>
</tr>
<?php
$yhteensa += ($tuote["hinta"]*$tuote["maara"]);
}
?>
<tr>
<td colspan="5" align="right">
<strong>OSTOSKORI YHTEENSÄ: <?php echo $yhteensa . "€"; ?></strong>
</td>
</tr>
</tbody>
</table>		
  <?php
}
else
    {
	echo "<h3>Ostoskorisi on tyhjä!</h3>";
	}
?>
</div>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">

<?php echo $status; ?>
</div>

 </main>



    <footer>
        <div class="footer">
            <div class="footer-heading footer-1">
                <a href="#"><img src="images/ig55.png" alt="Instagram"></a>
            </div>
            <div class="footer-heading footer-2">
                <h4>© BrandName. All rights reserved.</h4>
            </div>
            <div class="footer-heading footer-3">
                <a href="#"><img src="images/face55.png" alt="Facebook"></a>
            </div>
        </div>
    </footer>

</body>
</html>
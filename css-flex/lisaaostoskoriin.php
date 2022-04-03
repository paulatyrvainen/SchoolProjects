<!-- Ohjeet: https://www.allphptricks.com/simple-shopping-cart-using-php-and-mysql/ -->

<?php
session_start();

//Tietokantayhteys
include('/asetukset.php');

$status="";
if (isset($_POST['tuoteID']) && $_POST['tuoteID']!="")
{
$tuoteID = $_POST['tuoteID'];
$result = mysqli_query(
$con,
"SELECT * FROM `tuote` WHERE `tuoteID`='$tuoteID'"
);
$row = mysqli_fetch_assoc($result);
$tuoteID = $row['tuoteID'];
$nimi = $row['nimi'];
$tyyppi = $row['tyyppi'];
$kuvaus = $kuvaus['kuvaus'];
$kuva = $row['kuva'];
$hinta = $row['hinta'];


$cartArray = array(
	$code=>array(
	'tuoteID'=>$tuoteID,        
	'nimi'=>$nimi,
    'tyyppi'=>$tyyppi,
    'kuvaus'=>$kuvaus,
    'kuva'=>$kuva,
	'hinta'=>$hinta,
	'maara'=>1,)
);

if(empty($_SESSION["ostoskori"])) 
{
    $_SESSION["ostoskori"] = $cartArray;
    $status = "<div class='box'>Tuote on lisätty ostoskoriin!</div>";
}
else
{
    $array_keys = array_keys($_SESSION["ostoskori"]);
    if(in_array($tuoteID,$array_keys)) {
	$status = "<div class='box' style='color:red;'>
	Tuote on jo lisätty ostoskoriin!</div>";	
    } else {
    $_SESSION["ostoskori"] = array_merge(
    $_SESSION["ostoskori"],
    $cartArray
    );
    $status = "<div class='box'>Tuote on lisätty ostoskoriin!</div>";
	}

	}
}
?>

<!--ostoskori ikoni (mahdollisesti poistettava)-->
<?php
if(!empty($_SESSION["shopping_cart"])) {
$cart_count = count(array_keys($_SESSION["shopping_cart"]));
?>
<div class="cart_div">
<a href="cart.php"><img src="cart-icon.png" /> Cart<span>
<?php echo $cart_count; ?></span></a>
</div>
<?php
}
?>

<!--Näytä tuotteet tietokannasta ja tulosta viesti-->
<?php
$result = mysqli_query($con,"SELECT * FROM `tuote`");
while($row = mysqli_fetch_assoc($result)){
    echo "<div class='product_wrapper'>
    <form method='post' action=''>
    <input type='hidden' name='tuoteID' value=".$row['tuoteID']." />
    <div class='kuva'><img src='".$row['kuva']."' /></div>
    <div class='nimi'>".$row['nimi']."</div>
    <div class='hinta'>$".$row['hinta']."</div>
    <button type='submit' class='buy'>Osta nyt</button>
    </form>
    </div>";
        }
mysqli_close($con);
?>

<div style="clear:both;"></div>

<div class="message_box" style="margin:10px 0px;">
<?php echo $status; ?>
</div>
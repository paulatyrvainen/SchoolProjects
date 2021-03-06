<?php session_start() ?>
<!DOCTYPE html>
<html lang="fi">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tuotteet</title>

    <!-- Tyylit -->
    <link rel="stylesheet" href="header-footer.css">
    <link rel="stylesheet" href="tuotteet.css">
    

    <!-- Fontit -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
    
 
</head>

<!-- Tämä sivu listaa kukkakaupassa myytävät tuotteet -->

<body>
  <script>
    
    



    function showHideSearch() {
      var searchdropdown  = document.getElementById("searchdropdown-content");
      var searchdropbtn = document.getElementById("searchdropbtn");


      if (searchdropdown == null){
        return;
      }


      if (searchdropdown.style.display === "none") {
        searchdropdown.style.display = "flex";
        searchdropbtn.style.display = "none";
      } else {
        searchdropdown.style.display = "none";
        searchdropbtn.style.display = "flex";
      }
    }
    
    function AutoshowHideSearch(){
      var searchdropdown  = document.getElementById("searchdropdown-content");
      var searchdropbtn = document.getElementById("searchdropbtn");

      //console.log("screen size "+window.innerWidth);
      if (searchdropdown == null){
        return;
      }

      if (window.innerWidth > 800){
        
        searchdropdown.style.display = "flex";
        searchdropbtn.style.display = "none";
      }
      else{
        searchdropdown.style.display = "none";
        searchdropbtn.style.display = "flex";
      }

    }
    window.addEventListener('resize', AutoshowHideSearch);
    AutoshowHideSearch();

  </script>



     <!-- header -->
     <header>
      <div class="logo">
        <a href="index.html"><img src="images/logo.png" alt="Kukkakauppa"></a>
      </div>
  
        <nav>
        <ul class="nav-links">
          <li><a href="index.html">Etusivu</a></li>
          <li><a href="tuotteet.php">Tuotteet</a></li>
          <li><a href="kukkakauppa.html">Yritys</a></li>
          <li><a href="ota-yhteytta.html">Yhteystiedot</a></li>
        <?php
        if (!empty($_SESSION)){

            $login_tila = $_SESSION["login"];
        
            if (empty($login_tila)){

            }
            elseif ($login_tila == "OK"){
                echo '<li><a href="./admin/">Ylläpito</a></li>';
            }
            
        }
        ?>
        </ul>
      </nav>
      <div class="buttons">
        <button onclick="document.location='ostoskori.php'" class="btn-primary"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
          <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
          </svg></button>
  
          <div class="dropdown">      
              <button class="dropbtn">
                  <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="#4F4F4F" class="bi bi-list" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                  </svg>
              </button>
                  <div class="dropdown-content">
                    <a href="index.html">Etusivu</a>
                    <a href="tuotteet.html">Tuotteet</a>
                    <a href="kukkakauppa.html">Yritys</a>
                    <a href="ota-yhteytta.html">Yhteystiedot</a>
                  </div>
          </div>
        </div>
    </header> <!-- header päättyy -->


    <!-- main alkaa -->
    <main>
      <div class="flex-container-1">
              <h1>Tuotteet</h1>
              <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quod, aut!</p>
      </div>
      
        
          <div class="flex-item-full">
            <a href="<?php echo $_SERVER['PHP_SELF'] ?>"> <button class="filter-button"><p>Kaikki</p></button></a>
            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?tyyppi=Häät"> <button class="filter-button"><p>Häät </p></button></a>
            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?tyyppi=Hautajaiset"><button class="filter-button"><p>Hautajaiset</p></button></a>
            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?tyyppi=Korkeat+kimput"><button class="filter-button"><p>Korkeat kimput</p></button></a>
            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?tyyppi=Matalat+kimput"><button class="filter-button"><p>Matalat kimput</p></button></a>
            <a href="<?php echo $_SERVER['PHP_SELF'] ?>?tyyppi=Viherkasvit"><button class="filter-button"><p>Viherkasvit</p></button></a>
          
       
          </div>
       

      <div class="flex-container">

          <!-- Filter alkaa-->

           
          <div class="flex-item-left30">

            
              <button id="searchdropbtn" class="searchdropbtn" onclick="showHideSearch()">Filter</button>
              <div class="searchdropdown-content" id="searchdropdown-content">
                <form class="filter">
                  <h5>Lorem ipsum</h5>
                  <ul  class="no-bullets">
                    <li>
                      <input type="checkbox" id="filter1-1" name="filter1-1" value="1" checked>
                      <label for="filter1-1">Lorem1</label>
                    </li>
                    <li>
                      <input type="checkbox" id="filter1-2" name="filter1-2" value="2" >
                      <label for="filter1-2">Lorem2</label>
                    </li>

                  </ul>
                  <h5>Lorem ipsum</h5>
                  <ul  class="no-bullets">
                    <li>
                      <input type="checkbox" id="filter2-1" name="filter2-1" value="1" >
                      <label for="filter2-1">Lorem1</label>
                    </li>
                    <li>
                      <input type="checkbox" id="filter2-2" name="filter2-2" value="2" >
                      <label for="filter2-2">Lorem2</label>
                    </li>

                  </ul>
                  <h5>Lorem ipsum</h5>
                  <ul  class="no-bullets">
                    <li>
                      <input type="checkbox" id="filter3-1" name="filter3-1" >
                      <label for="filter3-1">Lorem1</label>
                    </li>
                    <li>
                      <input type="checkbox" id="filter3-2" name="filter3-2" >
                      <label for="filter3-2">Lorem2</label>
                    </li>
                    <li>
                      <input type="checkbox" id="filter3-3" name="filter3-3" >
                      <label for="filter3-3">Lorem3</label>
                    </li>
                  </ul>

                  <button class="clear">Tyhjennä</button>
                  <button class="clear" onclick="showHideSearch()">Hae</button>

                </form>
            
          </div>
          </div>
          
          <div class="flex-item-right60">

            <?php
            error_reporting(E_ALL);
            ini_set("display_errors",1);
            include('./asetukset.php');        
            
            
            if (!empty($_GET)){ //tarkistetaan onko valittu joku filteri. 
                
                $tyyppi = $_GET['tyyppi'];
                if (empty($tyyppi)){ //tarkisteaan onko tyyppi filtterissä arvo

                    //Ei mitään filteröintiä
                    $sql = "SELECT * FROM tuote ORDER BY nimi";
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute();
                }
                else { //tyyppi filteri valittu
                    
                    //Puretaan url encoodaus
                    $tyyppi = urldecode($tyyppi);  
                     
                    //Sanitoidaan
                    $tyyppi = filter_var($tyyppi, FILTER_SANITIZE_STRING);
                    
                    //validoidaan
                    $tyypit = array("Häät", "Hautajaiset", "Korkeat kimput", "Matalat kimput","Viherkasvit");
                    if (in_array($tyyppi, $tyypit)) {
                        $sql = "SELECT * FROM tuote WHERE tyyppi=? ORDER BY nimi";
                    }
                    else {
                        $sql = "SELECT * FROM tuote ORDER BY nimi";
                    }
                                       
                    $stmt = $pdo->prepare($sql);
                    $stmt->execute([$tyyppi]);
                }
            }
            else { //Ei mitään filteröintiä
                $sql = "SELECT * FROM tuote ORDER BY nimi";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
            }
            
            
            $rivit = $stmt -> fetchAll();
            
            $tuotemaara = 0;
            $endrow_div_added = false;

            //Loopataan tuote rivit läpi
            foreach( $rivit as $rivi ) {
                $endrow_div_added = false;

                //Luodaan uusi rivi joka kolmannelle tuotteelle
                if ($tuotemaara%3 == 0){
                    echo '<div class="flex-item-row">';
                }

                echo '<div class="flex-item-product">';

                
                if (is_null($rivi["kuva"])){//Tarkistetaan että onko kuva määritelty, jos ei laitetaan default
                    echo '<img class="img-product" src="morsius.jpg" alt="tuotekuva">';
                }
                else {//kuva määritelty, laitetaan määritelty kuva.
                    echo '<img class="img-product" src="./images/'.$rivi['kuva'].'" alt="tuotekuva">';
                }
                echo '
                    <h5>' . $rivi['nimi'] . '</h5>
                    <h5>' . $rivi['hinta'] . ' &#128;</h5>
                </div>
                ';

                //kun 3 tuotetta lisätty, suljetaan rivi.
                if ($tuotemaara%3 == 2){
                    echo '</div>';
                    $endrow_div_added = true;
                }

                $tuotemaara = $tuotemaara +1;

            }
            //muistetaan sulkea viimeinen div jos ei sattunut tuotteiden määrä täysin tasan.
            if ($endrow_div_added == false){
                echo '</div>';
            }

            // Suljetaan yhteys asettamalla pdo-objekti tyhjäksi
            $pdo->connection = null;

            ?>
            </div> <!-- flex-item-right60 -->
        </div>

       

      </div> 
    </main> <!-- main päättyy -->
  

    <!-- Footer alkaa-->
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
    <!--footer päättyy-->
  




</body>


</html>

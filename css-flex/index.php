
<!DOCTYPE html>
<html lang="fi">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
       
<!--Linkit tyylitiedostoihin-->
    <link rel="stylesheet" href="roosa_tyylit.css">  
    <link rel="stylesheet" href="header-footer.css">

    <title>Kukkakauppa</title>

<!--Fontti Lato-->
    <link href="https://fonts.googleapis.com/css2?family=Licorice&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet"> 
    <meta name="viewport" content="width=device-width,initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">

<!--Fontti Playfair Display-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Licorice&family=Playfair+Display:ital,wght@1,400;1,500&display=swap" rel="stylesheet"> 
</head>


<body>
<!--Header-->
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
                  <a href="index.php">Etusivu</a>
                  <a href="tuotteet.php">Tuotteet</a>
                  <a href="kukkakauppa.html">Yritys</a>
                  <a href="ota-yhteytta.html">Yhteystiedot</a>
                </div>
        </div>
        </div>
	</header>


<!--Main-->
    <main>
        <div class="content-container">  

        <!--Teksti-->     
            <div class="text">
                Suosituimmat tuotteemme
            </div>

        <!--Tuotekortit-->
            <div class="card-container">
                <div class="card">
                    <img src="images/violetti_kimppu.jpg" alt="violetti kimppu" style="width: 100%">
                    <div class="p1">Lorem ipsum €€</div>
                    <form action = "./lisaaostoskoriin.php" method = "post"> 
                        <input type="hidden" value="12" name="tuoteID">
                    <p><button input type="submit" value="Lisaa koriin">Lisää ostoskoriin</button></p>
                    </form>
                </div>

                <div class="card">
                    <img src="images/ruusukimppu.jpg" alt="ruusukimppu" style="width:100%">
                    <div class="p1">Lorem ipsum €€</div>
                    <form action = "./lisaaostoskoriin.php" method = "post"> 
                        <input type="hidden" value="3" name="tuoteID">
                    <p><button input type="submit" value="Lisaa koriin">Lisää ostoskoriin</button></p>
                    </form>
                </div>

                <div class="card">
                    <img src="images/Tulppaanit.jpg" alt="tulppaanikimppu" style="width:100%">
                    <div class="p1">Lorem ipsum €€</div>
                    <form action = "./lisaaostoskoriin.php" method = "post"> 
                        <input type="hidden" value="13" name="tuoteID">
                    <p><button input type="submit" value="Lisaa koriin">Lisää ostoskoriin</button></p>
                    </form>
                </div>

                <div class="card">
                    <img src="images/maljakko.jpg" alt="kukka maljakossa" style="width:100%">
                    <div class="p1">Lorem ipsum €€</div>
                    <form action = "./lisaaostoskoriin.php" method = "post"> 
                        <input type="hidden" value="11" name="tuoteID">
                    <p><button input type="submit" value="Lisaa koriin">Lisää ostoskoriin</button></p>
                    </form>
                </div>
            </div>

        <div class="button1" onclick="document.location='tuotteet.php'">Katso kaikki tuotteemme
        </div>
            

        </div>
     </main>

<!--Footer-->
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

<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>E-learning - zmiana hasła</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Copyright.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
</head>

<body id="page-top">
    <nav class="navbar navbar-light navbar-expand-lg fixed-top" id="mainNav">
        <div class="container"><a class="navbar-brand js-scroll-trigger" href="#page-top">e - LEARNING</a><button data-toggle="collapse" data-target="#navbarResponsive" class="navbar-toggler navbar-toggler-right" type="button" aria-controls="navbarResponsive" aria-expanded="false"
                aria-label="Toggle navigation"><i class="fa fa-align-justify"></i></button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="nav navbar-nav ml-auto">
				<?php
								if($_SESSION['zalogowani']==true)
								{	
									echo'<li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger">Witaj '.$_SESSION['login'].'</a></li>';
									echo'<li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href=\'zmien_haslo.php\'>Zmień hasło</a></li>';
									if($_SESSION['stanowisko']=='Admin' || $_SESSION['stanowisko']=='Moderator')
									{

										echo'<li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href=\'panel_admina.php#main\'>Panel administracji</a></li>';
										
									}
								}
								else
								{
									header('Location:index.html');
									die();
								}	
								?>
                    <li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="kategorie.php">Strona główna</a></li>
					<li class="nav-item" role="presentation"><a class="nav-link js-scroll-trigger" href="wyloguj.php">Wyloguj</a></li>
                    </ul>
            </div></div>
    </nav>
    <header class="masthead text-center text-white d-flex" style="background-image:url('assets/img/header.jpg');">
        <div class="container my-auto">
            <div class="row">
                <div class="col-lg-10 mx-auto">
                    <h1 class="text-uppercase"><strong>E - LEARNING PLATFORM</strong></h1>
                    <hr>
                </div>
            </div>
            <div class="col-lg-8 mx-auto">
                <p class="text-faded mb-5">PLATFORMA, KTÓRA ZAPEWNI CI DYNAMICZNY ROZWÓJ. POSZERZAJ SWOJĄ WIEDZĘ WRAZ Z NASZYMI KURSAMI!</p>
            </div>
        </div>
    </header>
    <section id="services">
        <div class="login-card" id="zmien"><img class="profile-img-card" src="assets/img/avatar_2x.png">
            <p class="profile-name-card"> </p>
							<h3>Panel zmiany hasła</h3>
							
						<form method="POST" action="zmien_haslo.php#zmien">
							Podaj aktualne hasło:<br><input type="password" name= "haslo_akt"/><br><br>
							Podaj hasło:<br><input type="password" name= "haslo1"/><br><br>
							Podaj jeszcze raz hasło:<br><input type="password" name= "haslo2"/><br><br>
							<center><input type="submit" value="Zmień hasło" name="zmiana_hasla"></center>
						</form><br>
						<?php
		
				$connection = mysqli_connect('mysql.cba.pl', '', '');
				if (!$connection){
					die("Polaczenie przerwanie" . mysqli_error($connection));
				}
				$select_db = mysqli_select_db($connection, 'zdalnykurs');
				if (!$select_db){
					die("Blad polaczenia" . mysqli_error($connection));
				}
								

				if (isset($_POST['zmiana_hasla']))
				{
					$haslo_akt = $_POST['haslo_akt'];
					$haslo1 = $_POST['haslo1'];
					$haslo2 = $_POST['haslo2'];



				    $rezultat = mysqli_query($connection, "SELECT * from uzytkownicy WHERE id_uzytkownika='" . $_SESSION["id_uzytkownika"] . "'");
					$wiersz = mysqli_fetch_array($rezultat);
					if ($haslo_akt == $wiersz["haslo"]) 
					{
						if($haslo1 !== $haslo2)
						{
							echo'Twoje nowe hasła nie są takie same!</span>';
						}
						else
						{
							if(strlen($haslo1)<8)
							{
								echo'Hasło musi zawierać co najmniej 8 znaków!</span>';
							}
							else
							{
								mysqli_query($connection, "UPDATE uzytkownicy set haslo='" . $haslo1 . "' WHERE id_uzytkownika='" . $_SESSION["id_uzytkownika"] . "'");
								echo'Twoje hasło zostało pomyślnie zmienione!</span>';
							}
						}
					} 
					else
					{
						echo'Bład podczas zmiany hasła!</span>';

					}
				}
				?>
						<br><br><br><center><a href="kategorie.php" class="button style3 fit" data-poptrox="youtube,300x400">POWRÓT</a></center>
				
		</div>
    </section>
	

	
    <section id="portfolio" class="p-0"></section>
    <section class="bg-dark text-white">
        <div class="container text-center">
            <h2 class="mb-4">Chcesz poczytać o projekcie więcej?</h2><a class="btn btn-light btn-xl sr-button" role="button" data-aos="zoom-in" data-aos-duration="400" data-aos-once="true" href="#">POBIERZ&nbsp;</a></div>
    </section>
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 mx-auto text-center">
                    <h2 class="section-heading">Pozostańmy w kontakcie!</h2>
                    <hr class="my-4">
                    <p class="mb-5">&nbsp; &nbsp; &nbsp;Masz jakieś pytania? Chcesz o coś zapytać? Chcesz współpracować? A może dodać kurs? &nbsp; &nbsp; &nbsp; Jeśli tak skontaktuj się z nami poniżej. &nbsp;&nbsp;</p>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 ml-auto text-center"><i class="fa fa-phone fa-3x mb-3 sr-contact" data-aos="zoom-in" data-aos-duration="300" data-aos-once="true"></i>
                    <p>https://twitter.com/e-learnpl</p>
                </div>
                <div class="col-lg-4 mr-auto text-center"><i class="fa fa-envelope-o fa-3x mb-3 sr-contact" data-aos="zoom-in" data-aos-duration="300" data-aos-delay="300" data-aos-once="true"></i>
                    <p><a href="mailto:your-email@your-domain.com">email@example.com</a></p>
                </div>
            </div>
        </div></section>
		<footer class="copyright">
				<div class="content"> Stworzone  <span class="text-switch ion-heart"></span>przez E-learning © 2020
                
	</div>
	</footer>
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/bs-animation.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.1.1/aos.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/creative.js"></script>
</body>

</html>
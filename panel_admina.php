<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>E-learning - panel admina</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="assets/fonts/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/Copyright.css">
    <link rel="stylesheet" href="assets/css/Google-Style-Login.css">
	    <link rel="stylesheet" href="style.css">

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
<div id="main">  
<section id="services">
        <div class="login-card" id="zmien"><img class="profile-img-card" src="img/admin.jpg">
            <p class="profile-name-card"> </p>
			
								
									<h3>PANEL ADMINISTRACJI</h3>
									<?php
									if($_SESSION['stanowisko']=='Admin')
									{
										echo'<a href="dodaj_uzytkownika.php#main" class="btn btn-primary" data-poptrox="youtube,800x400">Dodaj użytkownika</a><br>
										<a href="usun_uzytkownika.php#main" class="btn btn-primary" data-poptrox="youtube,800x400">Usuń użytkownika</a><br>
										<a href="edytuj_uzytkownika.php#main" class="btn btn-primary" data-poptrox="youtube,800x400">Edytuj użytkownika</a><br>
										<a href="przyznaj_admina.php#main" class="btn btn-primary" data-poptrox="youtube,800x400">Przyznaj uprawnienia</a><br>';
									}
									if($_SESSION['stanowisko']=='Admin' || $_SESSION['stanowisko']=='Moderator')
									{
										echo'<a href="komentarze.php#main" class="btn btn-primary" data-poptrox="youtube,800x400">Komentarze</a><br>
										<a href="komentarze_niezatw.php#main" class="btn btn-primary" data-poptrox="youtube,800x400">Zatwierdzanie komentarzy</a><br>
<a href="dodaj_kategorie.php#main" class="btn btn-primary" data-poptrox="youtube,800x400">Dodaj kategorię</a><br>';
									}
									if($_SESSION['stanowisko']=='Admin')
									{
										echo'<a href="dodaj_kurs.php#main" class="btn btn-primary" data-poptrox="youtube,800x400">Dodaj kurs</a><br>
										<a href="usun_kurs.php#main" class="btn btn-primary" data-poptrox="youtube,800x400">Usuń kurs</a><br>';
									}
									if($_SESSION['stanowisko']=='Admin' || $_SESSION['stanowisko']=='Moderator')
									{
echo'<a href="dodaj_lekcje.php#main" class="btn btn-primary" data-poptrox="youtube,800x400">Dodaj lekcję</a><br>
										<a href="usun_lekcje.php#main" class="btn btn-primary" data-poptrox="youtube,800x400">Usuń lekcję</a><br>';
echo'<a href="dodaj_pytania.php#main" class="btn btn-primary" data-poptrox="youtube,800x400">Dodaj pytania do quizu</a><br>';
										echo'<a href="testquiz.php#main" class="btn btn-primary" data-poptrox="youtube,800x400">Powrót</a><br>';
									}
									
									?>
			
		</div>
    </section>
       </div>
	<br>
<hr>
<br>
  

    <section id="contact">
	
        <div class="container">
		<br>
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
	   <script src="quiz.js"></script>
</body>

</html>
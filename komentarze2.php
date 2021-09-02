<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>E-learning - kursy wzrokowiec</title>
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
	     
	<div class="container">
      

	<div id="main">
					

				<?php
	if($_SESSION['zalogowani']==true && $_SESSION['stanowisko']=='Admin' || $_SESSION['stanowisko']=='Moderator')
	{
		require_once "laczenie.php";
		
		function generate_page_links($cur_page, $num_pages) {
			 $page_links = '';

			 // odnośnik do poprzedniej strony (-1)
			 if ($cur_page > 1) {
				  $page_links .= '<a href="' . $_SERVER['PHP_SELF'] . '?page=' . ($cur_page - 1) . '">Poprzednia strona </a> ';
			 }

			 $i = $cur_page - 4;
			 $page = $i + 8;

			 for ($i; $i <= $page; $i++) {

				  if ($i > 0 && $i <= $num_pages) {
					   
					   //jeżeli jesteśmy na danej stronie to nie wyświetlamy jej jako link    
					   if ($cur_page == $i  && $i != 0) {
							$page_links .= '' . $i;
					   }
					   else {

							//wyświetlamy odnośnik do 1 strony
							if ($i == ($cur_page - 4) && ($cur_page - 5) != 0) { 
								 $page_links .= ' <a href="' . $_SERVER['PHP_SELF'] . '?page=1">1</a> '; 
							}
					   
							//wyświetlamy "kropki", jako odnośnik do poprzedniego bloku stron
							if ($i == ($cur_page - 4) && (($cur_page - 6)) > 0) { 
								 $page_links .= ' <a href="' . $_SERVER['PHP_SELF'] . '?page=' . ($cur_page - 5) . '">...</a> '; 
							} 
					   
							//wyświetlamy liki do bieżących stron
							$page_links .= ' <a href="' . $_SERVER['PHP_SELF'] . '?page=' . $i . '"> ' . $i . '</a> ';
				  
							//wyświetlamy "kropki", jako odnośnik do następnego bloku stron
							if ($i == $page && (($cur_page + 4) - ($num_pages)) < -1) { 
								 $page_links .= ' <a href="' . $_SERVER['PHP_SELF'] . '?page=' . ($cur_page + 5) . '">...</a>'; 
							} 
					   
							//wyświetlamy odnośnik do ostatniej strony
							if ($i == $page && ($cur_page + 4) != $num_pages) { 
								 $page_links .= ' <a href="' . $_SERVER['PHP_SELF'] . '?page=' . $num_pages . '">' . $num_pages . '</a> '; 
							}
					   }
				  }
			 }

			 //odnośnik do następnej strony (+1)
			 if ($cur_page < $num_pages) {
				  $page_links .= '<a href="' . $_SERVER['PHP_SELF'] . '?page=' . ($cur_page + 1) . '"> Następna strona</a>';
			 }

			 return $page_links;
		}
		$login_komentarz_szukaj=$_POST['login_komentarz_szukaj'];
		if(empty($login_komentarz_szukaj))
		{
			$_SESSION['puste_szukaj_komentarz']='<span style="color:white">Nie wpisałeś loginu użytkownika!</span>';
			header('Location:komentarze.php#szukaj_kom');
		}
		
		
		//obliczanie danych na potrzeby stronicowania
		$cur_page = isset($_GET['page']) ? $_GET['page'] : 1;
		$results_per_page = 5; //Liczba wyników na stronę
		$skip = (($cur_page - 1) * $results_per_page); //liczba pomijanych wierszy na potrzeby stronicowania
	
		$query = "SELECT * FROM komentarze WHERE login='$login_komentarz_szukaj' ORDER BY id_komentarza DESC";
		$data = mysqli_query($mysqli, $query); //pobieramy wszystkie wiersze
		
		$total = mysqli_num_rows($data); //liczba wierszy zapisana na potrzeby stronicowania
		$num_pages = ceil($total / $results_per_page); //określenie liczby stron
		$query .=  " LIMIT $skip, $results_per_page"; //dopisujemy do wcześniejszego zapytania, klauzule LIMIT

		//wykonanie kwerendy
		$result = mysqli_query($mysqli, $query);
		
		if ($result->num_rows > 0) 
		{
			
			echo "<h2>Wszystkie komentarze danego użytkownika według daty dodania:</h2>";
			while($row = $result->fetch_assoc()) 
			{
			
			
			echo "<table>"; 
			echo "<tr>";
			echo "<td><b>ID</b></td>";
			echo "<td ><b>LOGIN</b></td>";
			echo "<td ><b>TREŚĆ</b></td>";
			echo "<td><b>OCENA</b></td>";
			echo "<td><b>DATA DODANIA</b></td>";
			echo "<td><b>ZATWIERDZONY</b></td>";
			echo "</tr>";
				echo "<tr>";
				echo "<td><b>".$row['id_komentarza']."</b></td>";
				echo "<td><b>".$row['login']."</b></td>";
				echo "<td>".$row['tresc_kom']."</td>";
				echo "<td>".$row['ocena']."</td>";
				echo "<td>".$row['data_dodania']."</td>";
				echo "<td>".$row['zatwierdzony']."</td>";
				echo "</tr>"; 
			echo "</table>"; 
			
			}
			//wyświetlanie nawigację przy stronnicowaniu
			if ($num_pages > 1) {
				 echo generate_page_links($cur_page, $num_pages);
			}
		} 
		else 
		{
			echo "Brak pasujących wyników";
		}
		

					
			
		if($_SESSION['stanowisko']=='Admin' || $_SESSION['stanowisko']=='Moderator')
		{	
			echo'<div id="usun_kom">
			<br><br>
			<form name="usun_komentarz" method="post" action="usun_komentarz_adm.php">
			<h3>Formularz usuwania komentarzy:</h3>
			Podaj ID komentarza, który chcesz usunąć: <br>
			<input name="Id_komentarz_usun" type="text" size="30" maxlength="3"><br>
			Podaj login użytkownika, którego komentarz chcesz usunąć (musi być zgodny z podanym wyżej ID komentarza): <br>
			<input name="Login_komentarz_usun" type="text" size="30" maxlength="30"><br>
			<br>
			<input value="Usuń komentarz" type="submit">
			</form>
			<br>
			</div>
			';
				if(isset($_SESSION['usunieto_komentarz']))
				{	
					echo $_SESSION['usunieto_komentarz'];
					unset($_SESSION['usunieto_komentarz']);
				}
				if(isset($_SESSION['puste_usun_komentarz']))
				{	
					echo $_SESSION['puste_usun_komentarz'];
					unset($_SESSION['puste_usun_komentarz']);
				}
				if(isset($_SESSION['blad_usun_komentarz']))
				{
					echo $_SESSION['blad_usun_komentarz'];
					unset($_SESSION['blad_usun_komentarz']);
				}
				if(isset($_SESSION['brak_uprawnien']))
				{
					echo $_SESSION['brak_uprawnien'];
					unset($_SESSION['brak_uprawnien']);
				}
				
				
			echo'
			<form name="szukaj_komentarz" method="post" action="komentarze2.php">
			<h3>Wyszukiwarka komentarzy użytkownika:</h3>
			Podaj login użytkownika: <br>
			<input name="login_komentarz_szukaj" type="text" size="30" maxlength="30"><br>
			<br>
			<input value="Szukaj" type="submit">
			</form>
			<br>
			';
			
			if(isset($_SESSION['puste_szukaj_komentarz']))
			{
				echo $_SESSION['puste_szukaj_komentarz'];
				unset($_SESSION['puste_szukaj_komentarz']);
			}
			if(isset($_SESSION['brak_uprawnien']))
			{
				echo $_SESSION['brak_uprawnien'];
				unset($_SESSION['brak_uprawnien']);
			}
				
				
		}
		
		
	}
	else
	{
		echo"<h2><center>Nie masz wystarczających uprawnień!!</center></h2>";
	}
		?>
						<a href="panel_admina.php#main" class="button style3 fit" data-poptrox="youtube,300x400">Powrót do panelu admina</a>
				
		</div>
	


<br><br><br><center><a href="testquiz.php" class="button style3 fit" data-poptrox="youtube,300x400">POWRÓT</a></center>
<hr>
<br>
</div>  

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
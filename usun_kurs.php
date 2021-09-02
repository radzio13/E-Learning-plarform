<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>E-learning - usuń kurs</title>
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
					

			<br>
					<h1>Panel usuwania kursu</h1>
					<h2>Jeżeli chcesz usunąć kurs, wypełnij poniższe pola i kliknij przycisk.</h2>
							
						<form method="POST" action="usun_kurs.php#main">
							Podaj ID kursu:<br><input type="text" name= "id_kursu" maxlength="3"/><br><br>
							Podaj temat kursu:<br><input type="text" name= "temat"/><br><br>
							<input type="submit" value="Usuń kurs" name="usun_kurs">
						</form>
						
					
	<?php

		require_once "laczenie.php";
		

		if (isset($_POST['usun_kurs']))
		{
			$temat = $_POST['temat'];
			$id_kursu = $_POST['id_kursu'];


		$sql = "SELECT id_lekcji FROM lekcje WHERE temat='$temat' OR id_lekcji='$id_kursu'";
		$result2 = mysqli_query($mysqli,$sql);

		if(mysqli_num_rows($result2) != 0)
		{

				if (!empty($id_kursu) && !empty($temat)) 
				{ 
					
					$query = "DELETE FROM lekcje WHERE temat='$temat' AND id_lekcji='$id_kursu'";
					
					$result2 = mysqli_query($mysqli, $query);

					 echo "Kurs został usunięty!";
				}
				else echo "Nie wpisałeś ID lub tematu kursu!";
		}
		  else echo " Podany kurs nie istnieje!";
		}

	if($_SESSION['zalogowani']==true)
	{
				
		//obliczanie danych na potrzeby stronicowania
		$cur_page = isset($_GET['page']) ? $_GET['page'] : 1;
		$results_per_page = 10; //Liczba wyników na stronę
		$skip = (($cur_page - 1) * $results_per_page); //liczba pomijanych wierszy na potrzeby stronicowania
		
		$query = "SELECT id_lekcji, temat, data_dodania FROM lekcje ORDER BY id_lekcji";
		$data = mysqli_query($mysqli, $query); //pobieramy wszystkie wiersze
		
		$total = mysqli_num_rows($data); //liczba wierszy zapisana na potrzeby stronicowania
		$num_pages = ceil($total / $results_per_page); //określenie liczby stron
		$query .=  " LIMIT $skip, $results_per_page"; //dopisujemy do wcześniejszego zapytania, klauzule LIMIT
		
		//wykonanie kwerendy
		$result = mysqli_query($mysqli, $query);

		
		if ($result->num_rows > 0) 
		{
			echo "<h2>Kursy:</h2>";
			
			echo "<table>"; 
			echo "<tr>";
			echo "<td><b>ID</b></td>";
			echo "<td><b>TEMAT</b></td>";
			echo "<td><b>DATA DODANIA</b></td>";
			echo "</tr>";
			while($row = $result->fetch_assoc()) 
			{
				echo "<tr>";
				echo "<td><b>".$row['id_lekcji']."</b></td>";
				echo "<td><b>".$row['temat']."</b></td>";
				echo "<td>".$row['data_dodania']."</td>";
				echo "</tr>"; 
			}
			echo "</table>"; 
			
			//wyświetlanie nawigację przy stronnicowaniu
			if ($num_pages > 1) {
				 echo generate_page_links($cur_page, $num_pages);
			}
			
			echo'<br><br><a href=\'panel_admina.php#main\' class="button style3 fit" data-poptrox="youtube,300x400">Powrót do panelu admina</a>';
		} 
		else 
		{
			echo "Brak pasujących wyników";
		}
				
	}
	else
	{
		echo"<h2><center>Nie masz wystarczających uprawnień!!</center></h2>";
	}
	
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
	
		?>
				
				
		</div>
	



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
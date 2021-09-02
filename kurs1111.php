<?php include "laczenie.php"; ?>
<?php session_start(); ?>
<?php
	//Create Select Query
	$query="select * from shouts order by time desc limit 100";
	$shouts = mysqli_query($con,$query);

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
	
	    <link rel="stylesheet" type="text/css" href="dist/pell.css">

    <style>


      .content1 {
        box-sizing: border-box;
        margin: 0 auto;
        max-width: 600px;
        padding: 20px;
      }

      #html-output {
        white-space: pre-wrap;
      }
    </style>
	
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
            


		<?php
	if($_SESSION['zalogowani']==true)
	{
		require_once "laczenie.php";
	
				
		$query1 = "SELECT tresc FROM kursy WHERE id_kursu = 1";
		$result1 = mysqli_query($mysqli, $query1);
		if ($result1->num_rows > 0) 
		{
			echo '<div class="thumbnails">';
			$row1 = $result1->fetch_assoc();

			echo "<table>"; 
				echo "<tr>";
				echo "<td>".$row1['tresc']."</td>";
				echo "</tr>"; 
			echo "</table>"; 
			echo '</div>';
			
		} 
		else 
		{
			echo "Brak pasujących wyników";
		}
		
		?>
		
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <div id="container">
      <header>
        <div class="container">
          <h1>Test sprawdzający</h1>
	</div>
      </header>


      <main>
<div class="container">
	     <p>Twój wynik: <?php echo $_SESSION['score']; ?></p>
		 <p><?php if($_SESSION['score'] < 2) echo'Wygląda na to, że test poszedł Ci kiepsko. Czy chcesz zmienić styl uczenia na inny?<br><a href="sluchowiec.php">Słuchowiec</a><br><a href="dzialaniowiec.php">Działaniowiec</a>'; ?></p>
	     <a href="kurs111.php?n=1" class="start">Rozwiąż test ponownie</a>
		 <?php $_SESSION['score']=0; ?>
	</div>
    </div>
		
		
		<?php
		//obliczanie danych na potrzeby stronicowania
		$cur_page = isset($_GET['page']) ? $_GET['page'] : 1;
		$results_per_page = 5; //Liczba wyników na stronę
		$skip = (($cur_page - 1) * $results_per_page); //liczba pomijanych wierszy na potrzeby stronicowania
		
		$query = "SELECT * FROM komentarze WHERE id_kursu = 1 AND zatwierdzony = 1 ORDER BY id_komentarza";
		$data = mysqli_query($mysqli, $query); //pobieramy wszystkie wiersze
			
		$total = mysqli_num_rows($data); //liczba wierszy zapisana na potrzeby stronicowania
		$num_pages = ceil($total / $results_per_page); //określenie liczby stron
		$query .=  " LIMIT $skip, $results_per_page"; //dopisujemy do wcześniejszego zapytania, klauzule LIMIT
		
		//wykonanie kwerendy
		$result = mysqli_query($mysqli, $query);
		
		$sql2  = "SELECT ocena FROM oceny WHERE id_kursu = 1";
		$result2 = $mysqli->query($sql2);
		$row2 = $result2->fetch_assoc();
		$idlekcji = 1;
		
		if ($result->num_rows > 0) 
		{
			echo "<h2>Średnia ocen: ".$row2['ocena']."</h2>";
			echo "<h2>Komentarze:</h2>";
			while($row = $result->fetch_assoc()) 
			{
			
			
			echo "<table>"; 
			echo "<tr>";
			if($_SESSION['stanowisko']=='Admin')
			{	
				echo "<td><b>ID</b></td>";
			}
			echo "<td ><b>LOGIN</b></td>";
			echo "<td ><b>TREŚĆ</b></td>";
			echo "<td><b>OCENA</b></td>";
			echo "<td ><b>DATA DODANIA</b></td>";
			echo "</tr>";
				echo "<tr>";
				if($_SESSION['stanowisko']=='Admin')
				{	
					echo "<td><b>".$row['id_komentarza']."</b></td>";
				}
				echo "<td><b>".$row['login']."</b></td>";
				echo "<td>".$row['tresc_kom']."</td>";
				echo "<td>".$row['ocena']."</td>";
				echo "<td>".$row['data_dodania']."</td>";
				echo "</tr>"; 
			echo "</table>"; 
			
			}
			//wyświetlanie nawigację przy stronnicowaniu1
			if ($num_pages > 1) {
				 echo generate_page_links($cur_page, $num_pages);
			}
			
		} 
		else 
		{
			echo "Brak pasujących wyników";
		}
		

		echo'<br><br><div id="dodaj_kom">
			<form name="dodaj_komentarz" method="post" action="dodaj_komentarz.php">
			<h3>Skomentuj lekcję:</h3>
			Treść Twojego komentarza: <br>
			<input name="Tresc" type="text" size="50" maxlength="80"><br>
			<br>
			<h3>Oceń lekcję:</h3>
			<input type="radio" name="ocena" id="1" value="1"><label for="1">1</label>
			<input type="radio" name="ocena" id="2" value="2"><label for="2">2</label>
			<input type="radio" name="ocena" id="3" value="3"><label for="3">3</label>
			<input type="radio" name="ocena" id="4" value="4"><label for="4">4</label>
			<input type="radio" name="ocena" id="5" value="5"><label for="5">5</label>
			<br>
			<span class="error"> <?php echo $ocenaErr;?></span>
			<br>
			<input value="Dodaj komentarz" type="submit">
			</form>
			<br>
			</div>
			';
			if(isset($_SESSION['dodano_komentarz']))
			{
				echo $_SESSION['dodano_komentarz'];
				unset($_SESSION['dodano_komentarz']);
			}
			if(isset($_SESSION['puste_dodaj_komentarz']))
			{
				echo $_SESSION['puste_dodaj_komentarz'];
				unset($_SESSION['puste_dodaj_komentarz']);
			}
			if(isset($_SESSION['blad_dodawania_komentarz']))
			{
				echo $_SESSION['blad_dodawania_komentarz'];
				unset($_SESSION['blad_dodawania_komentarz']);
			}
			if(isset($_SESSION['brak_uprawnien']))
			{
				echo $_SESSION['brak_uprawnien'];
				unset($_SESSION['brak_uprawnien']);
			}
			
			
			
		if($_SESSION['stanowisko']=='Admin' || $_SESSION['stanowisko']=='Moderator')
		{	
			echo'<div id="usun_kom">
			<br><br>
			<form name="usun_komentarz" method="post" action="usun_komentarz.php">
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
<?php

if($_SESSION['stanowisko']=='Admin')
{


$sql1 = "SELECT tresc FROM kursy WHERE id_kursu = 1";



    $result = $mysqli->query($sql1);


    $details = $result->fetch_array();




    $zapisanatresc = $details["tresc"];



$result1 = $mysqli->query($sql1);


echo'
<br><a href="https://htmled.it/edytor-html/" class="button style3 fit" >EDYTOR TEKSTU</a>

<div class="content1">
      <h2>EDYTOR TEKSTU</h2>
      <div id="editor" class="pell"></div>
      <div style="margin-top:20px;">
        <h3>Wyjście Text:</h3>
        <div id="text-output"></div>
      </div>
      <div style="margin-top:20px;">
        <h3>Wyjście HTML:</h3>
        <pre id="html-output"></pre>
      </div>
    </div>
'
?>

    <script src="dist/pell.js"></script>
    <script>
      var editor = window.pell.init({
        element: document.getElementById('editor'),
        defaultParagraphSeparator: 'p',
        onChange: function (html) {
          document.getElementById('text-output').innerHTML = html
          document.getElementById('html-output').textContent = html
        }
      })
    </script>
	<?php
echo'
<h3>Edytuj lekcję:</h3>

<form name="edycja_lekcji" method="post" action="kurs1.php">
       <table>
 <td><textarea rows="10" cols="50" name="zapisanatresc" > '; echo $zapisanatresc; echo' </textarea></td>
        
    
        </table>


<br/>

<form name="edycja_lekcji" method="post" action="kurs1.php">
	
			<input value="Edycja lekcji" type="submit" name="edycja_lekcji">
			</form>';


				if (isset($_POST['edycja_lekcji']))
				{

					$zapisanatresc = $_POST['zapisanatresc'];
	
							$query = "UPDATE kursy SET tresc = '$zapisanatresc' where id_kursu =1";
							$result = mysqli_query($mysqli, $query);

		
				}
}
				
				?>


<br><br><br><center><a href="wzrokowiec.php" class="button style3 fit" data-poptrox="youtube,300x400">POWRÓT</a></center>
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
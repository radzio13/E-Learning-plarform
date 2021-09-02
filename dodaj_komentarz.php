<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php
session_start();

	if($_SESSION['zalogowani']==true)
	{
		require_once "laczenie.php";
		
		$Tresc=$_POST['Tresc'];
		$Login=$_SESSION['login'];
		$ocena = $_POST['ocena'];


		if(empty($Tresc) || empty($ocena))
		{
			$_SESSION['puste_dodaj_komentarz']='<span style="color:white">Nie uzupełniłeś całego formularza!</span>';
			header('Location:kurs1.php#dodaj_kom');
		}
		else
		{
			$sql = "INSERT INTO komentarze(id_kursu, login, tresc_kom, ocena) VALUES (1, '$Login', '$Tresc', '$ocena')";
			
			if ($mysqli->query($sql) === TRUE) 
			{
				$_SESSION['dodano_komentarz']='<span style="color:white">Pomyślnie dodano komentarz!</span>'; 
				header('Location:kurs1.php#dodaj_kom');
				$sql2 = "UPDATE oceny SET ocena = (SELECT avg(ocena) FROM komentarze) WHERE id_kursu=1";
				$result = $mysqli->query($sql2);
			} 
			else 
			{
				$_SESSION['blad_dodawania_komentarz']='<span style="color:white"> Błąd dodawania komentarza! <br></span>';
				header('Location:kurs1.php#dodaj_kom');
			}
			
		}
		$mysqli->close();

	}
	else
	{
		$_SESSION['brak_uprawnien']='<span style="color:white">Nie masz wystarczających uprawnień!!</span>';
		header('Location:kurs1.php#dodaj_kom');
		
	}
?> 

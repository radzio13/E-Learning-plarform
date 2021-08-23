<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php
session_start();

	if($_SESSION['zalogowani']==true)
	{
		require_once "laczenie.php";
		$conn = new mysqli($servername, $username, $password,$dbname);
		$conn ->query("SET NAMES 'utf8'");

		if ($conn->connect_error) 
		{
			die("Błąd połączenia z bazą danych: " . $conn->connect_error);
		}
		
		$Id_komentarz_usun=$_POST['Id_komentarz_usun'];
		$Login_komentarz_usun=$_POST['Login_komentarz_usun'];


		if(empty($Id_komentarz_usun)||empty($Login_komentarz_usun))
		{
			$_SESSION['puste_usun_komentarz']='<span style="color:white">Nie wpisałeś ID i/lub loginu!</span>';
			header('Location:kurs2.php#usun_kom');
		}
		else
		{
			$sql2 = "SELECT * FROM komentarze WHERE id_komentarza='$Id_komentarz_usun' AND login='$Login_komentarz_usun'";
			
			if($rezultat_komentarz = @$conn->query($sql2))
			{
				$ile_komentarzy=$rezultat_komentarz->num_rows;
				if($ile_komentarzy>0)
				{
					$sql = "DELETE FROM komentarze WHERE id_komentarza='$Id_komentarz_usun' AND login='$Login_komentarz_usun'";
					if ($conn->query($sql) === TRUE) 
					{
						$rezultat_komentarz->free_result();
						$_SESSION['usunieto_komentarz']='<span style="color:white">Pomyślnie usunięto komentarz!</span>';
						header('Location:kurs2.php#usun_kom');
						$sql3 = "UPDATE oceny SET ocena = (SELECT avg(ocena) FROM komentarze) WHERE id_kursu=2";
						$result = $conn->query($sql3);
						die();
					} 
				}
				else 
				{
					$_SESSION['blad_usun_komentarz']='<span style="color:white"> Błąd usuwania komentarza! <br></span>';
					header('Location:kurs2.php#usun_kom');
					die();
				}
				
			}
		}
		$conn->close();

	}
	else
	{
		$_SESSION['brak_uprawnien2']='<span style="color:white">Nie masz wystarczających uprawnień!!</span>';
		header('Location:kurs2.php#usun_kom');
		
	}
?> 

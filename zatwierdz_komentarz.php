<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php
session_start();

	if($_SESSION['zalogowani']==true)
	{
		require_once "laczenie.php";
		
		$Id_komentarz_zatw=$_POST['Id_komentarz_zatw'];


		if(empty($Id_komentarz_zatw))
		{
			$_SESSION['puste_zatwierdz_komentarz']='<span style="color:white">Nie wpisałeś ID komentarza!</span>';
			header('Location:komentarze_niezatw.php#zatwierdz_kom');
		}
		else
		{
				$sql = "SELECT * FROM komentarze WHERE id_komentarza='$Id_komentarz_zatw'";
				$result = mysqli_query($mysqli,$sql);

				if(mysqli_num_rows($result) != 0)
				{
							$query = "UPDATE komentarze SET zatwierdzony = 1 WHERE id_komentarza='$Id_komentarz_zatw'";
							$result = mysqli_query($mysqli, $query);
							$_SESSION['zatwierdzono_komentarz']='<span style="color:white">Komentarz został zatwierdzony!</span>';
							header('Location:komentarze_niezatw.php#zatwierdz_kom');
							
				}
				else
				{
					$_SESSION['blad_zatwierdz_komentarz']='<span style="color:white">Podany komentarz nie istnieje!</span>';
					header('Location:komentarze_niezatw.php#zatwierdz_kom');
				} 
				
			
		}
		$mysqli->close();

	}
	else
	{
		$_SESSION['brak_uprawnien']='<span style="color:white">Nie masz wystarczających uprawnień!!</span>';
		header('Location:komentarze_niezatw.php#zatwierdz_kom');
		
	}
?> 

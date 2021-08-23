<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "zdalnykurs";

		
$mysqli = new mysqli($servername, $username, $password,$dbname);
$mysqli ->query("SET NAMES 'utf8'");

if ($mysqli->connect_error) 
{
	die("Błąd połączenia z bazą danych: " . $mysqli->connect_error);
}
?>
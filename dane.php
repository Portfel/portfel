
<?php
session_start();
require_once "polaczenie.php";


$polaczenie = new mysqli($host,$db_user,$db_password,$db_name);

$imie = $_SESSION ['imie'];
$nazwi = $_SESSION['nazwisko'];
$login = $_SESSION['login'];
$haslo = $_SESSION['haslo'];

$sql = "INSERT INTO uzytkownicy (imie, nazwisko, login, haslo) VALUES ('$imie', '$nazwi', '$login', '$haslo')";

if (!mysqli_query($polaczenie, $sql))
{
		die('nie dolaczysz');
}

$polaczenie->close();
header ('Location: index.php');
?>

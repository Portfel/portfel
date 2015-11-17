<?php
require_once "polaczenie.php";
session_start();
/*if(isset($_SESSION ["BladDlL"])) unset($_SESSION ["BladDlL"]);
if(isset($_SESSION ["BladDlH"])) unset ($_SESSION ["BladDlH"]);
if(isset($_SESSION ["BladLogin"])) unset ($_SESSION ["BladLogin"]);*/

$polaczenie = new mysqli($host,$db_user,$db_password,$db_name);

$imie = $_POST['imie'];
$nazw = $_POST['nazwisko'];
$login = $_POST['login'];
$haslo = $_POST['haslo'];
$ilosc_imie = strlen($imie);
$ilosc_nazw = strlen ($nazw);
$ilosc_login = strlen($login);
$ilosc_haslo = strlen($haslo);
$flaga = 0;

if ($ilosc_imie==0|$ilosc_nazw==0|$ilosc_login==0|$ilosc_haslo==0)
{
	$_SESSION ['BladPusto']  = "Prosze wypełnić wszystkie pola";
	$flaga =1;
	header ("Location: rejestracja.php");
}

if ($ilosc_login>10)
{
	$_SESSION ['BladDlL']  = "Zbyt długi login";
	$flaga =1;
	header ("Location: rejestracja.php");
}
	

if ($ilosc_haslo>10)
{
	$_SESSION ["BladDlH"] = "Zbyt długie hasło";
	$flaga =1;
	header ("Location: rejestracja.php");
}
	

$sql="SELECT * FROM uzytkownicy WHERE login='$login'";
if ($wynik= @$polaczenie->query($sql))
{
	$litery=$wynik->num_rows;
	if ($litery>0)
	{
		$_SESSION ["BladLogin"]  = "Login jest juz uzywany!";
		$flaga =1;
		header ('Location:rejestracja.php');
	}
		
}
$polaczenie->close();
$_SESSION ['login']=$login;
$_SESSION ['haslo']=$haslo;
$_SESSION ['imie']=$imie;
$_SESSION ['nazwisko']=$nazw;

if ($flaga==0)
{
	header ('Location:dane.php');
}
else
{
	$flaga=0;
}
?>
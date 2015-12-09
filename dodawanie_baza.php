<?php
session_start();
require_once "polaczenie.php";


$polaczenie = new mysqli($host,$db_user,$db_password,$db_name);

$id_u=$_SESSION ["id_uzyt"];
$id_k=$_SESSION ["ID_kat"];
$data=$_POST ["data"];
$kwota=$_POST["kwota"];
$miejsce=$_POST["miejsce"];
$notatka=$_POST["notatka"];


$sql = "INSERT INTO wydatki (ID_kategorii, ID_uzytkownika, data, miejsce, kwota, notatka) VALUES('$id_k','$id_u', '$data', '$miejsce', '$kwota', '$notatka')";

if (!mysqli_query($polaczenie, $sql))
{
		die('nie dolaczysz');
}

$polaczenie->close();
header ('Location: glowny.php');
?>
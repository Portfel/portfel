<!DOCTYPE HTML>
<html>
<head>
<title> rejestracja </title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<div class="glowny">
<div id="tytul"> Rejestracja do systemu </div>

<?php
session_start();
?>

<div id="formularz">
<form action="sprawdzanie_danych.php" method = "POST">
<div class="blad"> <?php if(isset($_SESSION ["BladPusto"])) {echo $_SESSION ["BladPusto"]; unset($_SESSION ["BladPusto"]);} ?> </div> 
<label>Podaj swoje imie:</label>
<input type = "text" name = "imie"/>
<label>Podaj nazwisko:</label>
<input type = "text" name = "nazwisko"/>
<label>Podaj login:</label>
<input type = "text" name = "login"/>
<div class="blad"> <?php if(isset($_SESSION ["BladDlL"])) {echo $_SESSION ["BladDlL"]; unset($_SESSION ["BladDlL"]);} ?> </div> 
<div class="blad"> <?php if(isset($_SESSION ["BladLogin"])) {echo $_SESSION ["BladLogin"]; unset($_SESSION ["BladLogin"]);} ?> </div> 
<label>Podaj hasło:</label>
<input type = "password" name = "haslo"/>
<div class="blad"> <?php if(isset($_SESSION ["BladDlH"])) {echo $_SESSION ["BladDlH"]; unset($_SESSION ["BladDlH"]);} ?> </div>
<input type = "submit" value = "Potwierdź"/>
</form>
</div>
</div>
</body>
</html>
<!DOCTYPE HTML>
<html>
<head>
<title> rejestracja </title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body style="background-color: #517d98; background-image: url(images/pieniadze.jpg); background-repeat: no-repeat">
<div style="color: #ffffff;font-family: Verdana; font-size: 20px; margin-left: 20px; margin-top: 20px;"> Zarejestruj się ... </div>
<div class="glowny">

<?php
session_start();
?>

<div id="formularz">
<form action="sprawdzanie_danych.php" method = "POST">
<div class="blad"> <?php if(isset($_SESSION ["BladPusto"])) {echo $_SESSION ["BladPusto"]; unset($_SESSION ["BladPusto"]);} ?> </div> 
<a><label>Podaj swoje imie:</label>
<input type = "text" name = "imie"/>
</a>
<a><label>Podaj nazwisko:</label>
<input type = "text" name = "nazwisko"/>
</a>
<a><label>Podaj login:</label>
<input type = "text" name = "login"/>
</a>
<div class="blad"> <?php if(isset($_SESSION ["BladDlL"])) {echo $_SESSION ["BladDlL"]; unset($_SESSION ["BladDlL"]);} ?> </div> 
<div class="blad"> <?php if(isset($_SESSION ["BladLogin"])) {echo $_SESSION ["BladLogin"]; unset($_SESSION ["BladLogin"]);} ?> </div> 
<a><label>Podaj hasło:</label>
<input type = "password" name = "haslo"/>
</a>
<div class="blad"> <?php if(isset($_SESSION ["BladDlH"])) {echo $_SESSION ["BladDlH"]; unset($_SESSION ["BladDlH"]);} ?> </div>
<input type = "submit" value = "Potwierdź"/>
</form>
</div>
</div>
</body>
</html>
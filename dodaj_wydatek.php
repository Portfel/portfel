<!DOCTYPE HTML>
<html>
<head>
<title> Wydatek </title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<div class="glowny">
<div id="tytul"> Dodaj szczegoly wydatku </div>

<?php
session_start();
?>

<div id="pojm">
<div id="formularz3">
<form action="dodawanie_baza.php" method = "POST">
<label>Data wydatku:</label>
<input type = "date" name = "data" required />
<label>Wydana kwota:</label>
<input type = "float" name = "kwota" placeholder="format zl.gr" pattern="[0-9]+.[0-9]{2}" required/>
<label>Miejsce wydatku:*</label>
<textarea name = "miejsce"></textarea> 
<label>Notatka:*</label>
<textarea name = "notatka"></textarea>
</br>
<input type = "submit" value = "Dodaj"/>
</br></br>
* - pola nieobowiazkowe
</form>
</div>
</div>
<?php
if(isset($_GET['kat'])) $kateg=$_GET['kat'];
$_SESSION ["ID_kat"]=$kateg;
?>
</div>
</body>
</html>
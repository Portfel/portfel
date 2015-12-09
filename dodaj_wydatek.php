<?php
session_start();
if(isset($_GET['kat'])) $kateg=$_GET['kat'];
$_SESSION ["ID_kat"]=$kateg;
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Szczegóły wydatku</title>
<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="css/fontello.css" type="text/css" />
</head>
<body style="background-color: #517d98; background-image: url(images/pieniadze.jpg); background-repeat: no-repeat">
	<div style="display: inline; height: 30px;">
<div style="color: #ffffff;font-family: Verdana; font-size: 20px; margin-left: 20px; margin-top: 20px;"> Dodaj szczegóły wydatku ... </div>

<div style="width: 10px; height: 10px; margin-left: 500px;">
	<i class=
	<?php 
	if($kateg==1)
	echo "icon-basket";
		if($kateg==2)
		echo "icon-glass";
			if($kateg==3)
			echo "icon-cab";
				if($kateg==4)
				echo "icon-wrench";
					if($kateg==5)
					echo "icon-dollar";
						if($kateg==6)
						echo "icon-help-circled";
	?>
	> 
	</i>
</div>
</div>

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
</body>
</html>
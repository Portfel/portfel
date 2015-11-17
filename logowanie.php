<!DOCTYPE HTML>
<html>
<head>
<title> rejestracja </title>
</head>
<body>
<?php
require_once "polaczenie.php";
session_start();
	$logi=$_POST['logi'];
	$has=$_POST['hasl'];
	
	$polacz = new mysqli($host,$db_user,$db_password,$db_name);
	if ($polacz->connect_errno!=0)
	{
		echo "Error: ".$polacz->connect_errno."Opis: ".$polacz->connect_error;
	}
	else
	{
		$sql = "SELECT * FROM uzytkownicy WHERE login='$logi'";
		if($wynik = @$polacz->query($sql))
		{
			$ilosc=$wynik->num_rows;
			
			if ($ilosc>0)
			{
				$wyn = $wynik->fetch_assoc();				
				if ($has==$wyn['haslo'])
				{
					$_SESSION ['imie']=$wyn['imie'];
					$_SESSION ['id_uzyt']=$wyn['Id_uzytkownika'];
					header ('Location: glowny.php');
				}
				else
				{
					echo "niepoprawne haslo \t";
					echo '<a href="index.html">powrot do poczatku</a>';
				}
			}
			else
			{	
				echo "niepoprawny login \t";
				echo '<a href="index.html">powrot do poczatku</a>';
			}
			
		}
		
			
		
		$polacz->close();
	}
	
	
?>
</body>
</html>
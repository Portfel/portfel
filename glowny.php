<div style="font-size: 20px; font-family: Verdana; color: #ffffff">
<?php
require_once "polaczenie.php";
session_start();
echo " Witaj ".$_SESSION ['imie']."!";	echo '<a href="index.html" style="float:right" >Wyloguj...</a>';
$identyfikator=$_SESSION ['id_uzyt'];
$polaczenie = mysqli_connect($host,$db_user,$db_password,$db_name);
if (mysqli_connect_errno())
{
echo "Błąd połączenia z bazą MySQL: " . mysqli_connect_error();
}
$result = mysqli_query($polaczenie,"SELECT kategorie.nazwa_kategorii as Kategoria, wydatki.data as Data, wydatki.miejsce as Miejsce, wydatki.kwota as Kwota, wydatki.notatka as Notatka FROM kategorie INNER JOIN wydatki ON kategorie.ID_kategorii = wydatki.ID_kategorii AND ID_uzytkownika='$identyfikator'");
$wydano = mysqli_query($polaczenie,"SELECT SUM(wydatki.kwota) FROM wydatki WHERE wydatki.ID_uzytkownika='$identyfikator'");
$wydano1=mysqli_fetch_row($wydano);
$wydano=$wydano1[0];
$zakupy = mysqli_query($polaczenie,"SELECT SUM(wydatki.kwota) FROM wydatki WHERE wydatki.ID_kategorii=1 AND wydatki.ID_uzytkownika='$identyfikator'");
$zakupy1=mysqli_fetch_row($zakupy); 
$zakupy=$zakupy1[0];
if($zakupy=== null){$zakupy=0.0;}
$rozrywka = mysqli_query($polaczenie,"SELECT SUM(wydatki.kwota) FROM wydatki WHERE wydatki.ID_kategorii=2 AND wydatki.ID_uzytkownika='$identyfikator'");
$rozrywka1=mysqli_fetch_row($rozrywka);
$rozrywka=$rozrywka1[0];
if($rozrywka=== null){$rozrywka=0.0;}
$transport = mysqli_query($polaczenie,"SELECT SUM(wydatki.kwota) FROM wydatki WHERE wydatki.ID_kategorii=3 AND wydatki.ID_uzytkownika='$identyfikator'");
$transport1=mysqli_fetch_row($transport);
$transport=$transport1[0];
if($transport=== null){$transport=0.0;}
$uslugi = mysqli_query($polaczenie,"SELECT SUM(wydatki.kwota) FROM wydatki WHERE wydatki.ID_kategorii=4 AND wydatki.ID_uzytkownika='$identyfikator'");
$uslugi1=mysqli_fetch_row($uslugi);
$uslugi=$uslugi1[0];
if($uslugi=== null){$uslugi=0.0;}
$rachunki = mysqli_query($polaczenie,"SELECT SUM(wydatki.kwota) FROM wydatki WHERE wydatki.ID_kategorii=5 AND wydatki.ID_uzytkownika='$identyfikator'");
$rachunki1=mysqli_fetch_row($rachunki);
$rachunki=$rachunki1[0];
if($rachunki=== null){$rachunki=0.0;}
$pozostale = mysqli_query($polaczenie,"SELECT SUM(wydatki.kwota) FROM wydatki WHERE wydatki.ID_kategorii=6 AND wydatki.ID_uzytkownika='$identyfikator'");
$pozostale1=mysqli_fetch_row($pozostale);
$pozostale=$pozostale1[0];
if($pozostale=== null){$pozostale=0.0;}
?>
</div>
<!DOCTYPE html> 
<html>
	<head>
		<title>Zarządzaj wydatkami</title>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
	<script src="media/js/jquery.js" type="text/javascript"></script>
	<script src="media/js/jquery.dataTables.js" type="text/javascript"></script>
	<style type="text/css">
		@import "media/css/wzor_tablicy.css"
	</style>
	<script type="text/javascript" charset="UTF-8">
		$(document).ready(function(){
			$('#datatables').dataTable({
        "language": {
            "sProcessing": "Przetwarzanie...",
            "sLengthMenu": "Pokaż _MENU_ wydatków",
            "sZeroRecords": "Nie znaleziono wydatków",
            "sInfoThousands": " ",
            "sInfo": "Wyświetlanie od _START_ do _END_ z _TOTAL_ wydatków",
            "sInfoEmpty": "Brak wydatków",
            "sInfoFiltered": "(Filtrowanie spośród _MAX_ dostępnych wydatków)",
            "sInfoPostFix": "",
            "sSearch": "Wyszukaj:",
            "sUrl": "",
            "oPaginate": {
                "sFirst": "Pierwsza",
                "sPrevious": "Poprzednia",
                "sNext": "Następna",
                "sLast": "Ostatnia"
            }
        }
    }); 
    $(function () {
    $('#container').highcharts({
        chart: {
            type: 'pie',
                backgroundColor: "rgba(255, 255, 255, 0)",
            options3d: {
                enabled: true,
                alpha: 45,
                beta: 0
            }
        },
        credits: {
    			enabled: false
  		},
        title: {
            text: ' '
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                depth: 35,
                dataLabels: {
                    enabled: true,
                    format: '{point.name}'
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Procent',
            data: [
                ['Zakupy', <?=($zakupy/$wydano)*100.0?>],
                ['Rozrywka', <?=($rozrywka/$wydano)*100.0?>],
                ['Transport', <?=($transport/$wydano)*100.0?>],
                ['Uslugi', <?=($uslugi/$wydano)*100.0?>],
                ['Rachunki', <?=($rachunki/$wydano)*100.0?>],
                ['Pozostale', <?=($pozostale/$wydano)*100.0?>],
            ]
        }]
    });
});
    })
	</script> 
	</head>
	<body style="background-color: #517d98; background-image: url(images/pieniadze.jpg); background-repeat: no-repeat">
		
		<form action="kafelek.php" method="post" style="display:inline">
			<input type="image" src="images/add.png" align="right" align="top" name="Dodaj" style="margin-right: 30px; margin-top: 145px;"/>
		</form>
		
		<div id="container" style="height: 300px; margin-right: 600px;"></div>
		<div style="width: 1200px; padding: 25px; border: 2px solid #0080BF; margin-left: 50px; background: rgba(255,255,255,0.5);">
			<table id="datatables" class="display cell-border row-border order-column">
				<thead>
					<tr>
						<th>Kategoria</th>
						<th>Data</th>
						<th>Miejsce</th>
						<th>Kwota</th>
						<th>Notatka</th>
					</tr>
					</thead>
					<tbody>
						<?php
						while($row = mysqli_fetch_array($result)){
						?>
						<tr>
							<td><?=$row['Kategoria']?></td>
							<td><?=$row['Data']?></td>
							<td><?=$row['Miejsce']?></td>
							<td><?=$row['Kwota']?> zł</td>
							<td><?=$row['Notatka']?></td>
						</tr>
						<?php
						}
						?>
					</tbody>
			</table>
		</div>
		<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-3d.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
	</body>
</html>
<?php require_once 'db.php'; ?>

<html>
<head>
<meta http-equiv="Content-type" content="text/html" charset="UTF-8"/>
<title>WMS - Historia serwisów</title>
<link rel="stylesheet" type="text/css" href="style/index.css"/>
<script>
function O(i) { return typeof i == 'object' ? i : document.getElementById(i) }
function S(i) { return O(i).style                                            }
function C(i) { return document.getElementsByClassName(i)                    }
</script>
</head>
<body>
<div id="pojemnik">
<div id="naglowek"><?php include "include/logo.html"; ?> </div>
<div id="menu">
<center>Jesteś zalogowany jako:</br>
<u>tu login</u> zaloguj/wyloguj</center>
<ul>
<li><a href="dostawy.php"><h3>Dostawy</h3></a></li><!-- link do okna z historią dostaw
	<ul>
	<li><a href="dostawa.php">Nowa dostawa</a></li>
	<li><a href="dostawca.php">Nowy dostawca</a></li>
	</ul>-->
<li><a href="serwisy.php"><h3>Serwis</h3></a></li><!-- link do okna z historią serisów-->
    <ul>
        <li><a href="serwis.php">Nowy serwis</a></li>
        <li><a href="czesci.php">Stan części</a></li>
        <li><a href="lista_czesci.php">Dostawa części</a></li>
        <li><a href="lista_dostaw_czesci.php">Historia dostaw części</a></li>
    </ul>
<li><a href="paczki.php"><h3>Paczki</h3></a></li><!-- link do okna z historią paczek
	<ul>
	<li><a href="paczka.php">Nowa przesyłka</a></li>
	<li><a href="przewoznik.php">Nowy przewoźnik</a></li>
	<li><a href="list.php">Nowy list</a></li>
	</ul>-->
</ul>
</div>
<div id="strona">
<?php
$serwisy = mysqli_query($dbcnx, 'SELECT * FROM serwis ORDER BY data DESC');
$wylicz = mysqli_query($dbcnx, 'SELECT DISTINCT(lanca) AS nr_lancy, COUNT(lanca) AS ilosc FROM serwis GROUP BY lanca HAVING ilosc > 0 ORDER BY ilosc DESC');
?>
<center>
<table border="1">
<tr><td colspan="2">Zestawienie serwisów</td></tr>
<tr><td>Nr lancy</td><td>Ilość</td></tr>
<?php
while($wylicz_wynik = mysqli_fetch_array($wylicz)){
	echo '<tr><td>'.$wylicz_wynik['nr_lancy'].'</td><td>'.$wylicz_wynik['ilosc'].'</td></tr>';
}
?>
</table></br></br></br>
<table border="1">
<tr><td colspan="7">Historia serwisów</td></tr>
<tr><td>LP</td><td>Data</td><td>Nr lancy</td><td>Producent</td><td>Nr kat</br>części</td><td>Uwagi</td><td>Akcje</td></tr>
<?php
$a=1;
while($serwisy_wynik = mysqli_fetch_array($serwisy)){
	echo '<tr><td>'.$a++.'</td><td>'.$serwisy_wynik['data'].'</td><td>'.$serwisy_wynik['lanca'].'</td><td>'.$serwisy_wynik['producent'].'</td><td>'.$serwisy_wynik['czesc'].'</td><td>'.$serwisy_wynik['uwagi'].'</td><td><img src="grafika/kolo.png"/><img src="grafika/iks.png"/></td></tr>';
}
?>
</table>
</center>
</div>
<div id="stopka">
<?php
include "include/stopka.php";
?>
</div>
</div>
</body>
</html>

<?php require_once 'db.php'; ?>
<html>
<head>
<meta http-equiv="Content-type" content="text/html" charset="UTF-8"/>
<title>WMS - Historia dostaw</title>
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
<li><a href="dostawy.php"><h3>Dostawy</h3></a></li><!-- link do okna z historią dostaw-->
	<ul>
	<li><a href="dostawa.php">Nowa dostawa</a></li>
	<li><a href="dostawca.php">Nowy dostawca</a></li>
	</ul>
<li><a href="serwisy.php"><h3>Serwis</h3></a></li><!-- link do okna z historią serisów-->
	<!--<ul>
	<li><a href="serwis.php">Nowy serwis</a></li>
	<li><a href="czesci.php">Stan części</a></li>
	<li><a href="lista_czesci.php">Dostawa części</a></li>
	</ul>-->
<li><a href="paczki.php"><h3>Paczki</h3></a></li><!-- link do okna z historią paczek-->
	<!--<ul>
	<li><a href="paczka.php">Nowa przesyłka</a></li>
	<li><a href="przewoznik.php">Nowy przewoźnik</a></li>
	<li><a href="list.php">Nowy list</a></li>
	</ul>-->
</ul>
</div>
<div id="strona">
<?php
 $dostawy = @mysqli_query($dbcnx, 'SELECT * FROM dostawa ORDER BY data DESC');
 $wylicz = @mysqli_query($dbcnx, 'SELECT DISTINCT(dostawca) AS dostawca, COUNT(dostawca) AS ilosc FROM dostawa GROUP BY dostawca HAVING ilosc > 0 ORDER BY ilosc DESC');
 if (!$dostawy || !$wylicz){exit ('<p> BŁĄD PODCZAS WYKONANIA ZAPYTANIA: '.mysql_error().' </p>');}
 ?>
<center><table border="1">
<tr><td colspan="2">Zestawienie dostaw</td></tr>
<tr><td>Dostawca</td><td>Ilość dostaw</td></tr>
<?php
while($wylicz_wynik = @mysqli_fetch_array($wylicz)){
	echo '<tr><td>'.$wylicz_wynik['dostawca'].'</td><td>'.$wylicz_wynik['ilosc'].'</td></tr>';
}
?>
</table>
</br></br></br>
<table border="1">
<tr><td colspan="4">Historia dostaw</td></tr>
<tr><td>Lp</td><td>Data</td><td>Dostawca</td><td>Akcje</td></tr>
<?php
$i=1;
while($dostawy_wynik = @mysqli_fetch_array($dostawy)){
	echo '<tr><td>'.$i++.'</td><td>'.$dostawy_wynik['data'].'</td><td>'.$dostawy_wynik['dostawca'].'</td><td> <img src="grafika/dymek.png"/><img src="grafika/kolo.png"/><img src="grafika/iks.png"/> </td></tr>';
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

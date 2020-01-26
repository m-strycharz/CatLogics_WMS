<?php require_once 'db.php'; ?>
<html>
<head>
<meta http-equiv="Content-type" content="text/html" charset="UTF-8"/>
<title>WMS - Historia przesyłek</title>
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
<li><a href="serwisy.php"><h3>Serwis</h3></a></li><!-- link do okna z historią serisów
	<ul>
	<li><a href="serwis.php">Nowy serwis</a></li>
	<li><a href="czesci.php">Stan części</a></li>
	<li><a href="lista_czesci.php">Dostawa części</a></li>
	</ul>-->
<li><a href="paczki.php"><h3>Paczki</h3></a></li><!-- link do okna z historią paczek-->
	<ul>
        <li><a href="przewoznik.php">Nowy przewoźnik</a></li>
        <li><a href="list.php">Nowy list</a></li>
	    <li><a href="paczka.php">Nowa przesyłka</a></li>
	</ul>
</ul>
</div>
<div id="strona">
<center>
<table border="1">
<tr><td colspan="6">Historia przesyłek</td></tr>
<tr><td>Lp</td><td>Data nadania</td><td>Przewoźnik</td><td>Numer listu</td><td>Odbiorca</td><td>Akcje</td></tr>
<?php
$a=1;
$paczki = mysqli_query($dbcnx, 'SELECT * FROM paczki, przewoznik WHERE paczki.przewoz=przewoznik.nazwa ORDER BY data DESC');
//$doreczyciel = mysqli_query($dbcnx, "SELECT * FROM paczki, przewoznik WHERE paczki.przewoz=przewoznik.nazwa AND paczki.id='paczki.ID'");
//$link_wynik = mysqli_fetch_array($doreczyciel);
while($paczki_wynik = mysqli_fetch_array($paczki)){
	echo '<tr><td>'.$paczki_wynik['ID'].'</td><td>'.$paczki_wynik['data'].'</td><td>'.$paczki_wynik['przewoz'].'</td><td>'.$paczki_wynik['list'].'</td><td>'.$paczki_wynik['odbiorca'].'</td><td><a href="ed_paczki.php?ID='.$paczki_wynik['ID'].'"><img src="grafika/kolo.png"/></a><a href="'.$paczki_wynik['link'].''.$paczki_wynik['list'].'" target="_blanck"><img src="grafika/lupa.png"/></a><img src="grafika/iks.png"/></td></tr>';
}

//link do szukania paczek... 
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

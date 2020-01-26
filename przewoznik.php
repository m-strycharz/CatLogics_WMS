<?php require_once 'db.php'; ?>
<html>
<head>
<meta http-equiv="Content-type" content="text/html" charset="UTF-8"/>
<title>WMS - Nowy przewoźnik</title>
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
</br></br></br><center>
<table border="1">
<form action="" method="post">
<tr><td>Nazwa</td><td><input type="text" name="przewoznik"/></td></tr>
<tr><td>Adres</td><td><input type="text" name="adres"/></td></tr>
<tr><td colspan="2"><input type="submit" value="Wyślij"/>&nbsp;&nbsp;&nbsp;<input type="reset" value="Wyczyść"/></td></tr>
</form>
</table>
</center>
<?php
@$naz=$_REQUEST['przewoznik'];
@$adr=$_REQUEST['adres'];
if($naz==NULL||$adr==NULL){
	echo '<p id="uwaga">Nie podano wszystkich wymaganych danych! Proszę uzupełnić!</p>';
}else{
	mysqli_query($dbcnx, "INSERT INTO przewoznik SET nazwa='$naz', link='$adr'");
}
?>
</div>
<div id="stopka">
<?php
include "include/stopka.php";
?>
</div>
</div>
</body>
</html>

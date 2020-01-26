<?php require_once 'db.php'; ?>
<html>
<head>
<meta http-equiv="Content-type" content="text/html" charset="UTF-8"/>
<title>WMS - Nowy list</title>
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
<?php
$prze=@mysqli_query($dbcnx, 'SELECT * FROM przewoznik ');
?>
</br></br></br><center>
<table border="1">
<form action="" method="post">
<tr><td>Przewoźnik</td><td><select name="f_przewoznik">
<?php
while($l_przew=mysqli_fetch_array($prze)){
	echo '<option>'.$l_przew['nazwa'].'</option>';
}
?>
</select></td></tr>
<tr><td>Nr listu</td><td><input type="text" name="f_list"/></td></tr>
<tr><td colspan="2"><input type="submit" value="Wyślij"/>&nbsp;&nbsp;&nbsp;<input type="reset" value="Wyczyść"/></td></tr>
</form>
</table>
</center>
<?php
@$w_przewoznik=$_REQUEST['f_przewoznik'];
@$w_list=$_REQUEST['f_list'];
if($w_list==NULL){
	echo '<p id="uwaga">Nie podano wszystkich wymaganych danych! Proszę uzupełnić!</p>';
}else{
	mysqli_query($dbcnx, "INSERT INTO listy SET nr_listu='$w_list', przewoznik='$w_przewoznik'");
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

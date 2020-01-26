<?php require_once 'db.php'; ?>
<html>
<head>
<meta http-equiv="Content-type" content="text/html" charset="UTF-8"/>
<title>WMS - Nowy serwis</title>
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
$w_czesc=$_REQUEST['czesc'];
$w_producent=$_REQUEST['prod'];

echo '<center></br></br></br></br>
<table border="1">
<form action="" method="post">
<tr><td>Data serwisu</td><td><input type="date" name="f_data"/></td></tr>
<tr><td>Producent</td><td>'.$w_producent.'</td></tr>
<tr><td>Nr lancy</td><td><input type="text" name="f_nr_lancy"/></td></tr>
<tr><td>Nr kat</br>części</td><td>'.$w_czesc.'</td></tr>
<tr><td>Uwagi</td><td><input type="text" name="f_uwagi"/></td></tr>
<tr><td colspan="2"><input type="submit" value="Dodaj serwis">&nbsp;&nbsp;&nbsp;<input type="reset"></td></tr>
</form>
</table>';
@$w_data=$_REQUEST['f_data'];
@$w_lanca=$_REQUEST['f_nr_lancy'];
@$w_uwagi=$_REQUEST['f_uwagi'];
if($w_data == NULL||$w_lanca == NULL||$w_uwagi == NULL){
	echo '<p id="uwaga"> Brak wymaganych danych! Proszę uzupełnić!';
	}else{
	mysqli_query($dbcnx, "START TRANSACTION");
	$zap1=mysqli_query($dbcnx, "INSERT INTO serwis SET data='$w_data', producent='$w_producent', lanca='$w_lanca', czesc='$w_czesc', uwagi='$w_uwagi'");
	$zap2=mysqli_query($dbcnx, "UPDATE czesci SET stan=stan-1 where kod='$w_czesc'");
	if ($zap1 and $zap2) { 
	mysqli_query($dbcnx, "COMMIT"); 
	echo 'Serwis lancy nr '.$w_lanca.' producenta '.$w_producent.' został dodany poprawnie';} 
	else { mysqli_query($dbcnx, "ROLLBACK"); }
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

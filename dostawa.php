<?php require_once 'db.php'; ?>
<html>
<head>
<meta http-equiv="Content-type" content="text/html" charset="UTF-8"/>
<title>WMS - Nowa dostawa</title>
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
$dostawca=@mysqli_query($dbcnx, 'SELECT nazwa FROM dostawca ORDER BY nazwa');
?>
</br></br></br></br></br>
<center>
<table border="1">
<form action="" method="post">
<tr><td>Data*</td><td><input type="date" name="f_data"></td></tr>
<tr><td>Dostawca*</td><td><select name="f_dostawca">
<?php
while($lista_dost=mysqli_fetch_array($dostawca)){
	echo '<option>'.$lista_dost['nazwa'].'</option>';
}
?>
</td></tr>
<tr><td>Uwagi</td><td><textarea name="f_uwagi" cols="25" rows="3" wrap="off"></textarea></td></tr>
<tr><td colspan="2"><center><input type="submit" value="Wyślij"/>&nbsp;&nbsp;&nbsp;<input type="reset" value="Wyczyść"/></td></tr>
</form>
</table>
<?php 
@$w_data=$_REQUEST['f_data'];
@$w_dostawca=$_REQUEST['f_dostawca'];
@$w_uwagi=$_REQUEST['f_uwagi'];
if ($w_data==NULL||$w_dostawca==NULL){
	echo '<p id="uwaga">Brak wymaganych danych. Proszę uzupełnić.</p>';
}else{
	@mysqli_query($dbcnx, "INSERT INTO dostawa SET data='$w_data', dostawca='$w_dostawca', uwagi='$w_uwagi'");
}
?>

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

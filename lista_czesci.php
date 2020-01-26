<?php require_once 'db.php'; ?>

<html>
<head>
<meta http-equiv="Content-type" content="text/html" charset="UTF-8"/>
<title>WMS - Dostawa części</title>
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
</br></br></br>
<center>
<table border="1">
<form action="" method="post">
    <tr><td>Data</td><td><input type="date" name="f_data"></td></tr>
<tr><td>Kod</td><td><select name="f_kod"><option>1842</option>
<option>1508</option>
<option>1004</option>
<option>1038</option>
<option>1000</option>
<option>1007</option>
<option>1028</option>
<option>1051</option>
<option>1106</option>
<option>1602</option>
<option>1515</option>
<option>1592</option>
<option>1607</option>
<option>1608</option>
<option>1609</option>
<option>1611</option>
<option>1620</option>
<option>0343-842</option>
<option>0301-508</option>
<option>0201-004</option>
<option>0110-220</option>
<option>0110-005</option>
<option>0343-300</option>
<option>0343-051</option>
<option>0343-106</option>
<option>0110-251</option>
<option>0343-028</option>
<option>0110-222</option>
<option>0314-233</option>
<option>0103-250</option>
<option>0343-302</option>
<option>0343-306</option>
<option>0343-028</option>
<option>0343-307</option>
<option>0343-308</option></select></td></tr>
<tr><td>Producent</td><td><select name="f_producent"><option>Jessberger</option><option>Lutz</option></select></td></tr>
<tr><td>Ilość</td><td><input type="text" name="f_ilosc" size="5"/></td></tr>
<tr><td colspan="2"><input type="submit" value="Dodaj"/>&nbsp;&nbsp;&nbsp;<input type="reset" value="Resetuj"/></td></tr>
<form>
</table>
</center>
<?php
@$w_kod=$_REQUEST['f_kod'];
@$w_pro=$_REQUEST['f_producent'];
@$w_ilo=$_REQUEST['f_ilosc'];
@$w_dat=$_REQUEST['f_data'];
echo $w_kod;
echo $w_pro;
echo $w_ilo;
echo $w_dat;
if($w_ilo==NULL){
	echo '<p id="uwaga">Brak wymaganych danych! Proszę uzupełnić!</p>';
}else{
    mysqli_begin_transaction($dbcnx, MYSQLI_TRANS_START_READ_WRITE);

    mysqli_query($dbcnx, "UPDATE czesci SET stan=stan+$w_ilo where kod='$w_kod'");
    mysqli_query($dbcnx, "INSERT INTO dostawa_czesci (producent,kod,ilosc,data) VALUES ('$w_pro','$w_kod','$w_ilo','$w_dat')");
    mysqli_commit($dbcnx);

    mysqli_close($dbcnx);




	
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

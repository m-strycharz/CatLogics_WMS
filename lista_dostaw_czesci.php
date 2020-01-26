<?php require_once 'db.php'; ?>

<html>
<head>
<meta http-equiv="Content-type" content="text/html" charset="UTF-8"/>
<title>WMS - Historia dostaw części</title>
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
</br>
    <center>
        <table border="1">
            <tr><th colspan="4">Historia dostaw części serwisowych</th></tr>
            <tr><td>Data</td><td>Producent</td><td>Kod</td><td>Ilość</td></tr>
            <?php
            $lista1=mysqli_query($dbcnx, 'SELECT * FROM dostawa_czesci order by data, producent');
            while($w_lista1=mysqli_fetch_array($lista1)){
                echo '<tr><td>'.$w_lista1['data'].'</td><td>'.$w_lista1['producent'].'</td><td>'.$w_lista1['kod'].'</td><td>'.$w_lista1['ilosc'].'</td></tr>';}
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

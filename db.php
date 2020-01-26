<meta http-equiv="Content-type" content="text/html" charset="UTF-8"/>
<?php
$dbcnx = @mysqli_connect("localhost", "root", "");
if (!$dbcnx) {
  exit('<p>W tej chwili nie można nawiazać ' .
      'połaczenia z serwerem bazy danych.</p>' );
}
if (!@mysqli_select_db($dbcnx, 'magazyn')) {
  exit('
  <html>
<head>
<meta http-equiv="Content-type" content="text/html" charset="UTF-8"/>
<title>WMS - strona główna</title>
<link rel="stylesheet" type="text/css" href="style/index.css"/>
</head>
<body>
<div id="pojemnik">
<div id="naglowek"><a href="index.php">nagłówek</a></div>
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
<li><a href="paczki.php"><h3>Paczki</h3></a></li><!-- link do okna z historią paczek
	<ul>
	<li><a href="paczka.php">Nowa przesyłka</a></li>
	<li><a href="przewoznik.php">Nowy przewoźnik</a></li>
	<li><a href="list.php">Nowy list</a></li>
	</ul>-->
</ul>
</div>
<div id="strona">
<center></br></br></br><p>Nie można w tej chwili zlokalizować bazy magazynu.</br>
	  Aby zainstalować system należy przejść pod <a href="index.php">TEN</a> adres.</p></center>
</div>
<div id="stopka">
<?php
include "include/stopka.php";
?>
</div>
</div>
</body>
</html>
');
}
?>
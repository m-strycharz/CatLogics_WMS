<html>
<head>
<meta http-equiv="Content-type" content="text/html" charset="UTF-8"/>
<title>WMS - strona główna</title>
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
@$dbcnx = mysqli_connect("localhost", "root", "");
if (!$dbcnx) {
  exit('<p>W tej chwili nie można nawiazać ' .
      'połaczenia z serwerem bazy danych.</p>' );
}
if (!mysqli_select_db($dbcnx, 'magazyn')) {
  echo('<p>Nie można w tej chwili ' .
      'zlokalizować bazy magazynu.</p>
<p>Czy chcesz zainstalować system?</p></br>
<form action="" method="post">
<input type="submit" name="wybor" value="TAK"/><input type="submit" name="wybor" value="NIE"/></form>');
@$wybor=$_REQUEST['wybor'];
if(@$wybor==@TAK){
mysqli_query($dbcnx, "CREATE DATABASE IF NOT EXISTS magazyn;");
mysqli_query($dbcnx, "use magazyn;");
mysqli_query($dbcnx, "create table dostawa(
ID int unsigned not null AUTO_INCREMENT primary key,
data date not null,
dostawca varchar(20),
uwagi longtext CHARACTER SET utf8 COLLATE utf8_polish_ci);");

mysqli_query($dbcnx, "create table dostawca(
ID int unsigned not null auto_increment primary key,
nazwa varchar(20) not null);");

mysqli_query($dbcnx, "create table serwis(
ID int unsigned not null auto_increment primary key,
data date not null,
producent varchar(15) not null,
lanca tinyint not null,
czesc varchar(10) not null,
uwagi longtext CHARACTER SET utf8 COLLATE utf8_polish_ci);");

mysqli_query($dbcnx, "create table czesci(
kod varchar(10) not null,
producent varchar(15),
stan int );");

mysqli_query($dbcnx, "create table dostawa_czesci(
kod varchar(10) not null,
data date not null,
producent varchar(15) not null,
ilosc int); ");

mysqli_query($dbcnx, "create table paczki(
ID int unsigned not null auto_increment primary key,
data date not null,
przewoz varchar(20) not null,
list varchar(20) not null,
odbiorca varchar(50) not null);");

mysqli_query($dbcnx, "create table przewoznik(
nazwa varchar(20) not null,
link varchar(100) not null);");

mysqli_query($dbcnx, "create table listy(
nr_listu varchar(20) not null,
przewoznik varchar(20) not null);");

mysqli_query($dbcnx, "create table uzytkownicy(
login varchar(20) not null,
haslo varchar(50) not null);");

mysqli_query($dbcnx, "INSERT INTO czesci (producent,kod,stan) VALUES
('Jessberger','1842','0'),
('Jessberger','1508','0'),
('Jessberger','1004','0'),
('Jessberger','1038','0'),
('Jessberger','4000','0'),
('Jessberger','1007','0'),
('Jessberger','4028','0'),
('Jessberger','4051','0'),
('Jessberger','4106','0'),
('Jessberger','1515','0'),
('Jessberger','4602','0'),
('Jessberger','4592','0'),
('Jessberger','4607','0'),
('Jessberger','4608','0'),
('Jessberger','4609','0'),
('Jessberger','4611','0'),
('Jessberger','1620','0'),
('Lutz','0343-842','0'),
('Lutz','0301-508','0'),
('Lutz','0201-004','0'),
('Lutz','0110-220','0'),
('Lutz','0110-005','0'),
('Lutz','0343-300','0'),
('Lutz','0343-051','0'),
('Lutz','0343-106','0'),
('Lutz','0110-251','0'),
('Lutz','0343-028','0'),
('Lutz','0110-222','0'),
('Lutz','0314-233','0'),
('Lutz','0103-250','0'),
('Lutz','0343-302','0'),
('Lutz','0343-306','0'),
('Lutz','0343-305','0'),
('Lutz','0343-307','0'),
('Lutz','0343-308','0');");

   mysqli_query( $dbcnx,"INSERT INTO przewoznik (nazwa, link) VALUES
    ('Poczta Polska', 'https://emonitoring.poczta-polska.pl/?numer=')");

	echo 'Instalacja została zakończona <a href="index.php">Powrót</a>';
	}
	if(@$wybor==@NIE){
	echo 'Instalacja systemu nieodbyła się. ';
	}
}else{
	echo'
        <center> 
            <br>
            <br>
            <br>
            <img src="https://kontaktchemoform.pl/wp-content/uploads/2019/12/chemoform300.png" alt="kontkt chemoform logo" width="150"/>
            <br>
            <br>
            <h1>KONTAKT Chemoform</h1>
            <br>
            <br>
            <br>';
            echo "Powered by CatLogics WMS &copy; 2019 - ",date("Y");
        echo '</center>';
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

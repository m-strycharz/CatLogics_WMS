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
<center>

<table><form action="" method="POST">
	<tr><td colspan="2"><select name="lanca"><option>Jessberger</option><option>Lutz</option></select></td></tr>
		<tr><td><input type="submit" value="Pokaż"/></td><td><input type="reset" value="Wyczyść"/></td></tr>
		</form></table>
		<?php 
		@$lanca=$_REQUEST['lanca'];
		switch ($lanca){
		case @Jessberger:
		echo '<img src="grafika/jessberger.png" usemap="#jessberger" align="center"/>';
		echo '<map id="jessberger" name="jessberger">
		<area shape="rect" alt="1842" title="" coords="89,3,218,76" href="n_serwis.php?czesc=1842&prod=Jessberger" target="" />
		<area shape="rect" alt="1508" title="" coords="121,89,196,126" href="n_serwis.php?czesc=1508&prod=Jessberger" target="" />
		<area shape="rect" alt="1004" title="" coords="125,134,178,170" href="n_serwis.php?czesc=1004&prod=Jessberger" target="" />
		<area shape="rect" alt="1038" title="" coords="128,179,178,260" href="n_serwis.php?czesc=1038&prod=Jessberger" target="" />
		<area shape="rect" alt="4000" title="" coords="148,263,163,276" href="n_serwis.php?czesc=4000&prod=Jessberger" target="" />
		<area shape="rect" alt="1007" title="" coords="146,280,170,510" href="n_serwis.php?czesc=1007&prod=Jessberger" target="" />
		<area shape="rect" alt="4028" title="" coords="119,512,207,631" href="n_serwis.php?czesc=4028&prod=Jessberger" target="" />
		<area shape="rect" alt="4051" title="" coords="206,523,249,578" href="n_serwis.php?czesc=4051&prod=Jessberger" target="" />
		<area shape="rect" alt="4106" title="" coords="250,499,287,543" href="n_serwis.php?czesc=4106&prod=Jessberger" target="" />
		<area shape="rect" alt="4602" title="" coords="326,298,367,634" href="n_serwis.php?czesc=4602&prod=Jessberger" target="" />
		<area shape="rect" alt="1515" title="" coords="330,2,361,294" href="n_serwis.php?czesc=1515&prod=Jessberger" target="" />
		<area shape="rect" alt="4592" title="" coords="431,3,476,396" href="n_serwis.php?czesc=4592&prod=Jessberger" target="" />
		<area shape="rect" alt="4607" title="" coords="439,400,477,492" href="n_serwis.php?czesc=4607&prod=Jessberger" target="" />
		<area shape="rect" alt="4608" title="" coords="440,499,479,521" href="n_serwis.php?czesc=4608&prod=Jessberger" target="" />
		<area shape="rect" alt="4609" title="" coords="437,527,481,583" href="n_serwis.php?czesc=4609&prod=Jessberger" target="" />
		<area shape="rect" alt="4611" title="" coords="474,617,528,677" href="n_serwis.php?czesc=4611&prod=Jessberger" target="" />
		<area shape="rect" alt="1620" title="" coords="412,634,462,666" href="n_serwis.php?czesc=1620&prod=Jessberger" target="" />
		</map>';
		break;
		case @Lutz:
		echo '<img src="grafika/lutz.png" usemap="#lutz"/>';
		echo '<map id="lutz" name="lutz">
		<area shape="rect" alt="0343-842" title="" coords="6,11,166,119" href="n_serwis.php?czesc=0343-842&prod=Lutz" target="" />
		<area shape="rect" alt="0301-508" title="" coords="52,123,130,171" href="n_serwis.php?czesc=0301-508&prod=Lutz" target="" />
		<area shape="rect" alt="0201-004" title="" coords="69,175,110,213" href="n_serwis.php?czesc=0201-004&prod=Lutz" target="" />
		<area shape="rect" alt="0110-220" title="" coords="50,218,127,285" href="n_serwis.php?czesc=0110-220&prod=Lutz" target="" />
		<area shape="rect" alt="0110-005" title="" coords="72,289,102,569" href="n_serwis.php?czesc=0110-005&prod=Lutz" target="" />
		<area shape="rect" alt="0343-300" title="" coords="47,557,139,657" href="n_serwis.php?czesc=0343-300&prod=Lutz" target="" />
		<area shape="rect" alt="0343-051" title="" coords="140,532,191,603" href="n_serwis.php?czesc=0343-051&prod=Lutz" target="" />
		<area shape="rect" alt="0343-106" title="" coords="194,507,253,573" href="n_serwis.php?czesc=0343-106&prod=Lutz" target="" />
		<area shape="rect" alt="0110-251" title="" coords="283,150,316,464" href="n_serwis.php?czesc=0110-251&prod=Lutz" target="" />
		<area shape="rect" alt="0343-028" title="" coords="286,477,320,525" href="n_serwis.php?czesc=0343-028&prod=Lutz" target="" />
		<area shape="rect" alt="0110-222" title="" coords="466,11,517,347" href="n_serwis.php?czesc=0110-222&prod=Lutz" target="" />
		<area shape="rect" alt="0314-233" title="" coords="419,361,451,379" href="n_serwis.php?czesc=0314-233&prod=Lutz" target="" />
		<area shape="rect" alt="0103-250" title="" coords="416,383,458,477" href="n_serwis.php?czesc=0103-250&prod=Lutz" target="" />
		<area shape="rect" alt="0343-302" title="" coords="468,385,514,476" href="n_serwis.php?czesc=0343-302&prod=Lutz" target="" />
		<area shape="rect" alt="0343-306" title="" coords="471,531,512,563" href="n_serwis.php?czesc=0343-306&prod=Lutz" target="" />
		<area shape="rect" alt="0343-028" title="" coords="416,534,461,568" href="n_serwis.php?czesc=0343-028&prod=Lutz" target="" />
		<area shape="rect" alt="0343-307" title="" coords="414,583,463,658" href="n_serwis.php?czesc=0343-307&prod=Lutz" target="" />
		<area shape="rect" alt="0343-308" title="" coords="469,585,517,656" href="n_serwis.php?czesc=0343-308&prod=Lutz" target="" />
		</map>';
		break;
		}?>
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

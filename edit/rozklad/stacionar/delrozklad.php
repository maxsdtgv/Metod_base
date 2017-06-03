<?php
$idr=$_GET['rozklad'];
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM rozklad where id_rozklad='$idr'");
$res = mysql_fetch_array($zapros);
echo ("Запис з наступними параметрами знищено:<br><br>");
echo ("Предмет:$res[predmet]<br>"); 
echo ("Викладач:$res[prepod1]<br>"); 
echo ("Група:$res[grupa]<br><br>"); 
echo ("<a href='rozklad.php' target='edit'>Повернутися до розкладу...</a>");
$zapros=mysql_query("DELETE FROM rozklad WHERE id_rozklad='$idr'");
mysql_close($dbcnx);
?>

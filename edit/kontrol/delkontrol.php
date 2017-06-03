<?php
$idk=$_GET['kontrol'];
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM kontrol where id_kontrol='$idk'");
$res = mysql_fetch_array($zapros);
echo ("Запис з наступними параметрами знищено:<br><br>");
echo ("Об`єкт контролю:$res[obekt]<br>"); 
echo ("Виконавець:$res[familia]<br>"); 
echo ("Н.Р.:$res[nr]<br><br>"); 
echo ("<a href='kontrol.php' target='edit'>Повернутися до переліку планів контролю...</a>");
$zapros=mysql_query("DELETE FROM kontrol WHERE id_kontrol='$idk'");
mysql_close($dbcnx);
?>
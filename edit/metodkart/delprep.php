<?php
$idp=$_GET['prep'];
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM prepod where id_prep='$idp'");
$res = mysql_fetch_array($zapros);
echo ("Запис з наступними параметрами знищено:<br><br>");
echo ("Прізвище:$res[familia]<br>"); 
echo ("Ім`я:$res[imia]<br>"); 
echo ("По-батькові:$res[otchestvo]<br><br>"); 
echo ("<a href='metodkart.php' target='edit'>Повернутися до списку викладачів.</a>");
$zapros=mysql_query("DELETE FROM prepod WHERE id_prep='$idp'");
mysql_close($dbcnx);
?>
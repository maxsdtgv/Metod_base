<?php
$idpedsov=$_GET['pedsov'];
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM pedsovet where id_pedsovet='$idpedsov'");
$res = mysql_fetch_array($zapros);
echo ("Запис з наступними параметрами знищено:<br><br>");
echo ("Постанова:$res[postanova]<br>"); 
echo ("Дата:$res[data]<br>"); 
echo ("Тема:$res[tema]<br><br>"); 
echo ("<a href='pedsovet.php' target='edit'>Повернутися до списку постанов.</a>");
$zapros=mysql_query("DELETE FROM pedsovet WHERE id_pedsovet='$idpedsov'");
mysql_close($dbcnx);
?>
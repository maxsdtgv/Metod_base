<?php
$idc=$_GET['catalog'];
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM catalog where id_catalog='$idc'");
$res = mysql_fetch_array($zapros);
echo ("Запис з наступними параметрами знищено:<br><br>");
echo ("Напрямок:$res[napr]<br>"); 
echo ("Тема:$res[tema]<br>"); 
echo ("Автор:$res[avor]<br><br>"); 
echo ("<a href='catalog.php' target='edit'>Повернутися до каталогу...</a>");
$zapros=mysql_query("DELETE FROM catalog WHERE id_catalog='$idc'");
mysql_close($dbcnx);
?>

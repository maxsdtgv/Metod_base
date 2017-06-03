<?php
$idm=$_GET['menu'];
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM menu where id_menu='$idm'");
$res = mysql_fetch_array($zapros);
echo ("Запис з наступними параметрами знищено:<br><br>");
echo ("Меню:$res[menu]<br>"); 
echo ("Підменю:$res[submenu]<br>"); 
echo ("Шлях:$res[url]<br><br>"); 
echo ("<a href='menu.php' target='edit'>Повернутися до переліку пунктів меню...</a>");
$zapros=mysql_query("DELETE FROM menu WHERE id_menu='$idm'");
mysql_close($dbcnx);
?>

<?php

session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");

$id_ob=$_GET['id_ob'];
$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM menu where id_menu='$idm'");
$res = mysql_fetch_array($zapros);
echo ("Запис знищено!");
echo ("<br><a href='start.php'>Повернутися...</a>");
$zapros=mysql_query("DELETE FROM ob WHERE id_ob='$id_ob'");
mysql_close($dbcnx);
?>

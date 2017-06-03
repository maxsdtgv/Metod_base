<?php
$idn=$_GET['normativni'];
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");

echo ("Запис знищено<br><br>");

echo ("<a href='normativni.php' target='edit'>Повернутися ...</a>");
$zapros=mysql_query("DELETE FROM normativna WHERE id_normativna='$idn'");
mysql_close($dbcnx);
?>

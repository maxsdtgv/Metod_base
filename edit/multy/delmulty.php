<?php
$idm=$_GET['multy'];
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];
$idm = $_GET['id_multy'];
$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");

echo ("<a href='multy.php' target='edit'>Повернутися до переліку ...</a>");
$zapros=mysql_query("DELETE FROM multy WHERE id_multy='$idm'");
mysql_close($dbcnx);
?>
<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.html");

$userlogin=$_SESSION['nnn'];
$userpass=$_SESSION['ppp'];
$data=$_POST['data'];
$chas=$_POST['chas'];
$zmist=$_POST['zmist'];

$dbcnx=mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros=mysql_query("INSERT INTO ob (data,chas,zmist)
VALUES ('$data','$chas','$zmist')");
mysql_close($dbcnx);
echo("<a href='start.php'>Повернутися...</a>");
?>

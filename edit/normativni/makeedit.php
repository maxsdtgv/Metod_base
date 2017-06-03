<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.html");

$userlogin=$_SESSION['nnn'];
$userpass=$_SESSION['ppp'];
$idn=$_SESSION['normativni'];

$typ=$_POST['typ'];
$nazva=$_POST['nazva'];
$registr=$_POST['registr'];
$preambula=$_POST['preambula'];
$nazvarozdilu=$_POST['nazvarozdilu'];
$pidrozdil=$_POST['pidrozdil'];
$nomernakazu=$_POST['nomernakazu'];

$dbcnx=mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros=mysql_query("UPDATE normativna SET typ='$typ',nomernakazu='$nomernakazu',nazva='$nazva',registr='$registr',
preambula='$preambula',nazvarozdilu='$nazvarozdilu',pidrozdil='$pidrozdil' WHERE id_normativna='$idn'");
mysql_close($dbcnx);
?>

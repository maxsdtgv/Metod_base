<?php

session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");
$nazvarozdilu1=$_GET['nazvarozdilu'];
$nazva1=$_GET['nazva'];
$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

#$napr=$_SESSION['napr'];
#$_SESSION['napr']=$napr;
$nazvarozdilu=urldecode($nazvarozdilu1);
$nazva=urldecode($nazva1);


$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT pidrozdil,typ FROM normativna where nazva='$nazva' AND nazvarozdilu='$nazvarozdilu'");
$res = mysql_fetch_array($zapros);
$nazva2=urlencode($nazva);
echo ("<a href=detalustanovchi.php?nazva=$nazva2 target='superblock'>Повернутися до переліку статей ...</a><br><br>");
echo ("<B>$res[typ] $nazva<br><br>");
echo ("$nazvarozdilu</B><hr>");
echo ("<PRE>$res[pidrozdil]</PRE><hr><br>");


echo ("<a href=detalustanovchi.php?nazva=$nazva2 target='superblock'>Повернутися до переліку статей ...</a><br><br>");

mysql_close($dbcnx);
?>

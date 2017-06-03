<?php

session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");
$nazva=$_GET['nazva'];
$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

#$napr=$_SESSION['napr'];
#$_SESSION['napr']=$napr;

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM normativna where nazva='$nazva'");
$res = mysql_fetch_array($zapros);

echo ("<a href='ustanovchi.php' target='superblock'>Повернутися до переліку документів...</a><br><hr>");
echo ("<CENTER><B>$res[typ]<br>");
echo ("$res[nazva]</B></CENTER><br>");
echo ("<PRE>$res[registr]</PRE><br>");
echo ("<PRE>$res[preambula]</PRE><br>");
#echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
$zapros2 = mysql_query("SELECT * FROM normativna where nazva='$nazva'");

while ($res2 = mysql_fetch_array($zapros2))
{
$nazvarozdilu=urlencode("$res2[nazvarozdilu]");
$nazva3=urlencode($nazva);
echo ("<a href=text.php?nazvarozdilu=$nazvarozdilu&nazva=$nazva3>$res2[nazvarozdilu]</a><br><br>"); 
}

echo ("<hr>Остання дата внесення змін до системи: $res[time]<br><br>");
 
#echo ("</table><br><br>");
echo ("<a href='ustanovchi.php' target='superblock'>Повернутися до переліку документів...</a>");
mysql_close($dbcnx);
?>

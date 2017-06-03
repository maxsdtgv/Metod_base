<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.html");
$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];
$prio=$_SESSION['prio'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT distinct menu FROM menu WHERE $prio='Y'");

echo ("<HTML><BODY BGCOLOR=#43D8FB><CENTER><B>Головне меню</B></CENTER>");

while ($res = mysql_fetch_array($zapros))
{
$men=urlencode("$res[menu]");
echo ("<br><br><a href=submenu.php?menu=$men target='submenu' onClick=parent.frames['superblock'].document.location='blank.htm'>$res[menu]</a>");

}

echo ("</HTML></BODY>");

mysql_close($dbcnx);
?>

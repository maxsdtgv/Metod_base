<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.html");
$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];
$prio=$_SESSION['prio'];
$men=$_GET['menu'];
$menu=urldecode($men);

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM menu WHERE menu='$menu' AND $prio='Y'");

echo ("<html><BODY BGCOLOR=#43D8FB><CENTER><B>$menu</B><br>");

while ($res = mysql_fetch_array($zapros))
{
echo ("<a href=$res[url] target='superblock'>$res[submenu]</a>");
echo (" ");
echo ("");
echo ("");
}

echo ("</CENTER></BODY></html>");

mysql_close($dbcnx);
?>

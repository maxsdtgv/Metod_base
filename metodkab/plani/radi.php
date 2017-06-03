<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");
$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];


$rad=$_GET['rada'];
$rada=urldecode($rad);
if ($_GET['rada']=='') $rada=$_SESSION['rada'];
$_SESSION['rada']=$rada;

$yyy1='';
$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM pedsovet WHERE rada='$rada' order by data desc");
echo ("<a href=plani.php>Повернутися до переліку рад ...</a><br>");
echo ("<FONT SIZE=4><CENTER>Перелік постанов $rada.</CENTER></FONT>");

echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td><B>№ п.п.</B></td><td><B>Номер<br>протоколу</B></td>");
echo ("<td><B>Дата</B></td><td><B>Тема</B></td><td><B>Детальна інформація</B></td></tr>");
$num="0";
while ($res = mysql_fetch_array($zapros))
{
$year=$res['data'];
$yyy=strtok($year,"-");
if ($yyy<>$yyy1) 
{
echo ("<tr><td><td><td><CENTER><FONT SIZE='5'>$yyy p.</FONT></CENTER></td></td></td></tr>");
$num="0";
}
$yyy1=$yyy;
echo ("<tr><td>");
$num=$num+1;
echo ("$num</td><td>");
echo ($res['protokol']);echo "</td><td>";
echo ($res['data']); echo "</td><td>";
echo ($res['tema']);echo ("</td>");
echo ("<td><a href=detalradi.php?pedsov=$res[id_pedsovet] target='superblock'>Детальніше ...</a></td>");
echo ("</tr>");

}
echo ("</table>");
echo ("<br>");
echo ("<a href=plani.php>Повернутися до переліку рад ...</a><br>");
mysql_close($dbcnx);
?>

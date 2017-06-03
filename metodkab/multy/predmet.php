<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.html");

$temp=$_GET['predmet'];
$predmet=urldecode($temp);
$temp2=urlencode($temp);
$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM multy WHERE predmet='$predmet'");

echo ("<body><a href='multy.php' target='superblock'>Повернутися до переліку мультимедійних робіт...</a><br><br>");
echo ("<FONT SIZE=4><CENTER>Мультимедійні робіт з предмету:<br><B> $predmet.</B></CENTER></FONT><br>");

echo ("<hr><TABLE width='100%' border='1'>");
#======================================================================================
echo ("<tr><td><B>№</B></td><td><B>Назви роботи.</B></td><td><B>Автор.</B></td><td><B>Детальніше.</B></td></tr>");
$zapros = mysql_query("SELECT * FROM multy where predmet='$predmet'");
$num="0";
while ($res=mysql_fetch_array($zapros))
{
$num=$num+1;

echo ("<tr><td>$num</td><td>$res[nazva]</td><td>$res[avtor]</td><td><a href=detalmulty.php?id_multy=$res[id_multy]&predmet=$temp2>Детальніше...</a></td></tr>"); 
}
#======================================================================================

echo ("</TABLE></BODY>");

mysql_close($dbcnx);
?>

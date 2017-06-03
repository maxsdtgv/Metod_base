<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.html");

$temp=$_GET['komis'];
$komis=urldecode($temp);

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM multy WHERE komis='$komis'");

echo ("<body><a href='multy.php' target='superblock'>Повернутися до переліку мультимедійних робіт...</a><br><br>");
echo ("<FONT SIZE=4><CENTER>Перелік мультимедіних робіт<br><B> $komis.</B></CENTER></FONT><br>");

echo ("<hr><TABLE width='100%'>");
#======================================================================================
echo ("<tr><td><B>Предмети.</B></td><td><B>Кількість записів.</B></td></tr>");
$zapros = mysql_query("SELECT distinct predmet FROM multy where komis='$komis'");
$num="0";
while ($res=mysql_fetch_array($zapros))
{
$num=$num+1;
$predmet=urlencode($res['predmet']);

$zapros2 = mysql_query("SELECT * FROM multy where predmet='$res[predmet]'");
$kol = mysql_num_rows($zapros2); 
echo ("<tr><td><a href=predmet.php?predmet=$predmet>$num. $res[predmet]</a></td><td>$kol</td></tr>"); 
}
#======================================================================================




echo ("</TABLE></BODY>");

mysql_close($dbcnx);
?>

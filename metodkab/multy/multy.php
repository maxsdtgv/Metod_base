<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.html");
$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];


$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT distinct komis FROM multy");
echo ("<BODY><table width='100%'>");
echo ("<tr><td><B>Каталог мультимедійних робіт по комісіях.</B></td><td><B>Кількість записів.</B></td></tr>");

$num="0";
while ($res=mysql_fetch_array($zapros))
{
$num=$num+1;
$komis=urlencode($res['komis']);

$zapros2 = mysql_query("SELECT * FROM multy where komis='$res[komis]'");
$kol = mysql_num_rows($zapros2); 
echo ("<tr><td><a href=komis.php?komis=$komis>$num. $res[komis]</a></td><td>$kol</td></tr>"); 
}
echo ("</TABLE><hr><TABLE width='100%'>");
#======================================================================================
echo ("<tr><td><B>Каталог мультимедійних робіт по предметах.</B></td><td><B>Кількість записів.</B></td></tr>");
$zapros = mysql_query("SELECT distinct predmet FROM multy");
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

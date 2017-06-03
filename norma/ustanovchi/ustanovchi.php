<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");
$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$rozdil='Установчі документи';

#if ($_GET[napr]=='') $napr=$_SESSION['napr'];

#$_SESSION['napr']=$napr;


$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT distinct(nazva) FROM normativna WHERE rozdil='$rozdil' order by binary(nazva) asc");

echo ("<FONT SIZE=4><CENTER>Перелік установчих документів.</CENTER></FONT><hr>");
echo ("<table width='100%' border='0' cellspacing='5' cellpadding='0'>");
$num="0";
while ($res = mysql_fetch_array($zapros))
{

$zapros2 = mysql_query("SELECT * FROM normativna WHERE nazva='$res[nazva]'");
$res2 = mysql_fetch_array($zapros2);

$num=$num+1;

echo ("<tr><td valign='top'>$num.</td>"); 
echo ("<td valign='top'><B></B></td><td valign='top'><B>$res2[nomernakazu]</B></td>");
$nazva=urlencode("$res2[nazva]");
echo ("<td valign='top'><a href=detalustanovchi.php?nazva=$nazva>$res2[typ] $res2[nazva]</a></td></tr>");
}
echo ("</table>");


mysql_close($dbcnx);
?>

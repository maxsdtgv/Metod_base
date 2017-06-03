<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.htm");
$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];


$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT distinct napr FROM catalog");

echo ("<BODY><CENTER><B>Каталоги методичних робіт за напрямками.</B></CENTER><br>");

$num="0";
while ($res=mysql_fetch_array($zapros))
{
$num=$num+1;
$napr=urlencode($res['napr']);
echo ("<a href=catalog.php?napr=$napr>$num. $res[napr] ...</a>"); echo ("<br><br>");
}

echo ("</BODY>");

mysql_close($dbcnx);

?>

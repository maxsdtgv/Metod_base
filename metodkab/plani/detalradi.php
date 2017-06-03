<?php
$idpedsov=$_GET['pedsov'];
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");
$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];
$rada=$_SESSION['rada'];
$_SESSION['rada']=$rada;

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM pedsovet where id_pedsovet='$idpedsov'");
$res = mysql_fetch_array($zapros);
echo ("<a href=radi.php target='superblock'>Повернутися до переліку постанов ...</a><br><br>");


echo ("<CENTER><B>$res[rada]</B></CENTER><br>"); 

echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");

echo ("<tr><td><B>Номер протоколу:</B></td>");
echo ("<td><PRE>$res[protokol]</PRE></td></tr>"); 
echo ("<tr><td><B>Дата:</B></td>");
echo ("<td><PRE>$res[data]</PRE></td></tr>"); 
echo ("<tr><td><B>Тема:</B></td>");
echo ("<td><PRE>$res[tema]</PRE></td></tr>"); 
echo ("<tr><td><B>Постанова:</B></td>");
echo ("<td><PRE>$res[postanova]</PRE></td></tr>"); 
echo ("<tr><td><B>Контроль виконання:</B></td>");
echo ("<td><PRE>$res[kontrol]</PRE></td></tr>"); 
echo ("<tr><td><B>Примітки:</B></td>");
echo ("<td><PRE>$res[primitka]</PRE></td></tr>"); 
echo ("<tr><td><B>Остання дата<br>внесення змін:</B></td>");
echo ("<td><PRE>$res[chtime]</PRE></td></tr>"); 


echo ("</table><br><br>");
echo ("<a href=radi.php target='superblock'>Повернутися до переліку постанов ...</a><br><br>");

mysql_close($dbcnx);
?>

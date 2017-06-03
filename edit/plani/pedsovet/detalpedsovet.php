<?php
$idpedsov=$_GET['pedsov'];
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM pedsovet where id_pedsovet='$idpedsov'");
$res = mysql_fetch_array($zapros);
echo ("<a href='pedsovet.php' target='edit'>Povernutisa do spisku rad ...</a><br><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td>Rada:</td>");
echo ("<td>$res[rada]</td></tr>"); 
echo ("<tr><td>Номер протоколу:</td>");
echo ("<td>$res[protokol]</td></tr>"); 
echo ("<tr><td>Дата:</td>");
echo ("<td>$res[data]</td></tr>"); 
echo ("<tr><td>Тема:</td>");
echo ("<td><PRE>$res[tema]</PRE></td></tr>"); 
echo ("<tr><td>Постанова:</td>");
echo ("<td><PRE>$res[postanova]</PRE></td></tr>"); 
echo ("<tr><td>Контроль виконання:</td>");
echo ("<td><PRE>$res[kontrol]</PRE></td></tr>"); 
echo ("<tr><td>Примітки:</td>");
echo ("<td><PRE>$res[primitka]</PRE></td></tr>"); 
echo ("<tr><td>Остання дата<br>внесення змін:</td>");
echo ("<td>$res[chtime]</td></tr>"); 


echo ("</table><br><br>");
echo ("<a href='pedsovet.php' target='edit'>Povernutisa do spisku rad ...</a>");

mysql_close($dbcnx);
?>
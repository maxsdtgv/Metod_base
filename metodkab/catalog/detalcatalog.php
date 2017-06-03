<?php

session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");
$id_catalog=$_GET['rab'];
$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$napr=$_SESSION['napr'];
$_SESSION['napr']=$napr;

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM catalog where id_catalog='$id_catalog'");
$res = mysql_fetch_array($zapros);

echo ("<a href='catalog.php' target='superblock'>Повернутися до списку робіт ...</a><br><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");

echo ("<tr><td><B>Напрямок:</B></td>");
echo ("<td>$res[napr]</td></tr>"); 
echo ("<tr><td><B>Назва:</B></td>");
echo ("<td>$res[nazva]</td></tr>"); 
echo ("<tr><td><B>Тема:</B></td>");
echo ("<td>$res[tema]</td></tr>"); 
echo ("<tr><td><B>Спеціальність:</B></td>");
echo ("<td>$res[special]</td></tr>"); 
echo ("<tr><td><B>Рік:</B></td>");
echo ("<td>$res[pik]</td></tr>"); 
echo ("<tr><td><B>Автор:</B></td>");
echo ("<td>$res[avtor]</td></tr>"); 
echo ("<tr><td><B>Видання:</B></td>");
echo ("<td><PRE>$res[vidana]</PRE></td></tr>"); 
echo ("<tr><td><B>Анотація:</B></td>");
echo ("<td><PRE>$res[anotacia]</PRE></td></tr>"); 
echo ("<tr><td><B>Примітка:</B></td>");
echo ("<td><PRE>$res[primitka]</PRE></td></tr>"); 
echo ("<tr><td><B>Остання дата<br>внесення змін:</B></td>");
echo ("<td>$res[time]</td></tr>"); 
echo ("</table><br><br>");
echo ("<a href='catalog.php' target='superblock'>Повернутися до списку робіт ...</a><br><br>");
mysql_close($dbcnx);
?>

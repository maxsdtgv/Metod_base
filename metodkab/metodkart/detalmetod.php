<?php
$idp=$_GET['prep'];
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM prepod where id_prep='$idp'");
$res = mysql_fetch_array($zapros);

echo ("<a href='metodkart.php' target='superblock'>Повернутися до списку викладачів ...</a><br><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");

echo ("<tr><td><B>Прізвище:</B></td>");
echo ("<td>$res[familia]</td></tr>"); 
echo ("<tr><td><B>Ім`я:</B></td>");
echo ("<td>$res[imia]</td></tr>"); 
echo ("<tr><td><B>По-батькові:</B></td>");
echo ("<td>$res[otchestvo]</td></tr>"); 
echo ("<tr><td><B>Рік народження:</B></td>");
echo ("<td>$res[gr]</td></tr>"); 
echo ("<tr><td><B>Освіта:</B></td>");
echo ("<td><PRE>$res[obrazov]</PRE></td></tr>"); 
echo ("<tr><td><B>Кваліфікація:</B></td>");
echo ("<td><PRE>$res[kvalif]</PRE></td></tr>"); 
echo ("<tr><td><B>Відкриті заходи:</B></td>");
echo ("<td><PRE>$res[otkrurok]</PRE></td></tr>"); 
echo ("<tr><td><B>Аттестація:</B></td>");
echo ("<td><PRE>$res[attest]</PRE></td></tr>"); 
echo ("<tr><td><B>Методичні розробки:</B></td>");
echo ("<td><PRE>$res[metodrab]</PRE></td></tr>"); 
echo ("<tr><td><B>Примітки:</B></td>");
echo ("<td><PRE>$res[primitka]</PRE></td></tr>"); 
echo ("<tr><td><B>Остання дата<br>внесення змін:</B></td>");
echo ("<td>$res[chtime]</td></tr>"); 
echo ("</table><br><br>");
echo ("<a href='metodkart.php' target='superblock'>Повернутися до списку викладачів ...</a>");
mysql_close($dbcnx);
?>

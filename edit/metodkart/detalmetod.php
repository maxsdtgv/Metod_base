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
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");

echo ("<tr><td>Прізвище:</td>");
echo ("<td>$res[familia]</td></tr>"); 
echo ("<tr><td>Ім`я:</td>");
echo ("<td>$res[imia]</td></tr>"); 
echo ("<tr><td>По-батькові:</td>");
echo ("<td>$res[otchestvo]</td></tr>"); 
echo ("<tr><td>Рік народження:</td>");
echo ("<td>$res[gr]</td></tr>"); 
echo ("<tr><td>Освіта:</td>");
echo ("<td><PRE>$res[obrazov]</PRE></td></tr>"); 
echo ("<tr><td>Кваліфікація:</td>");
echo ("<td><PRE>$res[kvalif]</PRE></td></tr>"); 
echo ("<tr><td>Відкриті заходи:</td>");
echo ("<td><PRE>$res[otkrurok]</PRE></td></tr>"); 
echo ("<tr><td>Аттестація:</td>");
echo ("<td><PRE>$res[attest]</PRE></td></tr>"); 
echo ("<tr><td>Методичні розробки:</td>");
echo ("<td><PRE>$res[metodrab]</PRE></td></tr>"); 
echo ("<tr><td>Примітки:</td>");
echo ("<td></PRE>$res[primitka]</PRE></td></tr>"); 
echo ("<tr><td>Остання дата<br>внесення змін:</td>");
echo ("<td>$res[chtime]</td></tr>"); 


echo ('</table>');

mysql_close($dbcnx);
?>
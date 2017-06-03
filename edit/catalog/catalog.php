<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM catalog");
echo ("<FONT SIZE=4><CENTER>Перелік робіт у каталогах.</CENTER></FONT><br>");
echo ("<a href='./addcataloglist.php' target='edit'>Додати роботу до каталогу...</a><br><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td>Напрямок</td><td>Назва</td><td>Тема</td>");
echo ("<td>Спеціальність</td><td>Автор</td><td>Змінити...</td><td>Знищення запису...</td></tr>");

while ($res = mysql_fetch_array($zapros))
{
echo ("<tr><td>$res[napr]</td>"); 
echo ("<td>$res[nazva]</td>");
echo ("<td>$res[tema]</td>");  
echo ("<td>$res[special]</td>");
echo ("<td>$res[avtor]</td>");
echo ("<td><a href=editcatalog.php?catalog=$res[id_catalog]>Змінити...</a></td>");
echo ("<td><a href=delcatalog.php?catalog=$res[id_catalog]>Знищити запис...</a></td>");
echo ("</tr>");
}
echo ("</table>");

mysql_close($dbcnx);
?>

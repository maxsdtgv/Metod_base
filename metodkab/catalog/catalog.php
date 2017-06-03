<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.html");
$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];


$nap=$_GET['napr'];
$napr=urldecode("$nap");

if ($_GET['napr']=='') $napr=$_SESSION['napr'];

$_SESSION['napr']=$napr;


$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM catalog WHERE napr='$napr' order by nazva asc");

echo ("<a href=napr.php>Повернутися до переліку напрямків ...</a><br><br>");
echo ("<CENTER><B>Методичні роботи з напрямку `$napr`.</B></CENTER><hr>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td><B>№ п.п.</B></td><td><B>Назва</B></td><td><B>Тема</B></td>");
echo ("<td><B>Спеціальність</B></td><td><B>Автор</B></td><td><B>Детальніше</B></td></tr>");
$num="0";
while ($res = mysql_fetch_array($zapros))
{
echo ("<tr><td>");
$num=$num+1;
print ($num);
echo ("</td>"); 
echo ("<td>$res[nazva]</td>");
echo ("<td>$res[tema]</td>");  
echo ("<td>$res[special]</td>");
echo ("<td>$res[avtor]</td>");
echo ("<td><a href=detalcatalog.php?rab=$res[id_catalog]>Детальніше...</a></td>");
echo ("</tr>");
}
echo ("</table>");

echo ("<br>");
echo ("<a href=napr.php>Повернутися до переліку напрямків ...</a><br>");
mysql_close($dbcnx);
?>

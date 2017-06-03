<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");

$zapros = mysql_query("SELECT * FROM prepod order by binary(familia) asc");
echo ("<body><CENTER><B>Список викладачів ККЗ.</B></CENTER><hr>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td><B>№ п.п.</B></td><td><B>Прізвище, ім`я, по-батькові<br>викладача</B></td>");
echo ("<td><B>Детальна інформація</B></td></tr>");
$num="0";

while ($res = mysql_fetch_array($zapros))
{
echo ("<tr><td>");
$num=$num+1;
print ($num);
echo ("</td><td>"); 
echo $res["familia"];echo " ";
echo $res["imia"]; echo " ";
echo $res["otchestvo"];
echo ("</td>");
echo ("<td><a href=detalmetod.php?prep=$res[id_prep]>Детальніше ...</a></td>");
echo ("</tr>");

}
echo ("</table></body>");

mysql_close($dbcnx);
?>

<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM ob order by data asc");
echo ("<FONT SIZE=4><CENTER>Список існуючих об`яв.</CENTER></FONT><hr>");
echo ("<a href='addoblist.php'>Додати нову об`яву ...</a><br><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td>Дата</td><td>Час</td>");
echo ("<td>Зміст</td><td>Змінити<br>інформацію</td><td>Знищення запису.</td></tr>");
$num="0";

while ($res = mysql_fetch_array($zapros))
{
echo ("<tr><td>$res[data]</td>");
echo ("<td>$res[chas]</td>"); 
echo ("<td>$res[zmist]</td>"); 
echo ("<td><a href=editob.php?id_ob=$res[id_ob]>Змінити  ...</a></td>");
echo ("<td><a href=delob.php?id_ob=$res[id_ob]>Знищити ...</a></td>");
echo ("</tr>");
}
echo ("</table>");

mysql_close($dbcnx);
?>

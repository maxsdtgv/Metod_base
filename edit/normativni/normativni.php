<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM normativna");
echo ("<FONT SIZE=4><CENTER>Документи нормативного розділу.</CENTER></FONT><br>");
echo ("<a href='./addnormativnilist.php' target='edit'>Додати нормативний документ...</a><br><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td>Розділ</td><td>Тип документу</td><td>Назва</td>");
echo ("<td>Реєстрація</td><td>Назва розділу</td>");
echo ("<td>Детальніше</td><td>Змінити</td><td>Знищити</td></tr>");

while ($res = mysql_fetch_array($zapros))
{
#$gr=urldecode($res['grupa']);
echo ("<tr><td>$res[rozdil]</td>"); 
echo ("<td>$res[typ]</td>");
echo ("<td>$res[nazva]</td>");
echo ("<td>$res[registr]</td>");
echo ("<td>$res[nazvarozdilu]</td>");
echo ("<td><a href=detalnormativni.php?normativni=$res[id_normativna]>Детал...</a></td>");
echo ("<td><a href=editnormativni.php?normativni=$res[id_normativna]>Змін...</a></td>");
echo ("<td><a href=delnormativni.php?normativni=$res[id_normativna]>Знищити...</a></td>");
echo ("</tr>");
}
echo ("</table>");

mysql_close($dbcnx);
?>

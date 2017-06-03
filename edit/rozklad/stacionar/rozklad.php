<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM rozklad");
echo ("<FONT SIZE=4><CENTER>Розклад занять (стаціонар).</CENTER></FONT><br>");
echo ("<a href='./addrozkladlist.php' target='edit'>Додати пункт розкладу...</a><br><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td>Предмет</td><td>Тижні</td><td>Викладач осн./<br>другий</td>");
echo ("<td>День тижня</td><td>Пара</td><td>Час</td><td>Група</td>");
echo ("<td>Ауд</td><td>Парність</td><td>Примітка</td><td>Змінити...</td><td>Знищити...</td></tr>");

while ($res = mysql_fetch_array($zapros))
{
$gr=urldecode($res['grupa']);
echo ("<tr><td>$res[predmet]</td>"); 
echo ("<td>$res[tizniroku]</td>");
echo ("<td>$res[prepod1]/<br>$res[prepod2]</td>");
echo ("<td>$res[dennedeli]</td>");
echo ("<td>$res[para]</td>");
echo ("<td>$res[chas]</td>");
echo ("<td>$gr</td>");
echo ("<td>$res[auditoria]</td>");
echo ("<td>$res[parnist]</td>");  
echo ("<td>$res[primitka]</td>");
echo ("<td><a href=editrozklad.php?rozklad=$res[id_rozklad]>Змінити...</a></td>");
echo ("<td><a href=delrozklad.php?rozklad=$res[id_rozklad]>Знищити запис...</a></td>");
echo ("</tr>");
}
echo ("</table>");

mysql_close($dbcnx);
?>

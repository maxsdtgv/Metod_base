<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM pedsovet order by rada asc");
echo ("<FONT SIZE=4><CENTER>Перелік постанов рад.</CENTER></FONT>");
echo ("<a href='addpedsovet.htm' target='edit'>Додати постанову ...</a><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td>№ п.п.</td><td>Rada</td><td>Номер<br>протоколу</td>");
echo ("<td>Дата</td><td>Тема</td><td>Детальна інформація</td>");
echo ("<td>Змінити</td><td>Видалити</td></tr>");
$num="0";

while ($res = mysql_fetch_array($zapros))
{
echo ("<tr><td>");
$num=$num+1;
print ($num);
echo ("</td><td>"); 
echo $res["rada"]; echo ("</td><td>"); 
echo $res["protokol"];echo ("</td><td>");
echo $res["data"]; echo ("</td><td>");
echo $res["tema"];echo ("</td>");
echo ("<td><a href=detalpedsovet.php?pedsov=$res[id_pedsovet]>Детальніше ...</a></td>");
echo ("<td><a href=editpedsovet.php?pedsov=$res[id_pedsovet]>Змінити ...</a></td>");
echo ("<td><a href=delpedsovet.php?pedsov=$res[id_pedsovet]>Видалити ...</a></td>");
echo ("</tr>");

}
echo ("</table>");

mysql_close($dbcnx);
?>
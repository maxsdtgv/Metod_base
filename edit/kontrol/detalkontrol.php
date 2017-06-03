<?php
$idk=$_GET['kontrol'];
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM kontrol where id_kontrol='$idk'");
$res = mysql_fetch_array($zapros);
echo ("<a href='kontrol.php' target='edit'>Повернутися до переліку планів контролю...</a><br><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");

echo ("<tr><td>Навчальний рік:</td>");
echo ("<td>$res[nr]</td></tr>"); 
echo ("<tr><td>Об`єкт контролю:</td>");
echo ("<td>$res[obekt]</td></tr>"); 
echo ("<tr><td>Виконавець:</td>");
echo ("<td>$res[familia]"); echo (" ");
echo ("$res[imia]"); echo (" ");
echo ("$res[otchestvo]</td></tr>"); 
echo ("<tr><td>Вересень:</td>");
echo ("<td>$res[september]</td></tr>"); 
echo ("<tr><td>Жовтень:</td>");
echo ("<td>$res[october]</td></tr>");
echo ("<tr><td>Листопад:</td>");
echo ("<td>$res[november]</td></tr>");
echo ("<tr><td>Грудень:</td>");
echo ("<td>$res[december]</td></tr>");
echo ("<tr><td>Січень:</td>");
echo ("<td>$res[jan]</td></tr>");
echo ("<tr><td>Лютий:</td>");
echo ("<td>$res[feb]</td></tr>");
echo ("<tr><td>Березень:</td>");
echo ("<td>$res[march]</td></tr>");
echo ("<tr><td>Квітень:</td>");
echo ("<td>$res[apr]</td></tr>");
echo ("<tr><td>Травень:</td>");
echo ("<td>$res[may]</td></tr>");
echo ("<tr><td>Червень:</td>");
echo ("<td>$res[june]</td></tr>");
echo ("<tr><td>Липень:</td>");
echo ("<td>$res[july]</td></tr>");
echo ("<tr><td>Серпень:</td>");
echo ("<td>$res[august]</td></tr>");


echo ("<tr><td>Фрма контролю:</td>");
echo ("<td><PRE>$res[forma]</PRE></td></tr>"); 
echo ("<tr><td>Завершення контролю:</td>");
echo ("<td><PRE>$res[zaversh]</PRE></td></tr>"); 
echo ("<tr><td>Виконання:</td>");
echo ("<td><PRE>$res[vikonan]</PRE></td></tr>"); 
echo ("<tr><td>Примітки:</td>");
echo ("<td><PRE>$res[primitka]</PRE></td></tr>"); 
echo ("<tr><td>Остання дата<br>внесення змін:</td>");
echo ("<td>$res[chtime]</td></tr>"); 


echo ('</table>');

mysql_close($dbcnx);
?>
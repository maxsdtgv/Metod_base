<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];
$obekt2 = $_GET['obekt'];
$obekt=urldecode($obekt2);

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM kontrol WHERE obekt='$obekt'");
echo ("<a href=kontrol.php target='superblock'>Повернутися до переліку планів контролю ...</a><br><br>");
echo ("<FONT SIZE=4><CENTER>Перелік планів внутрішнього контролю `$obekt`.</CENTER></FONT><br>");

echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td><B>Відповідальний</B></td><td><B>Предмет контролю</B></td><td><B>Завершення<br>контролю</B></td>");
echo ("<td><B>Термін<br>виконання</B></td><td><B>Виконання</B></td><td><B>Детальніше</B></td></tr>");

while ($res = mysql_fetch_array($zapros))
{
echo ("<tr><td valign='top'>$res[familia]"); echo (" ");
echo ("$res[imia]"); echo (" ");
echo ("$res[otchestvo]</td>");

echo ("<td valign='top'>$res[forma]</td>"); 
echo ("<td valign='top'>$res[zaversh]</td><td valign='top'>");

if ($res['september'] <> '') echo ("Вересень,$res[september];<br>");
if ($res['october'] <> '') echo ("Жовтень,$res[october];<br>");
if ($res['november'] <> '') echo ("Листопад,$res[november];<br>");
if ($res['jan'] <> '') echo ("Січень,$res[jan];<br>");
if ($res['feb'] <> '') echo ("Лютий,$res[feb];<br>");
if ($res['march'] <> '') echo ("Березень,$res[march];<br>");
if ($res['apr'] <> '') echo ("Квітень,$res[apr];<br>");
if ($res['may'] <> '') echo ("Травень,$res[may];<br>");
if ($res['june'] <> '') echo ("Червень,$res[june];<br>");
if ($res['july'] <> '') echo ("Липень,$res[july];<br>");
if ($res['august'] <> '') echo ("Серпень,$res[august];</td>");
 
echo ("<td>$res[vikonan]</td>");
echo ("<td><a href=detalobekt.php?kontrol=$res[id_kontrol]>Детальніше...</a></td>");
echo ("</tr>");
}
echo ("</table>");

mysql_close($dbcnx);
?>

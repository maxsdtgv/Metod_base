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
echo ("<a href=kontrol.php target='superblock'>����������� �� ������� ����� �������� ...</a><br><br>");
echo ("<FONT SIZE=4><CENTER>������ ����� ����������� �������� `$obekt`.</CENTER></FONT><br>");

echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td><B>³�����������</B></td><td><B>������� ��������</B></td><td><B>����������<br>��������</B></td>");
echo ("<td><B>�����<br>���������</B></td><td><B>���������</B></td><td><B>���������</B></td></tr>");

while ($res = mysql_fetch_array($zapros))
{
echo ("<tr><td valign='top'>$res[familia]"); echo (" ");
echo ("$res[imia]"); echo (" ");
echo ("$res[otchestvo]</td>");

echo ("<td valign='top'>$res[forma]</td>"); 
echo ("<td valign='top'>$res[zaversh]</td><td valign='top'>");

if ($res['september'] <> '') echo ("��������,$res[september];<br>");
if ($res['october'] <> '') echo ("�������,$res[october];<br>");
if ($res['november'] <> '') echo ("��������,$res[november];<br>");
if ($res['jan'] <> '') echo ("ѳ����,$res[jan];<br>");
if ($res['feb'] <> '') echo ("�����,$res[feb];<br>");
if ($res['march'] <> '') echo ("��������,$res[march];<br>");
if ($res['apr'] <> '') echo ("������,$res[apr];<br>");
if ($res['may'] <> '') echo ("�������,$res[may];<br>");
if ($res['june'] <> '') echo ("�������,$res[june];<br>");
if ($res['july'] <> '') echo ("������,$res[july];<br>");
if ($res['august'] <> '') echo ("�������,$res[august];</td>");
 
echo ("<td>$res[vikonan]</td>");
echo ("<td><a href=detalobekt.php?kontrol=$res[id_kontrol]>���������...</a></td>");
echo ("</tr>");
}
echo ("</table>");

mysql_close($dbcnx);
?>

<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM normativna");
echo ("<FONT SIZE=4><CENTER>��������� ������������ ������.</CENTER></FONT><br>");
echo ("<a href='./addnormativnilist.php' target='edit'>������ ����������� ��������...</a><br><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td>�����</td><td>��� ���������</td><td>�����</td>");
echo ("<td>���������</td><td>����� ������</td>");
echo ("<td>���������</td><td>������</td><td>�������</td></tr>");

while ($res = mysql_fetch_array($zapros))
{
#$gr=urldecode($res['grupa']);
echo ("<tr><td>$res[rozdil]</td>"); 
echo ("<td>$res[typ]</td>");
echo ("<td>$res[nazva]</td>");
echo ("<td>$res[registr]</td>");
echo ("<td>$res[nazvarozdilu]</td>");
echo ("<td><a href=detalnormativni.php?normativni=$res[id_normativna]>�����...</a></td>");
echo ("<td><a href=editnormativni.php?normativni=$res[id_normativna]>���...</a></td>");
echo ("<td><a href=delnormativni.php?normativni=$res[id_normativna]>�������...</a></td>");
echo ("</tr>");
}
echo ("</table>");

mysql_close($dbcnx);
?>

<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM rozklad");
echo ("<FONT SIZE=4><CENTER>������� ������ (���������).</CENTER></FONT><br>");
echo ("<a href='./addrozkladlist.php' target='edit'>������ ����� ��������...</a><br><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td>�������</td><td>����</td><td>�������� ���./<br>������</td>");
echo ("<td>���� �����</td><td>����</td><td>���</td><td>�����</td>");
echo ("<td>���</td><td>�������</td><td>�������</td><td>������...</td><td>�������...</td></tr>");

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
echo ("<td><a href=editrozklad.php?rozklad=$res[id_rozklad]>������...</a></td>");
echo ("<td><a href=delrozklad.php?rozklad=$res[id_rozklad]>������� �����...</a></td>");
echo ("</tr>");
}
echo ("</table>");

mysql_close($dbcnx);
?>

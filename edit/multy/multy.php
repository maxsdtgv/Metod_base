<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM multy");

echo ("<FONT SIZE=4><CENTER>������ ������������� ����.</CENTER></FONT><br>");
echo ("<a href='./addmulty.php' target='edit'>������ ������...</a><br><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td>�����</td><td>�������</td><td>Avtor</td><td>�����</td><td>����</td>");
echo ("<td>����������...</td><td>������...</td><td>�������� ������...</td></tr>");

while ($res = mysql_fetch_array($zapros))
{
echo ("<tr><td>$res[komis]</td>"); 
echo ("<td>$res[predmet]</td>"); 
echo ("<td>$res[avtor]</td>");
echo ("<td>$res[nazva]</td>");
echo ("<td>$res[silka]</td>");
echo ("<td><a href=detalmulty.php?id_multy=$res[id_multy]>����������...</a></td>");
echo ("<td><a href=editmulty.php?id_multy=$res[id_multy]>������...</a></td>");
echo ("<td><a href=delmulty.php?id_multy=$res[id_multy]>������� �����...</a></td>");
echo ("</tr>");
}
echo ("</table>");

mysql_close($dbcnx);
?>
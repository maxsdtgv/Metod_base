<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM ob order by data asc");
echo ("<FONT SIZE=4><CENTER>������ �������� ��`��.</CENTER></FONT><hr>");
echo ("<a href='addoblist.php'>������ ���� ��`��� ...</a><br><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td>����</td><td>���</td>");
echo ("<td>����</td><td>������<br>����������</td><td>�������� ������.</td></tr>");
$num="0";

while ($res = mysql_fetch_array($zapros))
{
echo ("<tr><td>$res[data]</td>");
echo ("<td>$res[chas]</td>"); 
echo ("<td>$res[zmist]</td>"); 
echo ("<td><a href=editob.php?id_ob=$res[id_ob]>������  ...</a></td>");
echo ("<td><a href=delob.php?id_ob=$res[id_ob]>������� ...</a></td>");
echo ("</tr>");
}
echo ("</table>");

mysql_close($dbcnx);
?>

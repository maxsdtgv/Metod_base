<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM pedsovet order by rada asc");
echo ("<FONT SIZE=4><CENTER>������ �������� ���.</CENTER></FONT>");
echo ("<a href='addpedsovet.htm' target='edit'>������ ��������� ...</a><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td>� �.�.</td><td>Rada</td><td>�����<br>���������</td>");
echo ("<td>����</td><td>����</td><td>�������� ����������</td>");
echo ("<td>������</td><td>��������</td></tr>");
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
echo ("<td><a href=detalpedsovet.php?pedsov=$res[id_pedsovet]>��������� ...</a></td>");
echo ("<td><a href=editpedsovet.php?pedsov=$res[id_pedsovet]>������ ...</a></td>");
echo ("<td><a href=delpedsovet.php?pedsov=$res[id_pedsovet]>�������� ...</a></td>");
echo ("</tr>");

}
echo ("</table>");

mysql_close($dbcnx);
?>
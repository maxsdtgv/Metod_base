<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM users order by name asc");
echo ("<FONT SIZE=4><CENTER>������ ������������.</CENTER></FONT><br>");
echo ("<a href='./adduser.htm' target='edit'>������ ����������� ...</a><br><br>");
echo ("<td><a href=logall.php>����������� ��� ����������...</a></td>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td>� �.�.</td><td>Login</td><td>�.�.�.</td><td>����������</td>");
echo ("<td>������</td><td>������</td><td>����������� ���</td><td>�������</td></tr>");
$num="0";

while ($res = mysql_fetch_array($zapros))
{
echo ("<tr><td>");
$num=$num+1;
print ($num);
echo ("</td><td>$res[name]</td><td>"); 
echo $res["familia"];echo " ";
echo $res["imia"]; echo " ";
echo $res["otchestvo"];
echo ("</td>");
echo ("<td>$res[about]</td>");
echo ("<td>$res[prio]</td>");
echo ("<td>$res[passwd]</td>");
echo ("<td><a href=log.php?name=$res[name]>��� (����������) ...</a></td>");

echo ("<td><a href=deluser.php?iduser=$res[id_user]>������� �����.</a></td>");
echo ("</tr>");
echo ("<br>");
}
echo ("</table>");

mysql_close($dbcnx);
?>

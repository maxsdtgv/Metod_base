<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM menu");
echo ("<FONT SIZE=4><CENTER>������ ������ ����.</CENTER></FONT><br>");
echo ("<a href='./addmenulist.php' target='edit'>������ ����� ����� ����...</a><br><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td>����� ����</td><td>��������� ����</td><td>����</td>");
echo ("<td>Class_0</td><td>Class_1</td><td>Class_2</td><td>Class_3</td><td>Class_4</td><td>Class_5</td>
<td>������...</td><td>�������� ������...</td></tr>");
$num="0";

while ($res = mysql_fetch_array($zapros))
{
echo ("<tr><td>$res[menu]</td>"); 
echo ("<td>$res[submenu]</td>");
echo ("<td>$res[url]</td>");  
echo ("<td>$res[class_0]</td>");
echo ("<td>$res[class_1]</td>");
echo ("<td>$res[class_2]</td>");
echo ("<td>$res[class_3]</td>");
echo ("<td>$res[class_4]</td>");
echo ("<td>$res[class_5]</td>");
echo ("<td><a href=editmenu.php?menu=$res[id_menu]>������...</a></td>");
echo ("<td><a href=delmenu.php?menu=$res[id_menu]>������� �����...</a></td>");
echo ("</tr>");
}
echo ("</table>");

mysql_close($dbcnx);
?>
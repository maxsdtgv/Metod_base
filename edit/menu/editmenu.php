<?php
$idm=$_GET['menu'];
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];
$_SESSION['id_menu']=$idm;

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM menu where id_menu='$idm'");
$res = mysql_fetch_array($zapros);
echo ("<form action=makeedit.php method=post>");
echo ("<table width='100%'>");
echo ("<tr><td>����:</td>");
echo ("<td><input type=text name=menu value='$res[menu]'></td></tr>"); 
echo ("<tr><td>ϳ�����:</td>");
echo ("<td><input type=text name=submenu value='$res[submenu]'></td></tr>"); 
echo ("<tr><td>����:</td>");
echo ("<td><input type=text name=url value='$res[url]'></td></tr>"); 

echo ("<tr><PRE><td>������ ��� ����� 0:</td><td>ĳ���� $res[class_0]</td>");
echo ("<td>������ ��: <SELECT name='class_0'>");
echo ("<OPTION value='N'>ͳ<OPTION value='Y'>������ ���������</SELECT></td></PRE></tr>"); 

echo ("<tr><PRE><td>������ ��� ����� 1:</td><td>ĳ���� $res[class_1]</td>");
echo ("<td>������ ��: <SELECT name='class_1'>");
echo ("<OPTION value='N'>ͳ<OPTION value='Y'>������ ���������</SELECT></td></PRE></tr>"); 

echo ("<tr><PRE><td>������ ��� ����� 2:</td><td>ĳ���� $res[class_2]</td>");
echo ("<td>������ ��: <SELECT name='class_2'>");
echo ("<OPTION value='N'>ͳ<OPTION value='Y'>������ ���������</SELECT></td></PRE></tr>"); 

echo ("<tr><PRE><td>������ ��� ����� 3:</td><td>ĳ���� $res[class_3]</td>");
echo ("<td>������ ��: <SELECT name='class_3'>");
echo ("<OPTION value='N'>ͳ<OPTION value='Y'>������ ���������</SELECT></td></PRE></tr>"); 

echo ("<tr><PRE><td>������ ��� ����� 4:</td><td>ĳ���� $res[class_4]</td>");
echo ("<td>������ ��: <SELECT name='class_4'>");
echo ("<OPTION value='N'>ͳ<OPTION value='Y'>������ ���������</SELECT></td></PRE></tr>"); 

echo ("<tr><PRE><td>������ ��� ����� 5:</td><td>ĳ���� $res[class_5]</td>");
echo ("<td>������ ��: <SELECT name='class_5'>");
echo ("<OPTION value='N'>ͳ<OPTION value='Y'>������ ���������</SELECT></td></PRE></tr>"); 


echo ("</table>");

echo ("<INPUT TYPE=submit value='������ ����'>"); 

mysql_close($dbcnx);
?>
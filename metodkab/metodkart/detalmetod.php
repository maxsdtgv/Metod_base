<?php
$idp=$_GET['prep'];
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM prepod where id_prep='$idp'");
$res = mysql_fetch_array($zapros);

echo ("<a href='metodkart.php' target='superblock'>����������� �� ������ ���������� ...</a><br><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");

echo ("<tr><td><B>�������:</B></td>");
echo ("<td>$res[familia]</td></tr>"); 
echo ("<tr><td><B>��`�:</B></td>");
echo ("<td>$res[imia]</td></tr>"); 
echo ("<tr><td><B>��-�������:</B></td>");
echo ("<td>$res[otchestvo]</td></tr>"); 
echo ("<tr><td><B>г� ����������:</B></td>");
echo ("<td>$res[gr]</td></tr>"); 
echo ("<tr><td><B>�����:</B></td>");
echo ("<td><PRE>$res[obrazov]</PRE></td></tr>"); 
echo ("<tr><td><B>�����������:</B></td>");
echo ("<td><PRE>$res[kvalif]</PRE></td></tr>"); 
echo ("<tr><td><B>³����� ������:</B></td>");
echo ("<td><PRE>$res[otkrurok]</PRE></td></tr>"); 
echo ("<tr><td><B>����������:</B></td>");
echo ("<td><PRE>$res[attest]</PRE></td></tr>"); 
echo ("<tr><td><B>�������� ��������:</B></td>");
echo ("<td><PRE>$res[metodrab]</PRE></td></tr>"); 
echo ("<tr><td><B>�������:</B></td>");
echo ("<td><PRE>$res[primitka]</PRE></td></tr>"); 
echo ("<tr><td><B>������� ����<br>�������� ���:</B></td>");
echo ("<td>$res[chtime]</td></tr>"); 
echo ("</table><br><br>");
echo ("<a href='metodkart.php' target='superblock'>����������� �� ������ ���������� ...</a>");
mysql_close($dbcnx);
?>

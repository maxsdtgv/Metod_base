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
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");

echo ("<tr><td>�������:</td>");
echo ("<td>$res[familia]</td></tr>"); 
echo ("<tr><td>��`�:</td>");
echo ("<td>$res[imia]</td></tr>"); 
echo ("<tr><td>��-�������:</td>");
echo ("<td>$res[otchestvo]</td></tr>"); 
echo ("<tr><td>г� ����������:</td>");
echo ("<td>$res[gr]</td></tr>"); 
echo ("<tr><td>�����:</td>");
echo ("<td><PRE>$res[obrazov]</PRE></td></tr>"); 
echo ("<tr><td>�����������:</td>");
echo ("<td><PRE>$res[kvalif]</PRE></td></tr>"); 
echo ("<tr><td>³����� ������:</td>");
echo ("<td><PRE>$res[otkrurok]</PRE></td></tr>"); 
echo ("<tr><td>����������:</td>");
echo ("<td><PRE>$res[attest]</PRE></td></tr>"); 
echo ("<tr><td>�������� ��������:</td>");
echo ("<td><PRE>$res[metodrab]</PRE></td></tr>"); 
echo ("<tr><td>�������:</td>");
echo ("<td></PRE>$res[primitka]</PRE></td></tr>"); 
echo ("<tr><td>������� ����<br>�������� ���:</td>");
echo ("<td>$res[chtime]</td></tr>"); 


echo ('</table>');

mysql_close($dbcnx);
?>
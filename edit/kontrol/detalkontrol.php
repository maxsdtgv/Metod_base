<?php
$idk=$_GET['kontrol'];
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM kontrol where id_kontrol='$idk'");
$res = mysql_fetch_array($zapros);
echo ("<a href='kontrol.php' target='edit'>����������� �� ������� ����� ��������...</a><br><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");

echo ("<tr><td>���������� ��:</td>");
echo ("<td>$res[nr]</td></tr>"); 
echo ("<tr><td>��`��� ��������:</td>");
echo ("<td>$res[obekt]</td></tr>"); 
echo ("<tr><td>����������:</td>");
echo ("<td>$res[familia]"); echo (" ");
echo ("$res[imia]"); echo (" ");
echo ("$res[otchestvo]</td></tr>"); 
echo ("<tr><td>��������:</td>");
echo ("<td>$res[september]</td></tr>"); 
echo ("<tr><td>�������:</td>");
echo ("<td>$res[october]</td></tr>");
echo ("<tr><td>��������:</td>");
echo ("<td>$res[november]</td></tr>");
echo ("<tr><td>�������:</td>");
echo ("<td>$res[december]</td></tr>");
echo ("<tr><td>ѳ����:</td>");
echo ("<td>$res[jan]</td></tr>");
echo ("<tr><td>�����:</td>");
echo ("<td>$res[feb]</td></tr>");
echo ("<tr><td>��������:</td>");
echo ("<td>$res[march]</td></tr>");
echo ("<tr><td>������:</td>");
echo ("<td>$res[apr]</td></tr>");
echo ("<tr><td>�������:</td>");
echo ("<td>$res[may]</td></tr>");
echo ("<tr><td>�������:</td>");
echo ("<td>$res[june]</td></tr>");
echo ("<tr><td>������:</td>");
echo ("<td>$res[july]</td></tr>");
echo ("<tr><td>�������:</td>");
echo ("<td>$res[august]</td></tr>");


echo ("<tr><td>���� ��������:</td>");
echo ("<td><PRE>$res[forma]</PRE></td></tr>"); 
echo ("<tr><td>���������� ��������:</td>");
echo ("<td><PRE>$res[zaversh]</PRE></td></tr>"); 
echo ("<tr><td>���������:</td>");
echo ("<td><PRE>$res[vikonan]</PRE></td></tr>"); 
echo ("<tr><td>�������:</td>");
echo ("<td><PRE>$res[primitka]</PRE></td></tr>"); 
echo ("<tr><td>������� ����<br>�������� ���:</td>");
echo ("<td>$res[chtime]</td></tr>"); 


echo ('</table>');

mysql_close($dbcnx);
?>
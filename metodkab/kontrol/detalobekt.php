<?php
$idk=$_GET['kontrol'];
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");

$mesac=$_SESSION['mesac'];
$nr=$_SESSION['nr'];

$_SESSION['mesac']=$mesac;
$_SESSION['nr']=$nr;

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];
$mesac2 = $_SESSION['mesac2'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM kontrol where id_kontrol='$idk'");
$res = mysql_fetch_array($zapros);
$bo=urlencode($res['obekt']);
echo ("<a href=obekt.php?obekt=$bo target='superblock'>����������� �� ������� ��`���� �������� `$res[obekt]`...</a><br><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");

echo ("<tr><td><B>���������� ��:</B></td>");
echo ("<td>$res[nr]</td></tr>"); 
echo ("<tr><td><B>��`��� ��������:</B></td>");
echo ("<td>$res[obekt]</td></tr>"); 
echo ("<tr><td><B>����������:</B></td>");
echo ("<td>$res[familia]"); echo (" ");
echo ("$res[imia]"); echo (" ");
echo ("$res[otchestvo]</td></tr>"); 
echo ("<tr><td><B>������ ��������:</B></td><td>");

if ($res['jan']<>'') echo("ѳ����, $res[jan]; ");
if ($res['feb']<>'') echo("�����, $res[feb]; ");
if ($res['march']<>'') echo("��������, $res[march]; ");
if ($res['apr']<>'') echo("������, $res[apr]; ");
if ($res['may']<>'') echo("�������, $res[may]; ");
if ($res['june']<>'') echo("�������, $res[june]; ");
if ($res['july']<>'') echo("������, $res[july]; ");
if ($res['august']<>'') echo("C������, $res[august]; ");
if ($res['september']<>'') echo("��������, $res[september]; ");
if ($res['october']<>'') echo("�������, $res[october]; ");
if ($res['november']<>'') echo("��������, $res[november]; ");
if ($res['december']<>'') echo("�������, $res[december]; ");






echo ("</td></tr><tr><td><B>������� ��������:</B></td>");
echo ("<td>$res[forma]</td></tr>"); 
echo ("<tr><td><B>���������� ��������:</B></td>");
echo ("<td>$res[zaversh]</td></tr>"); 
echo ("<tr><td><B>���������:</B></td>");
echo ("<td><PRE>$res[vikonan]</PRE></td></tr>"); 
echo ("<tr><td><B>�������:</B></td>");
echo ("<td><PRE>$res[primitka]</PRE></td></tr>"); 
echo ("<tr><td><B>������� ����<br>�������� ���:</B></td>");
echo ("<td>$res[time]</td></tr>"); 


echo ('</table>');

mysql_close($dbcnx);
?>

<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");
$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$predmet=$_GET[predmet];
#$prepodd=urlencode($prepod);

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
#$zapros4 = mysql_query("SELECT * FROM rozklad WHERE prepod='$prepod'");
#$res4 = mysql_fetch_array($zapros4);
echo ("<a href=rozklad.php>����������� �� ������ �������� ...</a><br>");
echo ("<FONT SIZE=4><CENTER><B>������� ������ � �������� $predmet.</B></CENTER></FONT><hr>");
#========================================================================================
$denn='��������';
$zapros = mysql_query("SELECT * FROM rozklad WHERE predmet='$predmet' AND dennedeli='$denn' order by para asc");
$res1 = mysql_fetch_array($zapros);
if ($res1[para]<>'') {
echo ("<FONT SIZE=4><B>$denn</B></FONT><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td><B>����</B></td><td><B>���</B></td><td><B>�������</B></td><td><B>���������</B></td><td><B>�����</B></td><td><B>������ ����</B>");
echo ("</td><td><B>���</B></td><td><B>�������</B></td></tr>");
$zapros = mysql_query("SELECT * FROM rozklad WHERE predmet='$predmet' AND dennedeli='$denn' order by para asc");
while ($res2 = mysql_fetch_array($zapros))
{
$gru=urldecode($res2[grupa]);
echo ("<tr><td>$res2[para]</td><td>$res2[chas]</td><td>$res2[parnist]</td><td>$res2[prepod1]/$res2[prepod2]</td><td>$gru</td><td>$res2[tizniroku]
</td><td>$res2[auditoria]</td><td>$res2[primitka]</td></tr>");
}
echo ("</table><br><br>");}
#==========================================================================================
#========================================================================================
$denn='³������';
$zapros = mysql_query("SELECT * FROM rozklad WHERE predmet='$predmet' AND dennedeli='$denn' order by para asc");
$res1 = mysql_fetch_array($zapros);
if ($res1[para]<>'') {
echo ("<FONT SIZE=4><B>$denn</B></FONT><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td><B>����</B></td><td><B>���</B></td><td><B>�������</B></td><td><B>���������</B></td><td><B>�����</B></td><td><B>������ ����</B>");
echo ("</td><td><B>���</B></td><td><B>�������</B></td></tr>");
$zapros = mysql_query("SELECT * FROM rozklad WHERE predmet='$predmet' AND dennedeli='$denn' order by para asc");
while ($res2 = mysql_fetch_array($zapros))
{
$gru=urldecode($res2[grupa]);
echo ("<tr><td>$res2[para]</td><td>$res2[chas]</td><td>$res2[parnist]</td><td>$res2[prepod1]/$res2[prepod2]</td><td>$gru</td><td>$res2[tizniroku]
</td><td>$res2[auditoria]</td><td>$res2[primitka]</td></tr>");
}
echo ("</table><br><br>");}
#==========================================================================================
#========================================================================================
$denn='������';
$zapros = mysql_query("SELECT * FROM rozklad WHERE predmet='$predmet' AND dennedeli='$denn' order by para asc");
$res1 = mysql_fetch_array($zapros);
if ($res1[para]<>'') {
echo ("<FONT SIZE=4><B>$denn</B></FONT><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td><B>����</B></td><td><B>���</B></td><td><B>�������</B></td><td><B>���������</B></td><td><B>�����</B></td><td><B>������ ����</B>");
echo ("</td><td><B>���</B></td><td><B>�������</B></td></tr>");
$zapros = mysql_query("SELECT * FROM rozklad WHERE predmet='$predmet' AND dennedeli='$denn' order by para asc");
while ($res2 = mysql_fetch_array($zapros))
{
$gru=urldecode($res2[grupa]);
echo ("<tr><td>$res2[para]</td><td>$res2[chas]</td><td>$res2[parnist]</td><td>$res2[prepod1]/$res2[prepod2]</td><td>$gru</td><td>$res2[tizniroku]
</td><td>$res2[auditoria]</td><td>$res2[primitka]</td></tr>");
}
echo ("</table><br><br>");}
#==========================================================================================
#========================================================================================
$denn='������';
$zapros = mysql_query("SELECT * FROM rozklad WHERE predmet='$predmet' AND dennedeli='$denn' order by para asc");
$res1 = mysql_fetch_array($zapros);
if ($res1[para]<>'') {
echo ("<FONT SIZE=4><B>$denn</B></FONT><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td><B>����</B></td><td><B>���</B></td><td><B>�������</B></td><td><B>���������</B></td><td><B>�����</B></td><td><B>������ ����</B>");
echo ("</td><td><B>���</B></td><td><B>�������</B></td></tr>");
$zapros = mysql_query("SELECT * FROM rozklad WHERE predmet='$predmet' AND dennedeli='$denn' order by para asc");
while ($res2 = mysql_fetch_array($zapros))
{
$gru=urldecode($res2[grupa]);
echo ("<tr><td>$res2[para]</td><td>$res2[chas]</td><td>$res2[parnist]</td><td>$res2[prepod1]/$res2[prepod2]</td><td>$gru</td><td>$res2[tizniroku]
</td><td>$res2[auditoria]</td><td>$res2[primitka]</td></tr>");
}
echo ("</table><br><br>");}
#==========================================================================================#========================================================================================
$denn='�`������';
$zapros = mysql_query("SELECT * FROM rozklad WHERE predmet='$predmet' AND dennedeli='$denn' order by para asc");
$res1 = mysql_fetch_array($zapros);
if ($res1[para]<>'') {
echo ("<FONT SIZE=4><B>$denn</B></FONT><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td><B>����</B></td><td><B>���</B></td><td><B>�������</B></td><td><B>���������</B></td><td><B>�����</B></td><td><B>������ ����</B>");
echo ("</td><td><B>���</B></td><td><B>�������</B></td></tr>");
$zapros = mysql_query("SELECT * FROM rozklad WHERE predmet='$predmet' AND dennedeli='$denn' order by para asc");
while ($res2 = mysql_fetch_array($zapros))
{
$gru=urldecode($res2[grupa]);
echo ("<tr><td>$res2[para]</td><td>$res2[chas]</td><td>$res2[parnist]</td><td>$res2[prepod1]/$res2[prepod2]</td><td>$gru</td><td>$res2[tizniroku]
</td><td>$res2[auditoria]</td><td>$res2[primitka]</td></tr>");
}
echo ("</table><br><br>");}
#==========================================================================================
#========================================================================================
$denn='������';
$zapros = mysql_query("SELECT * FROM rozklad WHERE predmet='$predmet' AND dennedeli='$denn' order by para asc");
$res1 = mysql_fetch_array($zapros);
if ($res1[para]<>'') {
echo ("<FONT SIZE=4><B>$denn</B></FONT><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td><B>����</B></td><td><B>���</B></td><td><B>�������</B></td><td><B>���������</B></td><td><B>�����</B></td><td><B>������ ����</B>");
echo ("</td><td><B>���</B></td><td><B>�������</B></td></tr>");
$zapros = mysql_query("SELECT * FROM rozklad WHERE predmet='$predmet' AND dennedeli='$denn' order by para asc");
while ($res2 = mysql_fetch_array($zapros))
{
$gru=urldecode($res2[grupa]);
echo ("<tr><td>$res2[para]</td><td>$res2[chas]</td><td>$res2[parnist]</td><td>$res2[prepod1]/$res2[prepod2]</td><td>$gru</td><td>$res2[tizniroku]
</td><td>$res2[auditoria]</td><td>$res2[primitka]</td></tr>");
}
echo ("</table><br><br>");}
#==========================================================================================#========================================================================================
$denn='�����';
$zapros = mysql_query("SELECT * FROM rozklad WHERE predmet='$predmet' AND dennedeli='$denn' order by para asc");
$res1 = mysql_fetch_array($zapros);
if ($res1[para]<>'') {
echo ("<FONT SIZE=4><B>$denn</B></FONT><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td><B>����</B></td><td><B>���</B></td><td><B>�������</B></td><td><B>���������</B></td><td><B>�����</B></td><td><B>������ ����</B>");
echo ("</td><td><B>���</B></td><td><B>�������</B></td></tr>");
$zapros = mysql_query("SELECT * FROM rozklad WHERE predmet='$predmet' AND dennedeli='$denn' order by para asc");
while ($res2 = mysql_fetch_array($zapros))
{
$gru=urldecode($res2[grupa]);
echo ("<tr><td>$res2[para]</td><td>$res2[chas]</td><td>$res2[parnist]</td><td>$res2[prepod1]/$res2[prepod2]</td><td>$gru</td><td>$res2[tizniroku]
</td><td>$res2[auditoria]</td><td>$res2[primitka]</td></tr>");
}
echo ("</table><br><br>");}
#==========================================================================================
echo ("<a href=rozklad.php>����������� �� ������ �������� ...</a><br>");
mysql_close($dbcnx);
?>

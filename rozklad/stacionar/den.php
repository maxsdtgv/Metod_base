<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");
$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];
$denn=$_GET[dennedeli];
$den=urldecode($denn);
$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");

$zapros = mysql_query("SELECT distinct(grupa),tizniroku FROM rozklad WHERE dennedeli='$den' order by grupa asc");

echo ("<a href=rozklad.php>����������� �� ������ �������� ...</a><br>");
echo ("<FONT SIZE=4><CENTER><B>������� ������ �� $den.</B></CENTER></FONT><hr>");

while ($res = mysql_fetch_array($zapros))
{
$gruppa = urldecode($res[grupa]);
echo ("����� <B>$gruppa</B>, ������ ���� $res[tizniroku]");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");

echo ("<tr><td><B>����</B></td><td><B>���</B></td><td><B>�������</B></td><td><B>�������</B></td><td><B>���������</B>
</td><td><B>���</B></td><td><B>�������</B></td></tr>");

$zapros2 = mysql_query("SELECT * FROM rozklad WHERE grupa='$res[grupa]' AND dennedeli='$den' order by para asc");
while ($res2 = mysql_fetch_array($zapros2))
{
#echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");

echo ("<tr><td>$res2[para]</td><td>$res2[chas]</td><td>$res2[parnist]</td><td>$res2[predmet]</td><td>$res2[prepod1]/$res2[prepod2]
</td><td>$res2[auditoria]</td><td>$res2[primitka]</td></tr>");
#echo ("</table><br><br>");
}
echo ("</table><br>");
}

echo ("<br>");
echo ("<a href=rozklad.php>����������� �� ������ �������� ...</a><br>");
mysql_close($dbcnx);
?>

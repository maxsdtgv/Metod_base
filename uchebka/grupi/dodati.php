<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$type = $_GET['type'];
$_SESSION['type'] = $type;

echo ("<html>");
echo ("<form action=add.php method=post>");
#===============================================================================
if ($type == 'predmet') {
echo ("<CENTER><P><FONT SIZE=6>������ ���������� ��� ����� �������:</FONT></CENTER>");
echo ("<br>");
echo ("����� ������ ��������:<input type=text name=new><br>");
echo ("�������:<TEXTAREA name=prim rows='3' cols='50'></TEXTAREA><br>");
echo ("<input type=submit value=������ ���������� ��� ����� �������>");
}
#===============================================================================
if ($type == 'grupa') {
echo ("<CENTER><P><FONT SIZE=6>������ ���������� ��� ���� �����:</FONT></CENTER>");
echo ("<br><br>");
echo ("����� ���� �����:<input type=text name=new><br>");
echo ("ʳ������ ����������� ����:<input type=text name=platni><br>");
echo ("ʳ������ ��������� ����:<input type=text name=budget><br>");
echo ("�������:<TEXTAREA name=prim rows='3' cols='50'></TEXTAREA><br>");
echo ("<input type=submit value=������ ���������� ��� ���� �����>");
}
#===============================================================================

echo ("</form>");
echo ("</html>");

mysql_close($dbcnx);
?>
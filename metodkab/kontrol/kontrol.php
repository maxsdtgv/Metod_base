<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.htm");
$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];
$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");

$zapros = mysql_query("SELECT distinct nr FROM kontrol");
echo ("<a href='/baza/metodkab/plani/plani.php' target='superblock'>����������� �� �����...</a><br><br>");
echo ("<BODY><CENTER><FONT SIZE='4'>����� ����������� ��������.</FONT></CENTER><br><hr>");


while ($res=mysql_fetch_array($zapros))
{
echo ("<CENTER><B><U>$res[nr] ���������� ��.</U></B></CENTER><br>");
#==============================================================================================
echo ("<B>��������� �� ������ ����</B><br><br>");
echo ("<a href=mesac.php?mesac=september&nr=$res[nr] target='superblock'>��������</a> ");
echo ("<a href=mesac.php?mesac=october&nr=$res[nr] target='superblock'>�������</a> ");
echo ("<a href=mesac.php?mesac=november&nr=$res[nr] target='superblock'>��������</a> ");
echo ("<a href=mesac.php?mesac=december&nr=$res[nr] target='superblock'>�������</a> ");
echo ("<a href=mesac.php?mesac=jan&nr=$res[nr] target='superblock'>ѳ����</a> ");
echo ("<a href=mesac.php?mesac=feb&nr=$res[nr] target='superblock'>�����</a> ");
echo ("<a href=mesac.php?mesac=march&nr=$res[nr] target='superblock'>��������</a> ");
echo ("<a href=mesac.php?mesac=apr&nr=$res[nr] target='superblock'>������</a> ");
echo ("<a href=mesac.php?mesac=may&nr=$res[nr] target='superblock'>�������</a> ");
echo ("<a href=mesac.php?mesac=june&nr=$res[nr] target='superblock'>�������</a> ");
echo ("<a href=mesac.php?mesac=july&nr=$res[nr] target='superblock'>������</a> ");
echo ("<a href=mesac.php?mesac=august&nr=$res[nr] target='superblock'>�������</a><br><br>");

#==============================================================================================
echo ("<B>��`���� ��������</B>");
$zapros2 = mysql_query("SELECT distinct obekt FROM kontrol WHERE nr='$res[nr]'");
$num="0";
while ($res2=mysql_fetch_array($zapros2))
{
$num=$num+1;
$obekt=urlencode($res2['obekt']);
echo ("<br><br><a href=obekt.php?obekt=$obekt target='superblock'>$num. $res2[obekt]</a>");
}
#===============================================================================================
echo ("<br><hr>");
}

echo ("</BODY>");
mysql_close($dbcnx);
?>



<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.htm");
$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];
$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");

echo ("<BODY><CENTER><FONT SIZE='4'>������� ������ (���������).</FONT></CENTER><hr>");

#==============================================================================================
echo ("<B>������� �� ���� �����.</B><br>");
$q1=urlencode('��������');
$q2=urlencode('³������');
$q3=urlencode('������');
$q4=urlencode('������');
$q5=urlencode('�`������');
$q6=urlencode('������');
$q7=urlencode('�����');
echo ("<a href=den.php?dennedeli=$q1 target='superblock'>��������</a> ");
echo ("<a href=den.php?dennedeli=$q2 target='superblock'>³������</a> ");
echo ("<a href=den.php?dennedeli=$q3 target='superblock'>������</a> ");
echo ("<a href=den.php?dennedeli=$q4 target='superblock'>������</a> ");
echo ("<a href=den.php?dennedeli=$q5 target='superblock'>�`������</a> ");
echo ("<a href=den.php?dennedeli=$q6 target='superblock'>������</a> ");
echo ("<a href=den.php?dennedeli=$q7 target='superblock'>�����</a> ");
echo ("<br><hr>");
#==============================================================================================
#==============================================================================================
echo ("<B>������� �� ������.</B><br>");
$zapros = mysql_query("SELECT DISTINCT grupa FROM rozklad order by grupa asc");
while ($res3=mysql_fetch_array($zapros))
{
$den3=urldecode($res3['grupa']);
echo ("<a href=grupa.php?grupa=$res3[grupa] target='superblock'>$den3</a> ");
}
echo ("<br><hr>");
#==============================================================================================
#==============================================================================================
echo ("<B>������� �� ��������.</B><br>");
$zapros = mysql_query("SELECT distinct auditoria FROM rozklad order by auditoria asc");
while ($res2=mysql_fetch_array($zapros))
{
$den2=urlencode($res2['auditoria']);
echo ("<a href=aud.php?auditoria=$den2 target='superblock'>$res2[auditoria]</a> ");
}
echo ("<br><hr>");
#==============================================================================================

echo ("<table width='100%' border='0' cellspacing='0' cellpadding='0'>");
#==============================================================================================
echo ("<tr><td valign='top'>");
echo ("<B>������� �� ����������.</B><br>");
$zapros = mysql_query("SELECT distinct prepod1 FROM rozklad order by binary(prepod1) asc");
while ($res2=mysql_fetch_array($zapros))
{
$prep1=urlencode($res2['prepod1']);
echo ("<a href=prep.php?prepod=$prep1 target='superblock'>$res2[prepod1]</a><br> ");
}
echo ("</td><td valign='top'>");
#==============================================================================================
echo ("<B>������� �� ���������.</B><br>");
$zapros = mysql_query("SELECT distinct predmet FROM rozklad order by binary(predmet) asc");
$num='0';
while ($res3=mysql_fetch_array($zapros))
{
$num=$num+1;
$predmet=urlencode($res3['predmet']);
echo ("<a href=predmet.php?predmet=$predmet target='superblock'>$num. $res3[predmet]</a><br> ");
}

echo ("</td></tr></table>");
echo ("<hr>");
#==============================================================================================
echo ("</BODY>");
mysql_close($dbcnx);
?>



<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.htm");
$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];
$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");

echo ("<BODY><CENTER><FONT SIZE='4'>Розклад занять (стаціонар).</FONT></CENTER><hr>");

#==============================================================================================
echo ("<B>Розклад за днем тижня.</B><br>");
$q1=urlencode('Понеділок');
$q2=urlencode('Вівторок');
$q3=urlencode('Середа');
$q4=urlencode('Четвер');
$q5=urlencode('П`ятниця');
$q6=urlencode('Субота');
$q7=urlencode('Неділя');
echo ("<a href=den.php?dennedeli=$q1 target='superblock'>Понеділок</a> ");
echo ("<a href=den.php?dennedeli=$q2 target='superblock'>Вівторок</a> ");
echo ("<a href=den.php?dennedeli=$q3 target='superblock'>Середа</a> ");
echo ("<a href=den.php?dennedeli=$q4 target='superblock'>Четвер</a> ");
echo ("<a href=den.php?dennedeli=$q5 target='superblock'>П`ятниця</a> ");
echo ("<a href=den.php?dennedeli=$q6 target='superblock'>Субота</a> ");
echo ("<a href=den.php?dennedeli=$q7 target='superblock'>Неділя</a> ");
echo ("<br><hr>");
#==============================================================================================
#==============================================================================================
echo ("<B>Розклад за групою.</B><br>");
$zapros = mysql_query("SELECT DISTINCT grupa FROM rozklad order by grupa asc");
while ($res3=mysql_fetch_array($zapros))
{
$den3=urldecode($res3['grupa']);
echo ("<a href=grupa.php?grupa=$res3[grupa] target='superblock'>$den3</a> ");
}
echo ("<br><hr>");
#==============================================================================================
#==============================================================================================
echo ("<B>Розклад за аудиторією.</B><br>");
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
echo ("<B>Розклад за викладачем.</B><br>");
$zapros = mysql_query("SELECT distinct prepod1 FROM rozklad order by binary(prepod1) asc");
while ($res2=mysql_fetch_array($zapros))
{
$prep1=urlencode($res2['prepod1']);
echo ("<a href=prep.php?prepod=$prep1 target='superblock'>$res2[prepod1]</a><br> ");
}
echo ("</td><td valign='top'>");
#==============================================================================================
echo ("<B>Розклад за предметом.</B><br>");
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



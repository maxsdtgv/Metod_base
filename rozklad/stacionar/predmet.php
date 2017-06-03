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
echo ("<a href=rozklad.php>Повернутися до вибору розкладу ...</a><br>");
echo ("<FONT SIZE=4><CENTER><B>Розклад занять з предмету $predmet.</B></CENTER></FONT><hr>");
#========================================================================================
$denn='Понеділок';
$zapros = mysql_query("SELECT * FROM rozklad WHERE predmet='$predmet' AND dennedeli='$denn' order by para asc");
$res1 = mysql_fetch_array($zapros);
if ($res1[para]<>'') {
echo ("<FONT SIZE=4><B>$denn</B></FONT><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td><B>Пара</B></td><td><B>Час</B></td><td><B>Парність</B></td><td><B>Викладачі</B></td><td><B>Група</B></td><td><B>Робочі тижні</B>");
echo ("</td><td><B>Ауд</B></td><td><B>Примітки</B></td></tr>");
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
$denn='Вівторок';
$zapros = mysql_query("SELECT * FROM rozklad WHERE predmet='$predmet' AND dennedeli='$denn' order by para asc");
$res1 = mysql_fetch_array($zapros);
if ($res1[para]<>'') {
echo ("<FONT SIZE=4><B>$denn</B></FONT><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td><B>Пара</B></td><td><B>Час</B></td><td><B>Парність</B></td><td><B>Викладачі</B></td><td><B>Група</B></td><td><B>Робочі тижні</B>");
echo ("</td><td><B>Ауд</B></td><td><B>Примітки</B></td></tr>");
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
$denn='Середа';
$zapros = mysql_query("SELECT * FROM rozklad WHERE predmet='$predmet' AND dennedeli='$denn' order by para asc");
$res1 = mysql_fetch_array($zapros);
if ($res1[para]<>'') {
echo ("<FONT SIZE=4><B>$denn</B></FONT><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td><B>Пара</B></td><td><B>Час</B></td><td><B>Парність</B></td><td><B>Викладачі</B></td><td><B>Група</B></td><td><B>Робочі тижні</B>");
echo ("</td><td><B>Ауд</B></td><td><B>Примітки</B></td></tr>");
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
$denn='Четвер';
$zapros = mysql_query("SELECT * FROM rozklad WHERE predmet='$predmet' AND dennedeli='$denn' order by para asc");
$res1 = mysql_fetch_array($zapros);
if ($res1[para]<>'') {
echo ("<FONT SIZE=4><B>$denn</B></FONT><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td><B>Пара</B></td><td><B>Час</B></td><td><B>Парність</B></td><td><B>Викладачі</B></td><td><B>Група</B></td><td><B>Робочі тижні</B>");
echo ("</td><td><B>Ауд</B></td><td><B>Примітки</B></td></tr>");
$zapros = mysql_query("SELECT * FROM rozklad WHERE predmet='$predmet' AND dennedeli='$denn' order by para asc");
while ($res2 = mysql_fetch_array($zapros))
{
$gru=urldecode($res2[grupa]);
echo ("<tr><td>$res2[para]</td><td>$res2[chas]</td><td>$res2[parnist]</td><td>$res2[prepod1]/$res2[prepod2]</td><td>$gru</td><td>$res2[tizniroku]
</td><td>$res2[auditoria]</td><td>$res2[primitka]</td></tr>");
}
echo ("</table><br><br>");}
#==========================================================================================#========================================================================================
$denn='П`ятниця';
$zapros = mysql_query("SELECT * FROM rozklad WHERE predmet='$predmet' AND dennedeli='$denn' order by para asc");
$res1 = mysql_fetch_array($zapros);
if ($res1[para]<>'') {
echo ("<FONT SIZE=4><B>$denn</B></FONT><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td><B>Пара</B></td><td><B>Час</B></td><td><B>Парність</B></td><td><B>Викладачі</B></td><td><B>Група</B></td><td><B>Робочі тижні</B>");
echo ("</td><td><B>Ауд</B></td><td><B>Примітки</B></td></tr>");
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
$denn='Субота';
$zapros = mysql_query("SELECT * FROM rozklad WHERE predmet='$predmet' AND dennedeli='$denn' order by para asc");
$res1 = mysql_fetch_array($zapros);
if ($res1[para]<>'') {
echo ("<FONT SIZE=4><B>$denn</B></FONT><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td><B>Пара</B></td><td><B>Час</B></td><td><B>Парність</B></td><td><B>Викладачі</B></td><td><B>Група</B></td><td><B>Робочі тижні</B>");
echo ("</td><td><B>Ауд</B></td><td><B>Примітки</B></td></tr>");
$zapros = mysql_query("SELECT * FROM rozklad WHERE predmet='$predmet' AND dennedeli='$denn' order by para asc");
while ($res2 = mysql_fetch_array($zapros))
{
$gru=urldecode($res2[grupa]);
echo ("<tr><td>$res2[para]</td><td>$res2[chas]</td><td>$res2[parnist]</td><td>$res2[prepod1]/$res2[prepod2]</td><td>$gru</td><td>$res2[tizniroku]
</td><td>$res2[auditoria]</td><td>$res2[primitka]</td></tr>");
}
echo ("</table><br><br>");}
#==========================================================================================#========================================================================================
$denn='Неділя';
$zapros = mysql_query("SELECT * FROM rozklad WHERE predmet='$predmet' AND dennedeli='$denn' order by para asc");
$res1 = mysql_fetch_array($zapros);
if ($res1[para]<>'') {
echo ("<FONT SIZE=4><B>$denn</B></FONT><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td><B>Пара</B></td><td><B>Час</B></td><td><B>Парність</B></td><td><B>Викладачі</B></td><td><B>Група</B></td><td><B>Робочі тижні</B>");
echo ("</td><td><B>Ауд</B></td><td><B>Примітки</B></td></tr>");
$zapros = mysql_query("SELECT * FROM rozklad WHERE predmet='$predmet' AND dennedeli='$denn' order by para asc");
while ($res2 = mysql_fetch_array($zapros))
{
$gru=urldecode($res2[grupa]);
echo ("<tr><td>$res2[para]</td><td>$res2[chas]</td><td>$res2[parnist]</td><td>$res2[prepod1]/$res2[prepod2]</td><td>$gru</td><td>$res2[tizniroku]
</td><td>$res2[auditoria]</td><td>$res2[primitka]</td></tr>");
}
echo ("</table><br><br>");}
#==========================================================================================
echo ("<a href=rozklad.php>Повернутися до вибору розкладу ...</a><br>");
mysql_close($dbcnx);
?>

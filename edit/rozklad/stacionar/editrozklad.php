<?php

session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.php");
$idr=$_GET['rozklad'];
$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];
$_SESSION['id_rozklad']=$idr;

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");


$zapros = mysql_query("SELECT * FROM rozklad where id_rozklad='$idr'");
$res = mysql_fetch_array($zapros);
echo ("<form action=makeedit.php method=post>");
echo ("<CENTER><B>Редагування запису.</B></CENTER>");
echo ("<table width='100%'>");
#======================================================================================================
echo ("<tr><td>Предмет:</td><td><input type=text name=newpredmet value='$res[predmet]'></td>");
echo ("<td>Існуючий предмет:</td><td><SELECT name=oldpredmet>");

$zapros = mysql_query("SELECT distinct predmet FROM rozklad");
while ($res2 = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res2[predmet]'>$res2[predmet]"); 
}
echo("</SELECT></td></tr>");
#========================================================================================================
echo ("<tr><td>Тижні року:</td><td><input type=text name=newtizniroku value='$res[tizniroku]'></td>");
echo ("<td>Існуючі тижні року:</td><td><SELECT name=oldtizniroku>");
$zapros = mysql_query("SELECT distinct tizniroku FROM rozklad");
while ($res2 = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res2[tizniroku]'>$res2[tizniroku]"); 
}
echo("</SELECT></td></tr>");
#========================================================================================================
echo ("<tr><td>Основний викладач:</td><td><input type=text name=newprepod1 value='$res[prepod1]'></td>");
echo ("<td>Існуючі основні викладачі:</td><td><SELECT name=oldprepod1>");
$zapros = mysql_query("SELECT distinct prepod1 FROM rozklad");
while ($res2 = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res2[prepod1]'>$res2[prepod1]"); 
}
echo("</SELECT></td></tr>");
#========================================================================================================
echo ("<tr><td>Другий викладач:</td><td><input type=text name=newprepod2 value='$res[prepod2]'></td>");
echo ("<td>Існуючі другі викладачі:</td><td><SELECT name=oldprepod2>");
$zapros = mysql_query("SELECT distinct prepod2 FROM rozklad");
while ($res2 = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res2[prepod2]'>$res2[prepod2]"); 
}
echo("</SELECT></td></tr>");
#========================================================================================================
echo ("<tr><td>День тижня:</td><td><input type=text name=newdennedeli value='$res[dennedeli]'></td>"); 
echo ("<td>Існуюча спеціальність:</td><td><SELECT name=olddennedeli>"); 
$zapros = mysql_query("SELECT distinct dennedeli FROM rozklad");
while ($res3 = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res3[dennedeli]'>$res3[dennedeli]"); 
}
echo ("</SELECT></td></tr>"); 
#==========================================================================================================
echo ("<tr><td>Пара:</td><td><input type=text name=newpara value='$res[para]'></td>"); 
echo ("<td>Існуючі пари:</td><td><SELECT name=oldpara>"); 
$zapros = mysql_query("SELECT distinct para FROM rozklad");
while ($res3 = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res3[para]'>$res3[para]"); 
}
echo ("</SELECT></td></tr>"); 
#==========================================================================================================
echo ("<tr><td>Час:</td><td><input type=text name=newchas value='$res[chas]'></td>"); 
echo ("<td>Існуючий час:</td><td><SELECT name=oldchas>"); 
$zapros = mysql_query("SELECT distinct chas FROM rozklad");
while ($res3 = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res3[chas]'>$res3[chas]"); 
}
echo ("</SELECT></td></tr>"); 
#==========================================================================================================
$gr=urldecode($res['grupa']);
echo ("<tr><td>Група:</td><td><input type=text name=newgrupa value='$gr'></td>"); 
echo ("<td>Існуючі групи:</td><td><SELECT name=oldgrupa>"); 
$zapros = mysql_query("SELECT distinct grupa FROM rozklad");
while ($res3 = mysql_fetch_array($zapros))
{
$gr=urldecode($res3['grupa']);
echo ("<OPTION value='$gr'>$gr"); 
}
echo ("</SELECT></td></tr>"); 
#==========================================================================================================
echo ("<tr><td>Аудиторія:</td><td><input type=text name=newauditoria value='$res[auditoria]'></td>"); 
echo ("<td>Існуючі аудиторії:</td><td><SELECT name=oldauditoria>"); 
$zapros = mysql_query("SELECT distinct auditoria FROM rozklad");
while ($res3 = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res3[auditoria]'>$res3[auditoria]"); 
}
echo ("</SELECT></td></tr>"); 
#==========================================================================================================
echo ("<tr><td>Парність:</td><td><input type=text name=newparnist value='$res[parnist]'></td>"); 
echo ("<td>Існуючі парності:</td><td><SELECT name=oldparnist>"); 
$zapros = mysql_query("SELECT distinct parnist FROM rozklad");
while ($res3 = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res3[parnist]'>$res3[parnist]"); 
}
echo ("</SELECT></td></tr>"); 
#==========================================================================================================
echo ("<tr><td>Примітка:</td><td><TEXTAREA name=primitka rows='5' cols='30'>$res[primitka]</textarea></td></tr>"); 


echo ("</table>");

echo ("<INPUT TYPE=submit value='Внести зміни'>"); 

mysql_close($dbcnx);
?>

<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];



echo ("<html>");
echo ("<form action=addrozkladmake.php method=post>");
echo ("<CENTER><P><FONT SIZE=6>Введіть інформацію про пункт розкладу:</FONT></CENTER>");
echo ("<br><br><table width='100%'' border='1'>");



#=====================================================================
echo ("<tr><td>Назва нового предмету:</td><td><input type=text name=newpredmet></td>");
echo ("<td>Існуючий предмет:</td><td><SELECT name=oldpredmet>");
$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT distinct predmet FROM rozklad");
while ($res = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res[predmet]'>$res[predmet]"); 
}
echo ("</SELECT></td></tr>");
#======================================================================
echo ("<tr><td>Нові тижні року:</td><td><input type=text name=newtizniroku></td>");
echo ("<td>Існуючі тижні року:</td><td><SELECT name=oldtizniroku>");
$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT distinct tizniroku FROM rozklad");
while ($res = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res[tizniroku]'>$res[tizniroku]"); 
}
echo ("</SELECT></td></tr>");
#======================================================================
echo ("<tr><td>Новий основний викладач :</td><td><input type=text name=newprepod1></td>");
echo ("<td>Існуючий основний викладач :</td><td><SELECT name=oldprepod1>");
$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT distinct prepod1 FROM rozklad");
while ($res = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res[prepod1]'>$res[prepod1]"); 
}
echo ("</SELECT></td></tr>");
#======================================================================
echo ("<tr><td>Новий другий викладач:</td><td><input type=text name=newprepod2></td>");
echo ("<td>Існуючий другий викладач:</td><td><SELECT name=oldprepod2>");
$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT distinct prepod2 FROM rozklad");
while ($res = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res[prepod2]'>$res[prepod2]"); 
}
echo ("</SELECT></td></tr>");
#======================================================================
echo ("<tr><td>День тижня:</td><td><SELECT name=dennedeli>");
echo ("<OPTION value='Понеділок'>Понеділок"); 
echo ("<OPTION value='Вівторок'>Вівторок"); 
echo ("<OPTION value='Середа'>Середа"); 
echo ("<OPTION value='Четвер'>Четвер"); 
echo ("<OPTION value='П`ятниця'>П`ятниця"); 
echo ("<OPTION value='Субота'>Субота"); 
echo ("<OPTION value='Неділя'>Неділя"); 
echo ("</SELECT></td></tr>");
#======================================================================
echo ("<tr><td>Пара:</td><td><SELECT name=para>");
echo ("<OPTION value='1'>1"); 
echo ("<OPTION value='2'>2"); 
echo ("<OPTION value='3'>3"); 
echo ("<OPTION value='4'>4"); 
echo ("<OPTION value='5'>5"); 
echo ("<OPTION value='6'>6"); 
echo ("<OPTION value='7'>7"); 
echo ("<OPTION value='8'>8"); 
echo ("</SELECT></td></tr>");
#======================================================================
echo ("<tr><td>Новий час пари:</td><td><input type=text name=newchas></td>");
echo ("<td>Існуючий час пари:</td><td><SELECT name=oldchas>");
$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT distinct chas FROM rozklad");
while ($res = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res[chas]'>$res[chas]"); 
}
echo ("</SELECT></td></tr>");
#======================================================================
echo ("<tr><td>Нова група:</td><td><input type=text name=newgrupa></td>");
echo ("<td>Існуюча група:</td><td><SELECT name=oldgrupa>");
$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT distinct grupa FROM rozklad");
while ($res = mysql_fetch_array($zapros))
{
$gr=urldecode($res[grupa]);
echo ("<OPTION value='$gr'>$gr"); 
}
echo ("</SELECT></td></tr>");
#======================================================================
echo ("<tr><td>Аудиторія:</td><td><input type=text name=newauditoria></td>");
echo ("<td>Аудиторія:</td><td><SELECT name=oldauditoria>");
$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT distinct auditoria FROM rozklad");
while ($res = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res[auditoria]'>$res[auditoria]"); 
}
echo ("</SELECT></td></tr>");
#======================================================================
echo ("<tr><td>Парність:</td><td><SELECT name=parnist>");
echo ("<OPTION value='Всі тижні'>Всі тижні");
echo ("<OPTION value='Парні тижні'>Парні тижні"); 
echo ("<OPTION value='Не парні тижні'>Не парні тижні"); 

echo ("</SELECT></td></tr>");
#======================================================================

echo ("<tr><td>Примітка:</td><td><TEXTAREA name=primitka rows='5' cols='30'></textarea></td></tr>");
echo ("</table><br><br>");
echo ("<input type=submit value=Внести інформацію>");

echo ("</form>");
echo ("</html>");

mysql_close($dbcnx);
?>

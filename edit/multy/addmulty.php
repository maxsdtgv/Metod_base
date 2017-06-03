<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

echo ("<html>");
echo ("<form action=addmultymake.php method=post>");
echo ("<CENTER><P><FONT SIZE=6>Введіть інформацію про нову роботу:</FONT></CENTER>");
echo ("<br><br><table width='100%'' border='1'>");

echo ("<tr><td>Нова назва комісії:</td><td><input type=text name=newkomis></td></tr>");
echo ("<tr><td>Існуюча назва комісії:</td><td><SELECT name=oldkomis>");
$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT distinct komis FROM multy");
while ($res = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res[komis]'>$res[komis]"); 
}
echo ("</tr>");

echo ("<tr><td>Нова назва предмету:</td><td><input type=text name=newpredmet></td></tr>");
echo ("<tr><td>Існуюча назва предмету:</td><td><SELECT name=oldpredmet>");
$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT distinct predmet FROM multy");
while ($res = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res[predmet]'>$res[predmet]"); 
}
echo ("</tr>");

echo ("<tr><td>Новій автор:</td><td><input type=text name=newavtor></td></tr>");
echo ("<tr><td>Існуючий автор:</td><td><SELECT name=oldavtor>");
$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT distinct avtor FROM multy");
while ($res = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res[avtor]'>$res[avtor]"); 
}
echo ("</tr>");

echo ("<tr><td>Назва:</td><td><TEXTAREA name=nazva rows='8' cols='100'></textarea></td></tr>");
echo ("<tr><td>Анотация:</td><td><TEXTAREA name=anotacia rows='8' cols='100'></textarea></td></tr>");
echo ("<tr><td>Назва файла:</td><td><input type=text name=silka></td></tr>");
echo ("<tr><td>Примитка:</td><td><TEXTAREA name=primitka rows='8' cols='100'></textarea></td></tr>");


echo ("</table><br><br>");
echo ("<input type=submit value=Внести інформацію>");

echo ("</form>");
echo ("</html>");

mysql_close($dbcnx);
?>
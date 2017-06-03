<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];



echo ("<html>");
echo ("<form action=addcatalogmake.php method=post>");
echo ("<CENTER><P><FONT SIZE=6>Введіть інформацію про нову роботу:</FONT></CENTER>");
echo ("<br><br><table width='100%'' border='1'>");
echo ("<tr><td>Назва нового напрямку:</td><td><input type=text name=newnapr></td></tr>");
echo ("<tr><td>Існуючий напрямок:</td><td><SELECT name=oldnapr>");
$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT distinct napr FROM catalog");
while ($res = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res[napr]'>$res[napr]"); 
}
echo ("</SELECT></td></tr>");
echo ("<tr><td>Назва роботи:</td><td><TEXTAREA name=nazva rows='8' cols='90'></textarea></td></tr>");
echo ("<tr><td>Тема роботи:</td><td><TEXTAREA name=tema rows='8' cols='90'></textarea></td></tr>");
echo ("<tr><td>Нова спеціальність:</td><td><input type=text name=newspec></td></tr>");
echo ("<tr><td>Існуюча спеціальність:</td><td><SELECT name=oldspec>");


$zapros = mysql_query("SELECT distinct special FROM catalog");


while ($res = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res[special]'>$res[special]"); 
}

echo ("</SELECT></td></tr>");
echo ("<tr><td>Новий рік:</td><td><input type=text name=newpik></td></tr>");
echo ("<tr><td>Існуючий рік:</td><td><SELECT name=oldpik>");




$zapros = mysql_query("SELECT distinct pik FROM catalog");


while ($res = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res[pik]'>$res[pik]"); 
}
echo ("</SELECT></td></tr>");
echo ("<tr><td>Автор(и):</td><td><TEXTAREA name=avtor rows='5' cols='90'></textarea></td></tr>");
echo ("<tr><td>Видання:</td><td><TEXTAREA name=vidan rows='8' cols='90'></textarea></td></tr>");
echo ("<tr><td>Анотація:</td><td><TEXTAREA name=anotacia rows='8' cols='90'></textarea></td></tr>");
echo ("<tr><td>Примітка:</td><td><TEXTAREA name=prim rows='8' cols='90'></textarea></td></tr>");
echo ("</table><br><br>");
echo ("<input type=submit value=Внести інформацію>");

echo ("</form>");
echo ("</html>");

mysql_close($dbcnx);
?>

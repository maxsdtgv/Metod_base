<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];
$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
$id_multy=$_GET['id_multy'];
$_SESSION['idm'] = $id_multy;

mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM multy where id_multy='$id_multy'");
$res = mysql_fetch_array($zapros);
echo ("<html>");
echo ("<form action=makeedit.php method=post>");
echo ("<CENTER><P><FONT SIZE=6>Редагування запису:</FONT></CENTER>");
echo ("<br><br><table width='100%'' border='1'>");
#===============================================================================
echo ("<tr><td>Назва комісії:</td><td><input type=text name=newkomis value='$res[komis]'></td></tr>");
echo ("<tr><td>Існуюча назва комісії:</td><td><SELECT name=oldkomis>");
$zapros2 = mysql_query("SELECT distinct komis FROM multy");
echo ("<OPTION value=''>"); 
while ($res2 = mysql_fetch_array($zapros2))
{
echo ("<OPTION value='$res2[komis]'>$res2[komis]"); 
}
echo ("</tr>");
#===============================================================================
echo ("<tr><td>Назва предмету:</td><td><input type=text name=newpredmet value='$res[predmet]'></td></tr>");
echo ("<tr><td>Існуюча назва предмету:</td><td><SELECT name=oldpredmet>");
$zapros2 = mysql_query("SELECT distinct predmet FROM multy");
echo ("<OPTION value=''>");
while ($res2 = mysql_fetch_array($zapros2))
{
echo ("<OPTION value='$res2[predmet]'>$res2[predmet]"); 
}
echo ("</tr>");
#===============================================================================
echo ("<tr><td>Автор:</td><td><input type=text name=newavtor value='$res[avtor]'></td></tr>");
echo ("<tr><td>Існуючі автори:</td><td><SELECT name=oldavtor>");
$zapros2 = mysql_query("SELECT distinct avtor FROM multy");
echo ("<OPTION value=''>");
while ($res2 = mysql_fetch_array($zapros2))
{
echo ("<OPTION value='$res2[avtor]'>$res2[avtor]"); 
}
echo ("</tr>");
#===============================================================================
echo ("<tr><td>Назва:</td><td><TEXTAREA name=nazva rows='8' cols='100'>$res[nazva]</textarea></td></tr>");
echo ("<tr><td>Анотация:</td><td><TEXTAREA name=anotacia rows='8' cols='100'>$res[anotacia]</textarea></td></tr>");
echo ("<tr><td>Назва файла:</td><td><input type=text name=silka value='$res[silka]'></td></tr>");
echo ("<tr><td>Примитка:</td><td><TEXTAREA name=primitka rows='8' cols='100'>$res[primitka]</textarea></td></tr>");


echo ("</table><br><br>");
echo ("<input type=submit value=Внести інформацію>");

echo ("</form>");
echo ("</html>");

mysql_close($dbcnx);
?>
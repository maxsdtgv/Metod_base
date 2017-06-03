<html>
<form action=addmenumake.php method=post>
<CENTER><P><FONT SIZE=6>Введіть інформацію про новий розділ:</FONT></CENTER>
<br><br><table width="100%" border="1">
<tr><td>Назва нового розділу:</td><td><input type=text name=newmenu></td></tr>
<tr><td>Шлях:</td><td><input type=text name=url></td></tr>
<tr><td>Існуючий розділ:</td><td><SELECT name="oldmenu">


<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT distinct menu FROM menu");
mysql_close($dbcnx);

while ($res = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res[menu]'>$res[menu]"); 
}

?>

</SELECT></td></tr>

<tr><td>Назва нового підрозділу:</td><td><input type=text name=submenu></td></tr>
<tr><td>Доступ для групи 0:</td><td><SELECT name="class_0">
<OPTION value="N">Ні
<OPTION value="Y">Доступ дозволено
</SELECT></td></tr>
<tr><td>Доступ для групи 1:</td><td><SELECT name="class_1">
<OPTION value="N">Ні
<OPTION value="Y">Доступ дозволено
</SELECT></td></tr>
<tr><td>Доступ для групи 2:</td><td><SELECT name="class_2">
<OPTION value="N">Ні
<OPTION value="Y">Доступ дозволено
</SELECT></td></tr>
<tr><td>Доступ для групи 3:</td><td><SELECT name="class_3">
<OPTION value="N">Ні
<OPTION value="Y">Доступ дозволено
</SELECT></td></tr>
<tr><td>Доступ для групи 4:</td><td><SELECT name="class_4">
<OPTION value="N">Ні
<OPTION value="Y">Доступ дозволено
</SELECT></td></tr>
<tr><td>Доступ для групи 5:</td><td><SELECT name="class_5">
<OPTION value="N">Ні
<OPTION value="Y">Доступ дозволено
</SELECT></td></tr>
</table><br><br>
<input type=submit value=Внести інформацію>

</form>
</html>

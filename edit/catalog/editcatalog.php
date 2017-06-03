<?php

session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.php");
$idc=$_GET['catalog'];
$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];
$_SESSION['id_catalog']=$idc;

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");


$zapros = mysql_query("SELECT * FROM catalog where id_catalog='$idc'");
$res = mysql_fetch_array($zapros);
echo ("<form action=makeedit.php method=post>");
echo ("<CENTER><B>Редагування запису.</B></CENTER>");
echo ("<table width='100%'>");

echo ("<tr><td>Напрямок:</td><td><input type=text name=newnapr value='$res[napr]'></td></tr>");

echo ("<tr><td>Існуючий напрямок:</td><td><SELECT name=oldnapr>");


$zapros = mysql_query("SELECT distinct napr FROM catalog");

while ($res2 = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res2[napr]'>$res2[napr]"); 
}

echo("</SELECT></td></tr>");

echo ("<tr><td>Назва роботи:</td><td><TEXTAREA name=nazva rows='8' cols='90'>$res[nazva]</textarea></td></tr>"); 
echo ("<tr><td>Тема роботи:</td><td><TEXTAREA name=tema rows='8' cols='90'>$res[tema]</textarea></td></tr>"); 
echo ("<tr><td>Нова спеціальність:</td><td><input type=text name=newspec></td></tr>"); 
echo ("<tr><td>Існуюча спеціальність:</td><td><SELECT name=oldspec>"); 


$zapros = mysql_query("SELECT distinct special FROM catalog");


while ($res3 = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res3[special]'>$res3[special]"); 
}

echo ("</SELECT></td></tr>"); 
echo ("<tr><td>Новий рік:</td><td><input type=text name=newpik></td></tr>"); 
echo ("<tr><td>Існуючий рік:</td><td><SELECT name=oldpik>"); 




$zapros = mysql_query("SELECT distinct pik FROM catalog");


while ($res4 = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res4[pik]'>$res4[pik]"); 
}

echo ("</SELECT></td></tr>"); 

echo ("<tr><td>Автор(и):</td><td><TEXTAREA name=avtor rows='5' cols='90'>$res[avtor]</textarea></td></tr>"); 
echo ("<tr><td>Видання:</td><td><TEXTAREA name=vidan rows='8' cols='90'>$res[vidana]</textarea></td></tr>"); 
echo ("<tr><td>Анотація:</td><td><TEXTAREA name=anotacia rows='8' cols='90'>$res[anotacia]</textarea></td></tr>"); 
echo ("<tr><td>Примітка:</td><td><TEXTAREA name=prim rows='8' cols='90'>$res[primitka]</textarea></td></tr>"); 


echo ("</table>");

echo ("<INPUT TYPE=submit value='Внести зміни'>"); 

mysql_close($dbcnx);
?>

<?php
$idpedsov=$_GET['pedsov'];
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");
$_SESSION['pedsov']=$idpedsov;
$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM pedsovet where id_pedsovet='$idpedsov'");
$res = mysql_fetch_array($zapros);
echo ("<form action=makeedit.php method=post>");
echo ("<table width='100%'>");
echo ("<tr><td>Протокол:</td>");
echo ("<td><input type=text name=protokol value='$res[protokol]'></td></tr>"); 
echo ("<tr><td>Дата:</td>");
echo ("<td><input type=text name=data value='$res[data]'></td></tr>"); 
echo ("<tr><td>Тема:</td>");
echo ("<td><TEXTAREA name=tema rows='8' cols='90'>$res[tema]</TEXTAREA></td></tr>"); 
echo ("<tr><td>Постанова:</td>");
echo ("<td><TEXTAREA name=postanova rows='8' cols='90'>$res[postanova]</TEXTAREA></td></tr>"); 
echo ("<tr><td>Контроль:</td>");
echo ("<td><TEXTAREA name=kontrol rows='8' cols='90'>$res[kontrol]</TEXTAREA></td></tr>"); 
echo ("<tr><td>Примітки:</td>");
echo ("<td><TEXTAREA name=primitka rows='8' cols='90'>$res[primitka]</TEXTAREA></td></tr>"); 
echo ("</table>");

echo ("<INPUT TYPE=submit value='Внести зміни'>"); 

mysql_close($dbcnx);
?>
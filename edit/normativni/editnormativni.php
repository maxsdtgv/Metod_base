<?php
$idn=$_GET['normativni'];
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");
$_SESSION['normativni']=$idn;
$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM normativna where id_normativna='$idn'");
$res = mysql_fetch_array($zapros);
echo ("<form action=makeedit.php method=post>");
echo ("<table width='100%'>");

echo ("<tr><td>Тип документу:</td>");
echo ("<td><input type=text name=typ value='$res[typ]'></td></tr>");
 
echo ("<tr><td>Назва документу:</td>");
echo ("<td><TEXTAREA name=nazva rows='8' cols='90'>$res[nazva]</TEXTAREA></td></tr>"); 

echo ("<tr><td>Номер наказу:</td>");
echo ("<td><input type=text name=nomernakazu value='$res[nomernakazu]'></td></tr>");

echo ("<tr><td>Реєстрація:</td>");
echo ("<td><TEXTAREA name=registr rows='8' cols='90'>$res[registr]</TEXTAREA></td></tr>"); 

echo ("<tr><td>Преамбула:</td>");
echo ("<td><TEXTAREA name=preambula rows='8' cols='90'>$res[preambula]</TEXTAREA></td></tr>"); 

echo ("<tr><td>Назва розділу документу:</td>");
echo ("<td><TEXTAREA name=nazvarozdilu rows='8' cols='90'>$res[nazvarozdilu]</TEXTAREA></td></tr>"); 

echo ("<tr><td>Підрозділи (текст):</td>");
echo ("<td><TEXTAREA name=pidrozdil rows='8' cols='90'>$res[pidrozdil]</TEXTAREA></td></tr>"); 

echo ("</table>");

echo ("<INPUT TYPE=submit value='Внести зміни'>"); 

mysql_close($dbcnx);
?>

<?php
$idn=$_GET['normativni'];
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM normativna where id_normativna='$idn'");
$res = mysql_fetch_array($zapros);
echo ("<a href='normativni.php' target='edit'>Повернутися до переліку...</a>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");

echo ("<tr><td>Назва розділу:</td>");
echo ("<td>$res[rozdil]</td></tr>"); 
echo ("<tr><td>Тип документа:</td>");
echo ("<td>$res[typ]</td></tr>"); 
echo ("<tr><td>Назва документа:</td>");
echo ("<td>$res[nazva]</td></tr>"); 
echo ("<tr><td>Номер наказу:</td>");
echo ("<td>$res[nomernakazu]</td></tr>"); 
echo ("<tr><td>Реєстрація:</td>");
echo ("<td><PRE>$res[registr]</PRE></td></tr>"); 
echo ("<tr><td>Преамбула:</td>");
echo ("<td><PRE>$res[preambula]</PRE></td></tr>"); 
echo ("<tr><td>Назва розділу документа:</td>");
echo ("<td><PRE>$res[nazvarozdilu]</PRE></td></tr>"); 
echo ("<tr><td>Підрозділ:</td>");
echo ("<td><PRE>$res[pidrozdil]</PRE></td></tr>"); 
echo ("<tr><td>Остання дата<br>внесення змін:</td>");
echo ("<td>$res[time]</td></tr>"); 


echo ('</table>');
echo ("<a href='normativni.php' target='edit'>Повернутися до переліку...</a>");
mysql_close($dbcnx);
?>

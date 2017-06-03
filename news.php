<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM users WHERE name='$userlogin'");
$res = mysql_fetch_array($zapros);
$ip_addr=$_SERVER['REMOTE_ADDR'];
#echo ("$ipaddr");
$log=mysql_query("INSERT INTO log (name,familia,imia,otchestvo,ip) VALUES('$res[name]','$res[familia]','$res[imia]','$res[otchestvo]','$ip_addr')");

echo ("<BODY><FONT SIZE=4><CENTER>$res[familia]"); echo(" ");
echo ("$res[imia]"); echo (" "); echo ("$res[otchestvo],<br>Вас вітає Обліково-методичний ресурс<br>");
echo ("Київського коледжу зв`язку.<br>Оберіть будьласка розділ системи у Головному меню...</BODY><br><br><br>");


$zapros2 = mysql_query("SELECT * FROM ob order by data desc");
echo ("<B>Об`яви</B></CENTER><hr>");

while ($res = mysql_fetch_array($zapros2))
{
echo ("<table width='100%' border='0' cellspacing='0' cellpadding='0'>");
echo ("<tr valign='top'><td width='12%'><B>$res[data]</B></td><td width='8%'><B>$res[chas]</B></td><td>$res[zmist]</td></tr>");
echo ("</table><hr>");
}

mysql_close($dbcnx);
?>

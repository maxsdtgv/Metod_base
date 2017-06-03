<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM log ORDER BY time desc");

echo ("<FONT SIZE=4><PRE><CENTER>Log for user: $name</CENTER></PRE></FONT><br>");
echo ("<table border='1' width='100%' cellspacing='0' cellpadding='0'>");
echo ("<tr><td>id_log</td><td>Login</td><td>F.I.O.</td><td>Âõ³ä</td><td>IP</td></tr>");
while ($res = mysql_fetch_array($zapros))
{
echo ("<tr><td>$res[id_log]");
echo ("</td><td>$res[name]</td><td>");
echo $res["familia"];echo " ";
echo $res["imia"]; echo " ";
echo $res["otchestvo"];
echo ("</td><td>$res[time]</td>");
echo ("<td>$res[ip]</td></tr>");
}
echo ("</table>");

mysql_close($dbcnx);
?>

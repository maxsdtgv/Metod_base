<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];
$name=$_GET['name'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM log where name='$name'");

echo ("<FONT SIZE=4><PRE><CENTER>Log for user: $name</CENTER></PRE></FONT><br>");
$num="0";
echo ("<table border='1' width='100%' cellspacing='0' cellpadding='0'>");
echo ("<tr><td>Номер</td><td>Login</td><td>F.I.O.</td><td>Вхід</td><td>IP</td></tr>");
while ($res = mysql_fetch_array($zapros))
{
echo ("<tr><td>");
$num=$num+1;
print ($num);
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

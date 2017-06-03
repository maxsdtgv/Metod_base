<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.html");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$id_grupi=$_GET['id_grupi'];
echo("<FONT SIZE=4>Запис знищено.</FONT><br><br>");
$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros=mysql_query("DELETE FROM grupi WHERE id_grupi='$id_grupi'");
echo ("<a href='grupitapredmeti.php'>Повернутися до переліку груп та предметів...</a>");

mysql_close($dbcnx);
?>
<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.html");

$userlogin=$_SESSION['nnn'];
$userpass=$_SESSION['ppp'];
$familia=$_POST['familia'];
$imia=$_POST['imia'];
$otchestvo=$_POST['otchestvo'];
$login=$_POST['login'];
$passwd=$_POST['passwd'];
$about=$_POST['about'];
$prio=$_POST['prio'];

$dbcnx=mysql_connect("localhost",root);
mysql_select_db("baza_kkz");
$zapros=mysql_query("INSERT INTO users (name,familia,imia,otchestvo,about,prio,passwd)
VALUES ('$login','$familia','$imia','$otchestvo','$about','$prio','$passwd')");
$zapros2=mysql_query("GRANT ALL PRIVILEGES ON *.* TO '$login'@localhost IDENTIFIED BY '$passwd'");
$zapros3=mysql_query("FLUSH PRIVILEGES");
mysql_close($dbcnx);
echo("<a href='users.php' target='edit'>Bepnutca...</a>");
?>
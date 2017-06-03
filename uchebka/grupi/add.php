<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.html");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$type=$_SESSION['type'];
$new=$_POST['new'];

$platni=$_POST['platni'];
$budget=$_POST['budget'];
$prim=$_POST['prim'];

echo("$type <br>");
echo("$new <br>");
echo("$platni <br>");
echo("$budget <br>");
echo("$prim <br>");

$dbcnx=mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros=mysql_query("INSERT INTO grupi (type,znachenie,platnie,budget,prim)
VALUES ('$type','$new','$platni','$budget','$prim')");
mysql_close($dbcnx);
echo("<a href='grupitapredmeti.php'>Новий запис створено. Повернутися ...</a>");
?>

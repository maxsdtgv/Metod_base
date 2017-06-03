<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.html");

$userlogin=$_SESSION['nnn'];
$userpass=$_SESSION['ppp'];
$rada=$_POST['rada'];
$protokol=$_POST['protokol'];
$data=$_POST['data'];
$tema=$_POST['tema'];
$postanova=$_POST['postanova'];
$kontrol=$_POST['kontrol'];
$primitka=$_POST['primitka'];

$dbcnx=mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros=mysql_query("INSERT INTO pedsovet (rada,protokol,data,tema,postanova,kontrol,primitka)
VALUES ('$rada','$protokol','$data','$tema','$postanova','$kontrol','$primitka')");
mysql_close($dbcnx);
echo ("<a href='pedsovet.php' target='edit'>Povernutisa do spisku rad ...</a>");
?>
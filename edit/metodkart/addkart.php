<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.html");

$userlogin=$_SESSION['nnn'];
$userpass=$_SESSION['ppp'];
$familia=$_POST['familia'];
$imia=$_POST['imia'];
$otchestvo=$_POST['otchestvo'];
$gr=$_POST['gr'];
$obrazov=$_POST['obrazov'];
$kvalif=$_POST['kvalif'];
$otkrurok=$_POST['otkrurok'];
$attest=$_POST['attest'];
$metodrab=$_POST['metodrab'];
$primitka=$_POST['primitka'];

$dbcnx=mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros=mysql_query("INSERT INTO prepod (familia,imia,otchestvo,gr,obrazov,kvalif,otkrurok,attest,metodrab,primitka)
VALUES ('$familia','$imia','$otchestvo','$gr','$obrazov','$kvalif','$otkrurok','$attest','$metodrab','$primitka')");
mysql_close($dbcnx);
echo("<a href='metodkart.php' target='edit'>Bepnutca...</a>");
?>
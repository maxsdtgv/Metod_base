<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.html");

$userlogin=$_SESSION['nnn'];
$userpass=$_SESSION['ppp'];
$idp=$_SESSION['prep'];
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
$zapros=mysql_query("UPDATE prepod SET familia='$familia',imia='$imia',otchestvo='$otchestvo',gr='$gr',obrazov='$obrazov',
kvalif='$kvalif',otkrurok='$otkrurok',attest='$attest',metodrab='$metodrab',primitka='$primitka' WHERE id_prep='$idp'");
mysql_close($dbcnx);
?>
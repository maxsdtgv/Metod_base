<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.html");

$userlogin=$_SESSION['nnn'];
$userpass=$_SESSION['ppp'];
$idpedsov=$_SESSION['pedsov'];
$protokol=$_POST['protokol'];
$data=$_POST['data'];
$tema=$_POST['tema'];
$postanova=$_POST['postanova'];
$kontrol=$_POST['kontrol'];
$primitka=$_POST['primitka'];

$dbcnx=mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros=mysql_query("UPDATE pedsovet SET protokol='$protokol',data='$data',tema='$tema',postanova='$postanova',
kontrol='$kontrol',primitka='$primitka' WHERE id_pedsovet='$idpedsov'");
mysql_close($dbcnx);
?>
<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.html");

$userlogin=$_SESSION['nnn'];
$userpass=$_SESSION['ppp'];
$idk=$_SESSION['kontrol'];

$oldobekt=$_POST['oldobekt'];
$newobekt=$_POST['newobekt'];

$familia=$_POST['familia'];
$imia=$_POST['imia'];
$otchestvo=$_POST['otchestvo'];

$oldnr=$_POST['oldnr'];
$newnr=$_POST['newnr'];

$september=$_POST['september'];
$october=$_POST['october'];
$november=$_POST['november'];
$december=$_POST['december'];
$jan=$_POST['jan'];
$feb=$_POST['feb'];
$march=$_POST['march'];
$apr=$_POST['apr'];
$may=$_POST['may'];
$june=$_POST['june'];
$july=$_POST['july'];
$august=$_POST['august'];

$forma=$_POST['forma'];
$zaversh=$_POST['zaversh'];
$vikonan=$_POST['vikonan'];
$primitka=$_POST['primitka'];


if ($newobekt==$oldobekt) $obekt=$oldobekt;
if ($newobekt<>$oldobekt) $obekt=$newobekt;
if ($newobekt=='') $obekt=$oldobekt;

if ($newnr==$oldnr) $nr=$oldnr;
if ($newnr<>$oldnr) $nr=$newnr;
if ($newnr=='') $nr=$oldnr;


$dbcnx=mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros=mysql_query("UPDATE kontrol SET obekt='$obekt',familia='$familia',imia='$imia',
otchestvo='$otchestvo',nr='$nr',september='$september',october='$october',november='$november',december='$december',
jan='$jan',feb='$feb',march='$march',apr='$apr',may='$may',june='$june',july='$july',august='$august',
forma='$forma',zaversh='$zaversh',vikonan='$vikonan',
primitka='$primitka' WHERE id_kontrol='$idk'");
mysql_close($dbcnx);
echo ("<a href='kontrol.php' target='edit'>Повернутися до переліку планів контролю...</a>");
?>

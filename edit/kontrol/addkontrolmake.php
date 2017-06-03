<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.html");

$userlogin=$_SESSION['nnn'];
$userpass=$_SESSION['ppp'];

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

if ($newobekt=='') $obekt=$oldobekt;
if ($newobekt<>'') $obekt=$newobekt;

if ($newnr=='') $nr=$oldnr;
if ($newnr<>'') $nr=$newnr;


$dbcnx=mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros=mysql_query("INSERT INTO kontrol (obekt,familia,imia,otchestvo,nr,jan,feb,march,apr,may,june,july,august,september,october,november,december,forma,zaversh,vikonan,primitka)
VALUES ('$obekt','$familia','$imia','$otchestvo','$nr','$jan','$feb','$march','$apr','$may','$june','$july','$august','$september','$october','$november','$december','$forma','$zaversh','$vikonan','$primitka')");
mysql_close($dbcnx);
echo("<a href='kontrol.php' target='edit'>Повернутися...</a>");
?>

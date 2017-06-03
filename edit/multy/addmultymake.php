<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.html");

$userlogin=$_SESSION['nnn'];
$userpass=$_SESSION['ppp'];

$oldkomis=$_POST['oldkomis'];
$newkomis=$_POST['newkomis'];

$oldpredmet=$_POST['oldpredmet'];
$newpredmet=$_POST['newpredmet'];

$oldavtor=$_POST['oldavtor'];
$newavtor=$_POST['newavtor'];

$nazva=$_POST['nazva'];
$anotacia=$_POST['anotacia'];
$silka=$_POST['silka'];
$primitka=$_POST['primitka'];


if ($newkomis=='') $komis=$oldkomis;
if ($newkomis<>'') $komis=$newkomis;

if ($newpredmet=='') $predmet=$oldpredmet;
if ($newpredmet<>'') $predmet=$newpredmet;

if ($newavtor=='') $avtor=$oldavtor;
if ($newavtor<>'') $avtor=$newavtor;


$dbcnx=mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros=mysql_query("INSERT INTO multy (komis,predmet,avtor,nazva,anotacia,silka,primitka)
VALUES ('$komis','$predmet','$avtor','$nazva','$anotacia','$silka','$primitka')");
mysql_close($dbcnx);
echo("<a href='multy.php' target='edit'>Повернутися...</a>");
?>

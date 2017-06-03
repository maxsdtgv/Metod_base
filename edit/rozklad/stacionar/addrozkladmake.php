<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.html");

$userlogin=$_SESSION['nnn'];
$userpass=$_SESSION['ppp'];

$oldpredmet=$_POST['oldpredmet'];
$newpredmet=$_POST['newpredmet'];

$oldtizniroku=$_POST['oldtizniroku'];
$newtizniroku=$_POST['newtizniroku'];

$oldprepod1=$_POST['oldprepod1'];
$newprepod1=$_POST['newprepod1'];

$oldprepod2=$_POST['oldprepod2'];
$newprepod2=$_POST['newprepod2'];

$dennedeli=$_POST['dennedeli'];

$para=$_POST['para'];

$oldchas=$_POST['oldchas'];
$newchas=$_POST['newchas'];

$oldgrupa=$_POST['oldgrupa'];
$newgrupa=$_POST['newgrupa'];

$oldauditoria=$_POST['oldauditoria'];
$newauditoria=$_POST['newauditoria'];

$parnist=$_POST['parnist'];

$primitka=$_POST['primitka'];


if ($newpredmet=='') $predmet=$oldpredmet;
if ($newpredmet<>'') $predmet=$newpredmet;

if ($newtizniroku=='') $tizniroku=$oldtizniroku;
if ($newtizniroku<>'') $tizniroku=$newtizniroku;


if ($newprepod1=='') $prepod1=$oldprepod1;
if ($newprepod1<>'') $prepod1=$newprepod1;

if ($newprepod2=='') $prepod2=$oldprepod2;
if ($newprepod2<>'') $prepod2=$newprepod2;

if ($newchas=='') $chas=$oldchas;
if ($newchas<>'') $chas=$newchas;


if ($newgrupa=='') $grupa=$oldgrupa;
if ($newgrupa<>'') $grupa=$newgrupa;


if ($newauditoria=='') $auditoria=$oldauditoria;
if ($newauditoria<>'') $auditoria=$newauditoria;

$gr=urlencode($grupa);

$dbcnx=mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros=mysql_query("INSERT INTO rozklad (predmet,tizniroku,prepod1,prepod2,dennedeli,para,chas,grupa,
auditoria,parnist,primitka)
VALUES ('$predmet','$tizniroku','$prepod1','$prepod2','$dennedeli','$para','$chas','$gr','$auditoria'
,'$parnist','$primitka')");
mysql_close($dbcnx);
echo("<a href='rozklad.php' target='edit'>Повернутися...</a>");
?>

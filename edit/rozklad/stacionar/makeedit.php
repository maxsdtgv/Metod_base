<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.php");

$userlogin=$_SESSION['nnn'];
$userpass=$_SESSION['ppp'];

$idr=$_SESSION['id_rozklad'];

$oldpredmet=$_POST['oldpredmet'];
$newpredmet=$_POST['newpredmet'];

$oldtizniroku=$_POST['oldtizniroku'];
$newtizniroku=$_POST['newtizniroku'];

$oldprepod1=$_POST['oldprepod1'];
$newprepod1=$_POST['newprepod1'];

$oldprepod2=$_POST['oldprepod2'];
$newprepod2=$_POST['newprepod2'];

$olddennedeli=$_POST['olddennedeli'];
$newdennedeli=$_POST['newdennedeli'];

$oldpara=$_POST['oldpara'];
$newpara=$_POST['newpara'];

$oldchas=$_POST['oldchas'];
$newchas=$_POST['newchas'];

$oldgrupa=$_POST['oldgrupa'];
$newgrupa=$_POST['newgrupa'];

$oldauditoria=$_POST['oldauditoria'];
$newauditoria=$_POST['newauditoria'];

$oldparnist=$_POST['oldparnist'];
$newparnist=$_POST['newparnist'];

$primitka=$_POST['primitka'];


if ($newpredmet==$oldpredmet) $predmet=$oldpredmet;
if ($newpredmet<>$oldpredmet) $predmet=$newpredmet;
if ($newpredmet=='') $predmet=$oldpredmet;

if ($newtizniroku==$oldtizniroku) $tizniroku=$oldtizniroku;
if ($newtizniroku<>$oldtizniroku) $tizniroku=$newtizniroku;
if ($newtizniroku=='') $tizniroku=$oldtizniroku;

if ($newprepod1==$oldprepod1) $prepod1=$oldprepod1;
if ($newprepod1<>$oldprepod1) $prepod1=$newprepod1;
if ($newprepod1=='') $prepod1=$oldprepod1;

if ($newprepod2==$oldprepod2) $prepod2=$oldprepod2;
if ($newprepod2<>$oldprepod2) $prepod2=$newprepod2;
if ($newprepod2=='') $prepod2=$oldprepod2;

if ($newdennedeli==$olddennedeli) $dennedeli=$olddennedeli;
if ($newdennedeli<>$olddennedeli) $dennedeli=$newdennedeli;
if ($newdennedeli=='') $dennedeli=$olddennedeli;

if ($newpara==$oldpara) $para=$oldpara;
if ($newpara<>$oldpara) $para=$newpara;
if ($newpara=='') $para=$oldpara;

if ($newchas==$oldchas) $chas=$oldchas;
if ($newchas<>$oldchas) $chas=$newchas;
if ($newchas=='') $chas=$oldchas;

if ($newgrupa==$oldgrupa) $grupa=$oldgrupa;
if ($newgrupa<>$oldgrupa) $grupa=$newgrupa;
if ($newgrupa=='') $grupa=$oldgrupa;

if ($newauditoria==$oldauditoria) $auditoria=$oldauditoria;
if ($newauditoria<>$oldauditoria) $auditoria=$newauditoria;
if ($newauditoria=='') $auditoria=$oldauditoria;

if ($newparnist==$oldparnist) $parnist=$oldparnist;
if ($newparnist<>$oldparnist) $parnist=$newparnist;
if ($newparnist=='') $parnist=$oldparnist;
$gr=urlencode($grupa);

$dbcnx=mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros=mysql_query("UPDATE rozklad SET predmet='$predmet',tizniroku='$tizniroku',prepod1='$prepod1',
prepod2='$prepod2',dennedeli='$dennedeli',para='$para',chas='$chas',grupa='$gr',
auditoria='$auditoria',parnist='$parnist',primitka='$primitka' WHERE id_rozklad='$idr'");
mysql_close($dbcnx);
echo ("<a href='rozklad.php' target='edit'>Повернутися до розкладу...</a>");
?>

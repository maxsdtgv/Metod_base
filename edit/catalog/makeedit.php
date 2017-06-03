<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.html");

$idc=$_SESSION['id_catalog'];

$userlogin=$_SESSION['nnn'];
$userpass=$_SESSION['ppp'];

$oldnapr=$_POST['oldnapr'];
$newnapr=$_POST['newnapr'];

$nazva=$_POST['nazva'];
$tema=$_POST['tema'];

$oldspec=$_POST['oldspec'];
$newspec=$_POST['newspec'];

$oldpik=$_POST['oldpik'];
$newpik=$_POST['newpik'];

$avtor=$_POST['avtor'];
$vidan=$_POST['vidan'];
$anotacia=$_POST['anotacia'];
$prim=$_POST['prim'];

if ($newnapr=='') $napr=$oldnapr;
if ($newnapr==$oldnapr) $napr=$oldnapr;
if ($newnapr<>$oldnapr) $napr=$newnapr;

if ($newspec=='') $spec=$oldspec;
if ($newspec==$oldspec) $spec=$oldspec;
if ($newspec<>$oldspec) $spec=$newspec;

if ($newpik=='') $pik=$oldpik;
if ($newpik==$oldpik) $pik=$oldpik;
if ($newpik<>$oldpik) $pik=$newpik;



$dbcnx=mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros=mysql_query("UPDATE catalog SET napr='$napr',nazva='$nazva',tema='$tema',
special='$spec',pik='$pik',avtor='$avtor',vidana='$vidan',anotacia='$anotacia',
primitka='$prim' WHERE id_catalog='$idc'");
mysql_close($dbcnx);
echo ("<a href='catalog.php' target='edit'>Повернутися до каталогу...</a>");
?>

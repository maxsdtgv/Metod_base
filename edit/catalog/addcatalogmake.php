<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.html");

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
if ($newnapr<>'') $napr=$newnapr;

if ($newspec=='') $spec=$oldspec;
if ($newspec<>'') $spec=$newspec;

if ($newpik=='') $pik=$oldpik;
if ($newpik<>'') $pik=$newpik;




$dbcnx=mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros=mysql_query("INSERT INTO catalog (napr,nazva,tema,special,pik,avtor,vidana,anotacia,primitka)
VALUES ('$napr','$nazva','$tema','$spec','$pik','$avtor','$vidan','$anotacia','$prim')");
mysql_close($dbcnx);
echo("<a href='metodkart.php' target='edit'>Повернутися...</a>");
?>

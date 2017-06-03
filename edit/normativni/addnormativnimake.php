<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.html");

$userlogin=$_SESSION['nnn'];
$userpass=$_SESSION['ppp'];

$oldrozdil=$_POST['oldrozdil'];
$newrozdil=$_POST['newrozdil'];

$oldtyp=$_POST['oldtyp'];
$newtyp=$_POST['newtyp'];

$oldnazva=$_POST['oldnazva'];
$newnazva=$_POST['newnazva'];

$oldregistr=$_POST['oldregistr'];
$newregistr=$_POST['newregistr'];

$preambula=$_POST['preambula'];
$nazvarozdilu=$_POST['nazvarozdilu'];
$pidrozdil=$_POST['pidrozdil'];
$nomernakazu=$_POST['nomernakazu'];

if ($newrozdil=='') $rozdil=$oldrozdil;
if ($newrozdil<>'') $rozdil=$newrozdil;

if ($newtyp=='') $typ=$oldtyp;
if ($newtyp<>'') $typ=$newtyp;

if ($newnazva=='') $nazva=$oldnazva;
if ($newnazva<>'') $nazva=$newnazva;

if ($newregistr=='') $registr=$oldregistr;
if ($newregistr<>'') $registr=$newregistr;

#$rozdil=urlencode($rozdil);

#$nazva=urlencode($nazva);

$dbcnx=mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros=mysql_query("INSERT INTO normativna (rozdil,typ,nomernakazu,nazva,registr,preambula,nazvarozdilu,pidrozdil)
VALUES ('$rozdil','$typ','$nomernakazu','$nazva','$registr','$preambula','$nazvarozdilu','$pidrozdil')");
mysql_close($dbcnx);
echo("<a href='normativni.php' target='edit'>Повернутися...</a>");
?>

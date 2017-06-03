<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.html");

$userlogin=$_SESSION['nnn'];
$userpass=$_SESSION['ppp'];
$oldmenu=$_POST['oldmenu'];
$newmenu=$_POST['newmenu'];
$url=$_POST['url'];
$submenu=$_POST['submenu'];
$class_0=$_POST['class_0'];
$class_1=$_POST['class_1'];
$class_2=$_POST['class_2'];
$class_3=$_POST['class_3'];
$class_4=$_POST['class_4'];
$class_5=$_POST['class_5'];

if ($newmenu=='') $menu=$oldmenu;
if ($newmenu<>'') $menu=$newmenu;
print($menu);
$dbcnx=mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros=mysql_query("INSERT INTO menu (menu,submenu,url,class_0,class_1,class_2,class_3,class_4,class_5)
VALUES ('$menu','$submenu','$url','$class_0','$class_1','$class_2','$class_3','$class_4','$class_5')");
mysql_close($dbcnx);
echo("<a href='metodkart.php' target='edit'>Bepnutca...</a>");
?>

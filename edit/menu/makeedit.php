<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.html");

$userlogin=$_SESSION['nnn'];
$userpass=$_SESSION['ppp'];
$idm=$_SESSION['id_menu'];
$menu=$_POST['menu'];
$submenu=$_POST['submenu'];
$url=$_POST['url'];
$class_0=$_POST['class_0'];
$class_1=$_POST['class_1'];
$class_2=$_POST['class_2'];
$class_3=$_POST['class_3'];
$class_4=$_POST['class_4'];
$class_5=$_POST['class_5'];

$dbcnx=mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros=mysql_query("UPDATE menu SET menu='$menu',submenu='$submenu',url='$url',
class_0='$class_0',class_1='$class_1',class_2='$class_2',class_3='$class_3',class_4='$class_4',
class_5='$class_5' WHERE id_menu='$idm'");
mysql_close($dbcnx);
echo ("<a href='menu.php' target='edit'>Повернутися до переліку пунктів меню...</a>");
?>

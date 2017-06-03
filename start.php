<?php

session_start();

if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.html");

echo ("<!DOCTYPE HTML PUBLIC '-//W3C//DTD HTML 4.01 Frameset//EN'>");

echo ("<html><TITLE>Обліково-методичний ресурс Київського коледжу зв`язку</TITLE><frameset rows='12%,*'>");

echo ("<frame src='top.php' name='top' noresize scrolling='no' frameborder='0'>");

echo ("<frameset cols='13%,*'>");

echo ("<frame src='menu.php' name='menu' noresize scrolling='no' frameborder='0'>");

echo ("<frameset rows='12%,*'>");

echo ("<frame src='blank.htm' name='submenu' noresize scrolling='no' frameborder='0'>");

echo ("<frame src='news.php' name='superblock' noresize scrolling='yes' frameborder='0'>");


echo ("</frameset></frameset></frameset></html>");
?>

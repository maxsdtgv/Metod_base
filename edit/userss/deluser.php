<?php
$iduser=$_GET['iduser'];
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",root);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM users where id_user='$iduser'");
$res = mysql_fetch_array($zapros);

$zapros=mysql_query("DELETE FROM users WHERE id_user='$iduser'");

mysql_select_db("mysql");

$zapros2=mysql_query("DELETE FROM user WHERE User='$res[name]'");

mysql_close($dbcnx);
echo ("<PRE>Login: $res[name]<br><br>");
echo ("Resultat: $zapros2<br><br>");
echo ("����� � ���������� ����������� �������:<br><br>");
echo ("�������: $res[familia]<br>"); 
echo ("��`�: $res[imia]<br>"); 
echo ("��-�������: $res[otchestvo]</PRE><br><br>"); 
echo ("<a href='users.php' target='edit'>����������� �� ������ ����������.</a>");
?>
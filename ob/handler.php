<?php
$userdb = $_POST['name'];
$passdb = $_POST['password'];

if ($userdb == '') header("Location: index.html");

$dbcnx = mysql_connect("localhost",$userdb,$passdb);// or die(/*header("Location: index.php")*/);
mysql_select_db("mysql");// or die(/*header("Location: index.php")*/);

$zapros = mysql_query("SELECT User FROM user WHERE Password = PASSWORD('$passdb')");
$res = mysql_fetch_array($zapros);

session_start();
$_SESSION['nnn']=$userdb;
$_SESSION['ppp']=$passdb;

mysql_select_db("baza_kkz");
$zapros2 = mysql_query("SELECT * FROM users WHERE name = '$res[User]'");
$res2 = mysql_fetch_array($zapros2);

$_SESSION['prio']=$res2['prio'];

mysql_close($dbcnx);
if ($_POST['name'] == $res['User'] && $userdb <>'') header("Location: start.php");
else ?><BODY>
     <Script Language="JavaScript">
     alert("Невірне ім`я або пароль.");
     document.location="index.html";
     </Script></BODY>;

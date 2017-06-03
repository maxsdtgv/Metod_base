<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.php");

$id_multy=$_GET['id_multy'];
$temp=$_GET['predmet'];
$predmet=urlencode($temp);
$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM multy WHERE id_multy='$id_multy'");
$res=mysql_fetch_array($zapros);
echo ("<body><a href=multy.php target='edit'>Повернутися ...</a><br><br>");

echo ("<hr><TABLE width='100%'>");
#======================================================================================

echo ("<tr><td><B>Циклова комісія:</B></td><td>$res[komis]</td></tr>");
echo ("<tr><td><B>Предмет:</B></td><td>$res[predmet]</td></tr>");
echo ("<tr><td><B>Тема:</B></td><td>$res[nazva]</td></tr>");
echo ("<tr><td><B>Автор:</B></td><td>$res[avtor]</td></tr>");
echo ("<tr><td><B>Анотація:</B></td><td>$res[anotacia]</td></tr>");
echo ("<tr><td><B>Примітка:</B></td><td>$res[primitka]</td></tr>");
if ($res['silka']<>'') echo ("<tr><td><B>Файл:</B></td><td><a href=/baza/multyfiles/$res[silka]>Закачати ...</a></td></tr>");
#======================================================================================

echo ("</TABLE></BODY>");

mysql_close($dbcnx);
?>

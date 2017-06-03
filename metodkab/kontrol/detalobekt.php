<?php
$idk=$_GET['kontrol'];
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");

$mesac=$_SESSION['mesac'];
$nr=$_SESSION['nr'];

$_SESSION['mesac']=$mesac;
$_SESSION['nr']=$nr;

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];
$mesac2 = $_SESSION['mesac2'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM kontrol where id_kontrol='$idk'");
$res = mysql_fetch_array($zapros);
$bo=urlencode($res['obekt']);
echo ("<a href=obekt.php?obekt=$bo target='superblock'>Повернутися до переліку об`єктів контролю `$res[obekt]`...</a><br><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");

echo ("<tr><td><B>Навчальний рік:</B></td>");
echo ("<td>$res[nr]</td></tr>"); 
echo ("<tr><td><B>Об`єкт контролю:</B></td>");
echo ("<td>$res[obekt]</td></tr>"); 
echo ("<tr><td><B>Виконавець:</B></td>");
echo ("<td>$res[familia]"); echo (" ");
echo ("$res[imia]"); echo (" ");
echo ("$res[otchestvo]</td></tr>"); 
echo ("<tr><td><B>Терміни контролю:</B></td><td>");

if ($res['jan']<>'') echo("Січень, $res[jan]; ");
if ($res['feb']<>'') echo("Лютий, $res[feb]; ");
if ($res['march']<>'') echo("Березень, $res[march]; ");
if ($res['apr']<>'') echo("Квітень, $res[apr]; ");
if ($res['may']<>'') echo("Травень, $res[may]; ");
if ($res['june']<>'') echo("Червень, $res[june]; ");
if ($res['july']<>'') echo("Липень, $res[july]; ");
if ($res['august']<>'') echo("Cерпень, $res[august]; ");
if ($res['september']<>'') echo("Вересень, $res[september]; ");
if ($res['october']<>'') echo("Жовтень, $res[october]; ");
if ($res['november']<>'') echo("Листопад, $res[november]; ");
if ($res['december']<>'') echo("Грудень, $res[december]; ");






echo ("</td></tr><tr><td><B>Предмет контролю:</B></td>");
echo ("<td>$res[forma]</td></tr>"); 
echo ("<tr><td><B>Завершення контролю:</B></td>");
echo ("<td>$res[zaversh]</td></tr>"); 
echo ("<tr><td><B>Виконання:</B></td>");
echo ("<td><PRE>$res[vikonan]</PRE></td></tr>"); 
echo ("<tr><td><B>Примітки:</B></td>");
echo ("<td><PRE>$res[primitka]</PRE></td></tr>"); 
echo ("<tr><td><B>Остання дата<br>внесення змін:</B></td>");
echo ("<td>$res[time]</td></tr>"); 


echo ('</table>');

mysql_close($dbcnx);
?>

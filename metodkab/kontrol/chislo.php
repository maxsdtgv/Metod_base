<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.php");

$mesac=$_GET['mesac'];
$nr=$_GET['nr'];
$chislo=$_GET['chislo'];
if ($_GET['mesac']=='') $mesac=$_SESSION['mesac'];
if ($_GET['nr']=='') $nr=$_SESSION['nr'];
$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM kontrol WHERE $mesac<>'' AND nr='$nr'");
if ($mesac=='jan') $mesac2='Січень';
if ($mesac=='feb') $mesac2='Лютий';
if ($mesac=='march') $mesac2='Березень';
if ($mesac=='apr') $mesac2='Квітень';
if ($mesac=='may') $mesac2='Травень';
if ($mesac=='june') $mesac2='Червень';
if ($mesac=='july') $mesac2='Липень';
if ($mesac=='august') $mesac2='Серпень';
if ($mesac=='september') $mesac2='Вересень';
if ($mesac=='october') $mesac2='Жовтень';
if ($mesac=='november') $mesac2='Листопад';
if ($mesac=='december') $mesac2='Грудень';
$_SESSION['mesac2']=$mesac2;
echo ("<a href='mesac.php' target='superblock'>Повернутися до переліку планів контролю за $mesac2...</a><br><br>");

#===============================================================================
echo ("<FONT SIZE=4><CENTER>Контроль виконання на $mesac2 число $chislo.</CENTER></FONT><br>");
#===============================================================================

echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td><B>№ п/п</B></td><td><B>Відповідальний</B></td><td><B>Форма контролю</B></td><td><B>Завершення контролю</B></td>");
echo ("<td><B>Поточний стан</B></td>");

$zaproschislo = mysql_query("SELECT id_kontrol,$mesac FROM kontrol");
$num=0;
while ($res = mysql_fetch_array($zaproschislo))
{
$res[1]=str_pad ($res[1], 20, ",", STR_PAD_BOTH);
$id_kon[$num]=$res[0];
$baza[$num]=$res[1];
$num=$num+1;
}

$num=0;
$pp=1;
while ($baza[$num]<>'')
{
if (preg_match("/,$chislo\,/U", $baza[$num])) :

$zapros = mysql_query("SELECT * FROM kontrol WHERE id_kontrol='$id_kon[$num]'");
while ($res = mysql_fetch_array($zapros))
{
echo ("<tr><td>$pp</td>"); 
echo ("<td>$res[familia]"); echo (" ");
echo ("$res[imia]"); echo (" ");
echo ("$res[otchestvo]</td>"); 
echo ("<td>$res[forma]</td>");
echo ("<td>$res[zaversh]</td>"); 
echo ("<td>$res[vikonan]</td>"); 
echo ("</tr>");
$pp=$pp+1;
}
endif;
$num=$num+1;
}
echo ("</tr>");
echo ("</table>");

mysql_close($dbcnx);
?>

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
if ($mesac=='jan') $mesac2='ѳ����';
if ($mesac=='feb') $mesac2='�����';
if ($mesac=='march') $mesac2='��������';
if ($mesac=='apr') $mesac2='������';
if ($mesac=='may') $mesac2='�������';
if ($mesac=='june') $mesac2='�������';
if ($mesac=='july') $mesac2='������';
if ($mesac=='august') $mesac2='�������';
if ($mesac=='september') $mesac2='��������';
if ($mesac=='october') $mesac2='�������';
if ($mesac=='november') $mesac2='��������';
if ($mesac=='december') $mesac2='�������';
$_SESSION['mesac2']=$mesac2;
echo ("<a href='mesac.php' target='superblock'>����������� �� ������� ����� �������� �� $mesac2...</a><br><br>");

#===============================================================================
echo ("<FONT SIZE=4><CENTER>�������� ��������� �� $mesac2 ����� $chislo.</CENTER></FONT><br>");
#===============================================================================

echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td><B>� �/�</B></td><td><B>³�����������</B></td><td><B>����� ��������</B></td><td><B>���������� ��������</B></td>");
echo ("<td><B>�������� ����</B></td>");

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

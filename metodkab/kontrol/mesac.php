<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.php");

$mesac=$_GET['mesac'];
$nr=$_GET['nr'];

if ($_GET['mesac']=='') $mesac=$_SESSION['mesac'];
if ($_GET['nr']=='') $nr=$_SESSION['nr'];

$_SESSION['mesac']=$mesac;
$_SESSION['nr']=$nr;

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
echo ("<a href='kontrol.php' target='superblock'>����������� �� ������� ����� ��������...</a><br><br>");

#===============================================================================

echo ("<FONT SIZE=4><CENTER>�������� �� ������ ����� $mesac2 ");

#$i=1;
#while ($i<=31)
#{

#$zaproschislo = mysql_query("SELECT distinct $mesac FROM kontrol WHERE (locate('$i,',$mesac)>0) ORDER BY $mesac ASC");

#$res = mysql_fetch_array($zaproschislo);

#if ($res<>'') echo ("<a href='chislo.php' target='superblock'> $i</a>, ");

#$i=$i+1;

#}

$zaproschislo = mysql_query("SELECT $mesac FROM kontrol");
$num=0;
while ($res = mysql_fetch_array($zaproschislo))
{
if ($res[0]<>'') {
$res[0]=str_pad ($res[0], 20, ",", STR_PAD_BOTH);
$baza[$num]=$res[0]; 
$num=$num+1;
}
}

$user_info=implode("", $baza);

$fields = preg_split("/[,]/",$user_info,-1,PREG_SPLIT_NO_EMPTY); 
$x=0;
while ($x < sizeof($fields))
{
$baza[$x]=$fields[$x];
$x=$x+1;
}
sort($baza,SORT_NUMERIC);
$num=0;
while ($baza[$num]<>'')
{
if ($last<>$baza[$num]) {echo ("<a href=chislo.php?chislo=$baza[$num]&mesac=$mesac target='superblock'>$baza[$num]</a>, "); $last=$baza[$num];}
$num=$num+1;
}
echo ("</CENTER></FONT><br>");


#===============================================================================
echo ("<FONT SIZE=4><CENTER>������ �������� �� $mesac2 � $nr ����������� ����.</CENTER></FONT><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td><B>��`��� ��������</B></td><td><B>³�����������</B></td><td><B>���� ���������</B></td><td><B>����� ��������</B></td>");
echo ("<td><B>���������� ��������</B></td><td><B>�������� ����</B></td><td><B>���������...</B></td>");

while ($res = mysql_fetch_array($zapros))
{
echo ("<tr><td>$res[obekt]</td>"); 

echo ("<td>$res[familia]"); echo (" ");
echo ("$res[imia]"); echo (" ");
echo ("$res[otchestvo]</td>"); 

echo ("<td>$mesac2, $res[$mesac]</td>");
echo ("<td>$res[forma]</td>");
echo ("<td>$res[zaversh]</td>"); 
echo ("<td>$res[vikonan]</td>"); 
echo ("<td><a href=detalkontrol.php?kontrol=$res[id_kontrol]>���������...</a></td>");

echo ("</tr>");
}
echo ("</table>");

mysql_close($dbcnx);
?>

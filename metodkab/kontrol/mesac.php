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
echo ("<a href='kontrol.php' target='superblock'>Повернутися до переліку планів контролю...</a><br><br>");

#===============================================================================

echo ("<FONT SIZE=4><CENTER>Контроль по числам місяця $mesac2 ");

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
echo ("<FONT SIZE=4><CENTER>Терміни контролю за $mesac2 у $nr навчальному році.</CENTER></FONT><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td><B>Об`єкт контролю</B></td><td><B>Відповідальний</B></td><td><B>Дата виконання</B></td><td><B>Форма контролю</B></td>");
echo ("<td><B>Завершення контролю</B></td><td><B>Поточний стан</B></td><td><B>Детальніше...</B></td>");

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
echo ("<td><a href=detalkontrol.php?kontrol=$res[id_kontrol]>Детальніше...</a></td>");

echo ("</tr>");
}
echo ("</table>");

mysql_close($dbcnx);
?>

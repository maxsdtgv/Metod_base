<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");

$zapros = mysql_query("SELECT * FROM grupi WHERE type='predmet' order by binary(znachenie) asc");
$zapros2 = mysql_query("SELECT * FROM grupi WHERE type='grupa' order by binary(znachenie) asc");
#===============================================================================
echo ("<body><table width='100%' border='0' cellspacing='0' cellpadding='0'>");

echo ("<tr><td><B><a href=dodati.php?type=predmet>������ ����� �������</a></B></td>");
echo ("<td><B><a href=dodati.php?type=grupa>������ ���� �����</a></B></td></tr>");
echo ("</table><hr>");

#===============================================================================
echo ("<B><FONT SIZE=4>������ �������� ���.</FONT></B>");

echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td><B>� �.�.</B></td><td><B>������ ��������</B></td>");


#echo ("<td><B>������</B></td></tr>");
echo ("<td><B>��������</B></td></tr>");

$num="0";
while ($res = mysql_fetch_array($zapros))
{
echo ("<tr><td>");
$num=$num+1;
print ($num);
echo ("</td><td>"); 
echo $res["znachenie"];echo " ";
echo ("</td>");
#echo ("<td><a href=detalmetod.php?prep=$res[id_prep]>������ ...</a></td>");
echo ("<td><a href=del.php?id_grupi=$res[id_grupi]>��������</a></td>");
echo ("</tr>");

}
echo ("</table><br>");
#===============================================================================
echo ("<body><B><FONT SIZE=4>������ ���� ���.</FONT></B>");

echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td><B>� �.�.</B></td><td><B>������ ����</B></td>");

#echo ("<td><B>������</B></td></tr>");
echo ("<td><B>��������</B></td></tr>");

$num="0";
while ($res = mysql_fetch_array($zapros2))
{
echo ("<tr><td>");
$num=$num+1;
print ($num);
echo ("</td><td>"); 
echo $res["znachenie"];echo " ";
echo ("</td>");
#echo ("<td><a href=detalmetod.php?prep=$res[id_prep]>������ ...</a></td>");
echo ("<td><a href=del.php?id_grupi=$res[id_grupi]>��������</a></td>");
echo ("</tr>");

}
echo ("</table></body>");


mysql_close($dbcnx);
?>

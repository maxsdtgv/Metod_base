<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM kontrol");

echo ("<FONT SIZE=4><CENTER>������ ����� ����������� ��������.</CENTER></FONT><br>");
echo ("<a href='./addkontrollist.php' target='edit'>������ ���� ��������...</a><br><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td>�.�.</td><td>��`��� ��������</td><td>³�����������</td><td>���.</td><td>���.</td>");
echo ("<td>���.</td><td>���.</td><td>ѳ�.</td><td>���.</td><td>���.</td><td>���.</td>");
echo ("<td>���.</td><td>���.</td><td>���.</td><td>���.</td>");
echo ("<td>���������</td><td>���������...</td><td>������...</td><td>�������� ������...</td></tr>");

while ($res = mysql_fetch_array($zapros))
{
echo ("<tr><td>$res[nr]</td>"); 
echo ("<td>$res[obekt]</td>"); 
echo ("<td>$res[familia]</td>");
echo ("<td>$res[september]</td>");
echo ("<td>$res[october]</td>"); 
echo ("<td>$res[november]</td>"); 
echo ("<td>$res[december]</td>"); 
echo ("<td>$res[jan]</td>"); 
echo ("<td>$res[feb]</td>"); 
echo ("<td>$res[march]</td>"); 
echo ("<td>$res[apr]</td>"); 
echo ("<td>$res[may]</td>"); 
echo ("<td>$res[june]</td>"); 
echo ("<td>$res[july]</td>"); 
echo ("<td>$res[august]</td>");   
echo ("<td>$res[vikonan]</td>");
echo ("<td><a href=detalkontrol.php?kontrol=$res[id_kontrol]>���������...</a></td>");
echo ("<td><a href=editkontrol.php?kontrol=$res[id_kontrol]>������...</a></td>");
echo ("<td><a href=delkontrol.php?kontrol=$res[id_kontrol]>������� �����...</a></td>");
echo ("</tr>");
}
echo ("</table>");

mysql_close($dbcnx);
?>
<?php
echo ("<html><body><dl>");
echo ("<FONT SIZE=4>������ �����:</FONT><br>");
echo ("<dt><br>1. ����� �� ��������� ���.<br><br>");

session_start();
$userlogin=$_SESSION['nnn'];
$userpass=$_SESSION['ppp'];
$dbcnx=mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros=mysql_query("SELECT distinct rada FROM pedsovet");
$num="0";
while ($res=mysql_fetch_array($zapros))
{
$num=$num+1;
$rad=urlencode($res['rada']);
echo ("<dd><a href=radi.php?rada=$rad target='superblock'>1.$num $res[rada] ...</a>"); echo ("<br><br>");
}
mysql_close($dbcnx);

#echo ("<dt><a href="/baza/construkt.php" target="tabprep">4. ����� �������� ������ ...</a><br><br>");
#echo ("<dt><a href="/baza/construkt.php" target="tabprep">5. ϳ�������� ����������� ���������� ...</a><br><br>");
echo ("<dt><a href=/baza/metodkab/kontrol/kontrol.php target='superblock'>2. �������� �������� ...</a><br><br>");
#echo ("<dt><a href="/baza/construkt.php" target="tabprep">7. ������������-������� ������ ...</a>");
echo ("</dl></body></html>");

?>

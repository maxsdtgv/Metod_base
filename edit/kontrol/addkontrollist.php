<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];



echo ("<html>");
echo ("<form action=addkontrolmake.php method=post>");
echo ("<CENTER><P><FONT SIZE=6>������ ���������� ��� ����� ����:</FONT></CENTER>");
echo ("<br><br><table width='100%'' border='1'>");
echo ("<tr><td>����� ��`��� ��������:</td><td><TEXTAREA name=newobekt rows='8' cols='100'></textarea></td></tr>");
echo ("<tr><td>�������� ��`��� ��������:</td><td><SELECT name=oldobekt>");
$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT distinct obekt FROM kontrol");
while ($res = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res[obekt]'>$res[obekt]"); 
}
echo ("</SELECT></td></tr>");

echo ("<tr><td>�������:</td><td><input type=text name=familia></td></tr>");
echo ("<tr><td>��`�:</td><td><input type=text name=imia></td></tr>");
echo ("<tr><td>��-�������:</td><td><input type=text name=otchestvo></td></tr>");

echo ("<tr><td>����� ���������� ��:</td><td><input type=text name=newnr></td></tr>");
echo ("<tr><td>�������� ���������� ��:</td><td><SELECT name=oldnr>");


$zapros = mysql_query("SELECT distinct nr FROM kontrol");

while ($res = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res[nr]'>$res[nr]"); 
}

echo ("</SELECT></td></tr>");

echo ("<tr><td>��������:</td><td><input type=text name=september></td></tr>");
echo ("<tr><td>�������:</td><td><input type=text name=october></td></tr>");
echo ("<tr><td>��������:</td><td><input type=text name=november></td></tr>");
echo ("<tr><td>�������:</td><td><input type=text name=december></td></tr>");
echo ("<tr><td>ѳ����:</td><td><input type=text name=jan></td></tr>");
echo ("<tr><td>�����:</td><td><input type=text name=feb></td></tr>");
echo ("<tr><td>��������:</td><td><input type=text name=march></td></tr>");
echo ("<tr><td>������:</td><td><input type=text name=apr></td></tr>");
echo ("<tr><td>�������:</td><td><input type=text name=may></td></tr>");
echo ("<tr><td>�������:</td><td><input type=text name=june></td></tr>");
echo ("<tr><td>������:</td><td><input type=text name=july></td></tr>");
echo ("<tr><td>�������:</td><td><input type=text name=august></td></tr>");


echo ("<tr><td>����� ��������:</td><td><TEXTAREA name=forma rows='8' cols='100'></textarea></td></tr>");
echo ("<tr><td>���������� ��������:</td><td><TEXTAREA name=zaversh rows='8' cols='100'></textarea></td></tr>");
echo ("<tr><td>���������:</td><td><TEXTAREA name=vikonan rows='8' cols='100'></textarea></td></tr>");
echo ("<tr><td>�������:</td><td><TEXTAREA name=primitka rows='8' cols='100'></textarea></td></tr>");
echo ("</table><br><br>");
echo ("<input type=submit value=������ ����������>");

echo ("</form>");
echo ("</html>");

mysql_close($dbcnx);
?>
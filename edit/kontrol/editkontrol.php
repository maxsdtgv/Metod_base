<?php

session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.php");
$idk=$_GET['kontrol'];
$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];
$_SESSION['kontrol']=$idk;

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");


$zapros = mysql_query("SELECT * FROM kontrol where id_kontrol='$idk'");
$res = mysql_fetch_array($zapros);
echo ("<form action=makeedit.php method=post>");
echo ("<CENTER><B>����������� ������.</B></CENTER>");
echo ("<table width='100%'>");

echo ("<tr><td>����� ��`��� ��������:</td><td><TEXTAREA name=newobekt rows='8' cols='100'></textarea></td></tr>");
echo ("<tr><td>�������� ��`��� ��������:</td><td><SELECT name=oldobekt>");

$zapros = mysql_query("SELECT distinct obekt FROM kontrol");
while ($res2 = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res2[obekt]'>$res2[obekt]"); 
}
echo ("</SELECT></td></tr>");

echo ("<tr><td>�������:</td><td><input type=text name=familia value='$res[familia]'></td></tr>");
echo ("<tr><td>��`�:</td><td><input type=text name=imia value='$res[imia]'></td></tr>");
echo ("<tr><td>��-�������:</td><td><input type=text name=otchestvo value='$res[otchestvo]'></td></tr>");

echo ("<tr><td>����� ���������� ��:</td><td><input type=text name=newnr></td></tr>");
echo ("<tr><td>�������� ���������� ��:</td><td><SELECT name=oldnr>");


$zapros = mysql_query("SELECT distinct nr FROM kontrol");

while ($res3 = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res3[nr]'>$res3[nr]"); 
}

echo ("</SELECT></td></tr>");

echo ("<tr><td>��������:</td><td><input type=text name=september value='$res[september]'></td></tr>");
echo ("<tr><td>�������:</td><td><input type=text name=october value='$res[october]'></td></tr>");
echo ("<tr><td>��������:</td><td><input type=text name=november value='$res[november]'></td></tr>");
echo ("<tr><td>�������:</td><td><input type=text name=december value='$res[december]'></td></tr>");
echo ("<tr><td>ѳ����:</td><td><input type=text name=jan value='$res[jan]'></td></tr>");
echo ("<tr><td>�����:</td><td><input type=text name=feb value='$res[feb]'></td></tr>");
echo ("<tr><td>��������:</td><td><input type=text name=march value='$res[march]'></td></tr>");
echo ("<tr><td>������:</td><td><input type=text name=apr value='$res[apr]'></td></tr>");
echo ("<tr><td>�������:</td><td><input type=text name=may value='$res[may]'></td></tr>");
echo ("<tr><td>�������:</td><td><input type=text name=june value='$res[june]'></td></tr>");
echo ("<tr><td>������:</td><td><input type=text name=july value='$res[july]'></td></tr>");
echo ("<tr><td>�������:</td><td><input type=text name=august value='$res[august]'></td></tr>");


echo ("<tr><td>����� ��������:</td><td><TEXTAREA name=forma rows='8' cols='100'>$res[forma]</textarea></td></tr>");
echo ("<tr><td>���������� ��������:</td><td><TEXTAREA name=zaversh rows='8' cols='100'>$res[zaversh]</textarea></td></tr>");
echo ("<tr><td>���������:</td><td><TEXTAREA name=vikonan rows='8' cols='100'>$res[vikonan]</textarea></td></tr>");
echo ("<tr><td>�������:</td><td><TEXTAREA name=primitka rows='8' cols='100'>$res[primitka]</textarea></td></tr>");

echo ("</table>");

echo ("<INPUT TYPE=submit value='������ ����'>"); 

mysql_close($dbcnx);
?>
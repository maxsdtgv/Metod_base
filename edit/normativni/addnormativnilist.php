<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.php");
$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];
echo ("<html>");
echo ("<form action=addnormativnimake.php method=post>");
echo ("<CENTER><P><FONT SIZE=6>������ ���������� ��� ����� ����������� �����:</FONT></CENTER>");
echo ("<br><br><table width='100%' border='1'>");
#=====================================================================
echo ("<tr><td>����� ������ ������:</td><td><TEXTAREA name=newrozdil rows='8' cols='90'></textarea></td></tr>");
echo ("<tr><td>�������� �����:</td><td><SELECT name=oldrozdil>");
$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT distinct rozdil FROM normativna");
while ($res = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res[rozdil]'>$res[rozdil]"); 
}
echo ("</SELECT></td></tr>");
#======================================================================
echo ("<tr><td>����� ��� ���������:</td><td><input type=text name=newtyp></td></tr>");
echo ("<tr><td>�������� ��� ���������:</td><td><SELECT name=oldtyp>");
$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT distinct typ FROM normativna");
while ($res = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res[typ]'>$res[typ]"); 
}
echo ("</SELECT></td></tr>");
#======================================================================
#======================================================================
echo ("<tr><td>����� ������:</td><td><input type=text name=nomernakazu></td></tr>");
#======================================================================
echo ("<tr><td>���� ����� ���������:</td><td><TEXTAREA name=newnazva rows='8' cols='90'></textarea></td></tr>");
echo ("<tr><td>�������� ����� ���������:</td><td><SELECT name=oldnazva>");
$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT distinct nazva FROM normativna");
while ($res = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res[nazva]'>$res[nazva]"); 
}
echo ("</SELECT></td></tr>");
#======================================================================
#======================================================================
echo ("<tr><td>���� ���������:</td><td><TEXTAREA name=newregistr rows='8' cols='90'></textarea></td></tr>");
echo ("<tr><td>������� ���������:</td><td><SELECT name=oldregistr>");
$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT distinct registr FROM normativna");
while ($res = mysql_fetch_array($zapros))
{
echo ("<OPTION value='$res[registr]'>$res[registr]"); 
}
echo ("</SELECT></td></tr>");
#======================================================================
#======================================================================
echo ("<tr><td>���������:</td><td><TEXTAREA name=preambula rows='8' cols='90'></textarea></td></tr>");

#======================================================================
#======================================================================
echo ("<tr><td>����� ������:</td><td><TEXTAREA name=nazvarozdilu rows='8' cols='90'></textarea></td></tr>");

#======================================================================
#======================================================================
echo ("<tr><td>ϳ������ (����� � ����������):</td><td><TEXTAREA name=pidrozdil rows='8' cols='90'></textarea></td></tr>");

#======================================================================

echo ("</table><br><br>");
echo ("<input type=submit value=������ ����������>");

echo ("</form>");
echo ("</html>");

mysql_close($dbcnx);
?>

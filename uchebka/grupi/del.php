<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.html");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$id_grupi=$_GET['id_grupi'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM grupi WHERE id_grupi=$id_grupi");
$res = mysql_fetch_array($zapros);

echo("<FONT SIZE=6>��������� ������ � �����������:</FONT><br><br><FONT SIZE=4>");

if ($res[type] == 'predmet') { 
echo("����� ��������: $res[znachenie] <br><br>");
echo("�������: $res[prim] <br><br><br>");
}
if ($res[type] == 'grupa') { 
echo("����� �����: $res[znachenie] <br><br>");
echo("ʳ������ ������� ����: $res[platnie] <br><br>");
echo("ʳ������ ��������� ����: $res[budget] <br><br>");
echo("�������: $res[prim] <br><br><br>");
}

mysql_close($dbcnx);
echo("</FONT><a href='delmake.php?id_grupi=$res[id_grupi]'>�������� ��� ������������ ��������� ...</a><br><br>");
echo("<a href='grupitapredmeti.php'>����������� �� ������� ���� �� �������� ...</a>");
?>

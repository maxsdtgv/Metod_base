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

echo("<FONT SIZE=6>Видалення запису з параметрами:</FONT><br><br><FONT SIZE=4>");

if ($res[type] == 'predmet') { 
echo("Назва предмету: $res[znachenie] <br><br>");
echo("Примітка: $res[prim] <br><br><br>");
}
if ($res[type] == 'grupa') { 
echo("Назва групи: $res[znachenie] <br><br>");
echo("Кількість платних місць: $res[platnie] <br><br>");
echo("Кількість бюджетних місць: $res[budget] <br><br>");
echo("Примітка: $res[prim] <br><br><br>");
}

mysql_close($dbcnx);
echo("</FONT><a href='delmake.php?id_grupi=$res[id_grupi]'>Натисніть для підтвердження видалення ...</a><br><br>");
echo("<a href='grupitapredmeti.php'>Повернутися до переліку груп та предметів ...</a>");
?>

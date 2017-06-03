<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM kontrol");

echo ("<FONT SIZE=4><CENTER>Перелік планів внутрішнього контролю.</CENTER></FONT><br>");
echo ("<a href='./addkontrollist.php' target='edit'>Додати план контролю...</a><br><br>");
echo ("<table width='100%' border='1' cellspacing='0' cellpadding='0'>");
echo ("<tr><td>Н.Р.</td><td>Об`єкт контролю</td><td>Відповідальний</td><td>Вер.</td><td>Жов.</td>");
echo ("<td>Лис.</td><td>Грд.</td><td>Січ.</td><td>Лют.</td><td>Бер.</td><td>Квт.</td>");
echo ("<td>Трв.</td><td>Чрв.</td><td>Лип.</td><td>Срп.</td>");
echo ("<td>Виконання</td><td>Детальніше...</td><td>Змінити...</td><td>Знищення запису...</td></tr>");

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
echo ("<td><a href=detalkontrol.php?kontrol=$res[id_kontrol]>Детальніше...</a></td>");
echo ("<td><a href=editkontrol.php?kontrol=$res[id_kontrol]>Змінити...</a></td>");
echo ("<td><a href=delkontrol.php?kontrol=$res[id_kontrol]>Знищити запис...</a></td>");
echo ("</tr>");
}
echo ("</table>");

mysql_close($dbcnx);
?>
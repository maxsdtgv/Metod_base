<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.php");

$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$type = $_GET['type'];
$_SESSION['type'] = $type;

echo ("<html>");
echo ("<form action=add.php method=post>");
#===============================================================================
if ($type == 'predmet') {
echo ("<CENTER><P><FONT SIZE=6>Введіть інформацію про новий предмет:</FONT></CENTER>");
echo ("<br>");
echo ("Назва нового предмету:<input type=text name=new><br>");
echo ("Примітка:<TEXTAREA name=prim rows='3' cols='50'></TEXTAREA><br>");
echo ("<input type=submit value=Внести інформацію про новий предмет>");
}
#===============================================================================
if ($type == 'grupa') {
echo ("<CENTER><P><FONT SIZE=6>Введіть інформацію про нову групу:</FONT></CENTER>");
echo ("<br><br>");
echo ("Назва нової групи:<input type=text name=new><br>");
echo ("Кількість контрактних місць:<input type=text name=platni><br>");
echo ("Кількість бюджетних місць:<input type=text name=budget><br>");
echo ("Примітка:<TEXTAREA name=prim rows='3' cols='50'></TEXTAREA><br>");
echo ("<input type=submit value=Внести інформацію про нову групу>");
}
#===============================================================================

echo ("</form>");
echo ("</html>");

mysql_close($dbcnx);
?>
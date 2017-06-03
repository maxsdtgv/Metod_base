<?php
$idp=$_GET['prep'];
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: index.php");
$_SESSION['prep']=$idp;
$userlogin = $_SESSION['nnn'];
$userpass = $_SESSION['ppp'];

$dbcnx = mysql_connect("localhost",$userlogin,$userpass);
mysql_select_db("baza_kkz");
$zapros = mysql_query("SELECT * FROM prepod where id_prep='$idp'");
$res = mysql_fetch_array($zapros);
echo ("<form action=makeedit.php method=post>");
echo ("<table width='100%'>");
echo ("<tr><td>Прізвище:</td>");
echo ("<td><input type=text name=familia value='$res[familia]'></td></tr>"); 
echo ("<tr><td>Ім`я:</td>");
echo ("<td><input type=text name=imia value='$res[imia]'></td></tr>"); 
echo ("<tr><td>По-батькові:</td>");
echo ("<td><input type=text name=otchestvo value='$res[otchestvo]'></td></tr>"); 
echo ("<tr><td>Рік народження:</td>");
echo ("<td><input type=text name=gr value='$res[gr]'></td></tr>"); 
echo ("<tr><td>Освіта:</td>");
echo ("<td><TEXTAREA name=obrazov rows='8' cols='90'>$res[obrazov]</TEXTAREA></td></tr>"); 
echo ("<tr><td>Кваліфікація:</td>");
echo ("<td><TEXTAREA name=kvalif rows='8' cols='90'>$res[kvalif]</TEXTAREA></td></tr>"); 
echo ("<tr><td>Відкриті заходи:</td>");
echo ("<td><TEXTAREA name=otkrurok rows='8' cols='90'>$res[otkrurok]</TEXTAREA></td></tr>"); 
echo ("<tr><td>Аттестація:</td>");
echo ("<td><TEXTAREA name=attest rows='8' cols='90'>$res[attest]</TEXTAREA></td></tr>"); 
echo ("<tr><td>Методичні розробки:</td>");
echo ("<td><TEXTAREA name=metodrab rows='8' cols='90'>$res[metodrab]</TEXTAREA></td></tr>"); 
echo ("<tr><td>Примітки:</td>");
echo ("<td><TEXTAREA name=primitka rows='8' cols='90'>$res[primitka]</TEXTAREA></td></tr>"); 
echo ("</table>");

echo ("<INPUT TYPE=submit value='Внести зміни'>"); 

mysql_close($dbcnx);
?>
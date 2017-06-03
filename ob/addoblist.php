<?php
echo ("<html>");
echo ("<form action=addobmake.php method=post>");
echo ("<CENTER><P><FONT SIZE=6>Введіть інформацію про нову об`яву:</FONT></CENTER>");
echo ("<br><br><table width='100%'' border='1'>");
echo ("<tr><td>Дата (РРРР-ММ-ЧЧ):</td><td><input type=text name=data></td></tr>");
echo ("<tr><td>Час:</td><td><input type=text name=chas></td></tr>");
echo ("<tr><td>Змісто об`яви:</td><td><TEXTAREA name=zmist rows='8' cols='90'></textarea></td></tr>");
echo ("</table><br><br>");
echo ("<input type=submit value=Внести інформацію>");

echo ("</form>");
echo ("</html>");
?>

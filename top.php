<?php
session_start();
if ($_SESSION['nnn']=='' && $_SESSION['ppp']=='') header("Location: /baza/index.html");
echo ("<html>");
echo ("<body bgcolor='#43D8FB'>");
echo ("<table width='100%' border='0' cellspacing='0' cellpadding='0'>");
echo ("<tr>");
echo ("<td width='126' valign='top'>");

$date_time_array = getdate(time());
$den = $date_time_array['weekday'];
if ($den=='Monday') $den='Понеділок';
if ($den=='Tuesday') $den='Вівторок';
if ($den=='Wednesday') $den='Середа';
if ($den=='Thursday') $den='Четвер';
if ($den=='Friday') $den='П`ятниця';
if ($den=='Saturday') $den='Субота';
if ($den=='Sunday') ($den='Неділя');
$chislo = $date_time_array['mday'];
$mesac = $date_time_array['mon'];
if ($mesac=='1') $mesac='Січня';
if ($mesac=='2') $mesac='Лютого';
if ($mesac=='3') $mesac='Березня';
if ($mesac=='4') $mesac='Квітня';
if ($mesac=='5') $mesac='Травня';
if ($mesac=='6') $mesac='Червня';
if ($mesac=='7') $mesac='Липня';
if ($mesac=='8') $mesac='Серпня';
if ($mesac=='9') $mesac='Вересня';
if ($mesac=='10') $mesac='Жовтня';
if ($mesac=='11') $mesac='Листопада';
if ($mesac=='12') $mesac='Грудня';
$god=$date_time_array['year'];
echo("Сьогодні: $den, $chislo $mesac $god р.");

echo ("</td>");

echo ("<td valign='top'>");
echo ("<FONT SIZE=4><CENTER><B>Обліково-методичний ресурс<br>Київського коледжу зв`язку</B></CENTER></FONT>");
echo ("</td>");
echo ("</tr>");
echo ("</table>");
echo ("</body>");
echo ("</html>");
?>

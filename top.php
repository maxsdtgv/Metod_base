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
if ($den=='Monday') $den='��������';
if ($den=='Tuesday') $den='³������';
if ($den=='Wednesday') $den='������';
if ($den=='Thursday') $den='������';
if ($den=='Friday') $den='�`������';
if ($den=='Saturday') $den='������';
if ($den=='Sunday') ($den='�����');
$chislo = $date_time_array['mday'];
$mesac = $date_time_array['mon'];
if ($mesac=='1') $mesac='ѳ���';
if ($mesac=='2') $mesac='������';
if ($mesac=='3') $mesac='�������';
if ($mesac=='4') $mesac='�����';
if ($mesac=='5') $mesac='������';
if ($mesac=='6') $mesac='������';
if ($mesac=='7') $mesac='�����';
if ($mesac=='8') $mesac='������';
if ($mesac=='9') $mesac='�������';
if ($mesac=='10') $mesac='������';
if ($mesac=='11') $mesac='���������';
if ($mesac=='12') $mesac='������';
$god=$date_time_array['year'];
echo("�������: $den, $chislo $mesac $god �.");

echo ("</td>");

echo ("<td valign='top'>");
echo ("<FONT SIZE=4><CENTER><B>�������-���������� ������<br>��������� ������� ��`����</B></CENTER></FONT>");
echo ("</td>");
echo ("</tr>");
echo ("</table>");
echo ("</body>");
echo ("</html>");
?>

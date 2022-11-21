<!DOCTYPE html>
<html>
<head>



</head>
<style>
</style>
<?php
echo "<br>Andrius Labrencius 67ZP18MOD  </ br> "
?>
<?php
$monthNames = Array("Sausis", "Vasaris", "Kovas", "Balandis", "Geguzė", "Birželis", "Liepa", 
"Rugpjūtis", "Rugsėjis", "Spalis", "Lapkritis", "Gruodis"); //menesiu pavadinimai
?>

<?php
if (!isset($_REQUEST["month"])) $_REQUEST["month"] = date("n"); //Pirmiausia turime patikrinti, ar jau nustatėme parametrus.
// Jei neturime, nustatome juos pagal einamąjį mėnesį ir metus.
if (!isset($_REQUEST["year"])) $_REQUEST["year"] = date("Y");
?>

<?php
$cMonth = $_REQUEST["month"];
$cYear = $_REQUEST["year"];
 //$ cMonth ir $ cYear naudojami einamajam mėnesiui ir metams, rodomiems kalendoriuje.
 // Nuorodoms „Ankstesnis“ ir „Kitas“ mums reikės atitinkamų parametrų.
 // Mes nustatėme dabartinį dolerį $ prev_year ir $ next_year.
$prev_year = $cYear;
$next_year = $cYear;
$prev_month = $cMonth-1;
$next_month = $cMonth+1;
 
if ($prev_month == 0 ) {
    $prev_month = 12;
    $prev_year = $cYear - 1;
}
if ($next_month == 13 ) {
    $next_month = 1;
    $next_year = $cYear + 1;
}
?>

<table width="200">
<tr align="center">
<td bgcolor="#999999" style="color:#FFFFFF">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="50%" align="left">  <a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $prev_month . "&year=" . $prev_year; ?>" style="color:#FFFFFF">Ankstesnis</a></td>
<td width="50%" align="right"><a href="<?php echo $_SERVER["PHP_SELF"] . "?month=". $next_month . "&year=" . $next_year; ?>" style="color:#FFFFFF">Kitas</a>  </td>
</tr>
</table>
</td>
</tr>
<tr>
<td align="center">
<table width="100%" border="0" cellpadding="2" cellspacing="2">
<tr align="center">
<td colspan="7" bgcolor="#999999" style="color:#FFFFFF"><strong><?php echo $monthNames[$cMonth-1].' '.$cYear; ?></strong></td>
</tr>
<tr> 
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Sekmadienis</strong></td> 
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Pirmadienis</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Antradienis</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Trečiadienis</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Ketvirtadienis</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Penktadienis</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>Šeštadienis</strong></td>
</tr>
<?php 
$timestamp = mktime(0,0,0,$cMonth,1,$cYear);
$maxday = date("t",$timestamp);
$thismonth = getdate ($timestamp);
$startday = $thismonth['wday'];
for ($i=0; $i<($maxday+$startday); $i++) {
    if(($i % 7) == 0 ) echo "<tr>";
    if($i < $startday) echo "<td></td>";
    else echo "<td align='center' valign='middle' height='20px'>". ($i - $startday + 1) . "</td>";
    if(($i % 7) == 6 ) echo "</tr>";
}
?>
</table>
</td>
</tr>
</table>
</html>
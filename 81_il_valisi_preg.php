<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<?
error_reporting(1);
function get($a,$b,$c){
$y = explode($b,$a);
$x = explode($c,$y[1]);
$str=$x;
return $str;
}
function ara($bas, $son, $yazi)
{
    @preg_match_all('/' . preg_quote($bas, '/') .
    '(.*?)'. preg_quote($son, '/').'/i', $yazi, $m);
	

    return @$m[0];
}
/*
function tarihara($bas, $son, $yazi)
{
    @preg_match_all('/' . preg_quote($bas, '/') .
    '(.*?)'. preg_quote($son, '/').'/i', $yazi, $m);


    return @$m[0];
}
*/
?>
<table border="1">
<tr>
<td>Şehir</td>
<td>Plaka</td>
<td>Alan Kodu</td>
<td>Vali</td>
<td>Telefon</td>
<td>İl Emniyet Tel</td>
<td>İl Jandarma Tel</td>
<td>Belediye Bşk. Tel</td>
</tr>
<?
$il_sayisi=1;
while($il_sayisi<82){
$site = "https://www.e-icisleri.gov.tr/GeneleAcikSayfalar/IlBilgileri/Il_Bilgileri_Haritasi.aspx?IlKey=$il_sayisi";
$icerik = file_get_contents($site);
$konum = ara('<td>', '</td>', $icerik);
?>

<?
$sayac=0;
foreach ($konum  as $veri)
{
 $bulunan=strip_tags($veri);
//die(var_dump($bulunan));
	if($sayac<8) {	
		
		if ($bulunan <> NULL || $bulunan<>"" || $bulunan<>" ") echo "<td>".$bulunan."</td>";
	}

	$sayac++;
	$x++;
}
?>
</tr>
<?
$il_sayisi++;
//die(var_dump($bulunan));
}
?>
</table>

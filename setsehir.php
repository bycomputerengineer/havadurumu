<?php
	$sehirler = $_POST['veri'];
	$sehirler = explode(" ", $sehirler);
	$dosya = fopen("bilgi.txt","w");
	foreach ($sehirler as $sehir) {
		$sehir .= "\r\n";
		fwrite($dosya, $sehir);
		echo $sehir;
	}
	fclose($dosya);
?>
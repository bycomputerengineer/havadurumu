<?php
	$dosya = fopen("bilgi.txt","r");
	
	while(!feof($dosya)){
		$sehir = gets($dosya);
		$veri = file_get_contents($serviceUrl.'/merkezler?il='.$sehir);
		$bilgi_dizisi = json_decode($veri);
	}

	fclose($dosya);
?>
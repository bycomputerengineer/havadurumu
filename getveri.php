<?php
	$servisUrl = "http://212.175.180.28/api";
	$sehirler = $_POST['veri'];
	
	foreach ($sehirler as $sehir) {
		$veri1 = file_get_contents($servisUrl.'/merkezler?il='.$sehir, true);
		$bilgi_dizisi1 = json_decode($veri1);
		echo '*<div class="item row">';
			foreach($bilgi_dizisi1 as $i){
				$veri2 = file_get_contents($servisUrl.'/sondurumlar?istno='.$i->sondurumIstNo, true);
				$bilgi_dizisi2 = json_decode($veri2);
				foreach ($bilgi_dizisi2 as $j) {
					echo '<p class="item-pl">'.$i->il."</p>";
					echo '<img class="item-img" src="hadiseler/'.$j->hadiseKodu.'.png">';
					echo '<p class="item-ph">';
					switch ($j->hadiseKodu) {
						case 'A': echo "Açık"; break;
						case 'AB': echo "Az Bulutlu"; break;
						case 'PB': echo "Parçalı Bulutlu"; break;
						case 'CB': echo "Çok Bulutlu"; break;
						case 'HY': echo "Hafif Yağmurlu"; break;
						case 'Y': echo "Yağmurlu"; break;
						case 'KY': echo "Kuvvetli Yağmurlu"; break;
						case 'KKY': echo "Karla Karışık Yağmurlu"; break;
						case 'HKY': echo "Hafif Kar Yağışlı"; break;
						case 'K': echo "Kar Yağışlı"; break;
						case 'YKY': echo "Yoğun Kar Yağışlı"; break;
						case 'HSY': echo "Hafif Sağanak Yağışlı"; break;
						case 'SY': echo "Sağanak Yağışlı"; break;
						case 'KSY': echo "Kuvvetli Sağanak Yağışlı"; break;
						case 'MSY': echo "Mevzi Sağanak Yağışlı"; break;
						case 'DY': echo "Dolu"; break;
						case 'GSY': echo "Gökgürültülü Sağanak Yağışlı"; break;
						case 'KGY': echo "Kuvvetli Gökgürültülü Sağanak Yağışlı"; break;
						case 'SIS': echo "Sisli"; break;
						case 'PUS': echo "Puslu"; break;
						case 'DMN': echo "Dumanlı"; break;
						case 'KF': echo "Toz veya Kum Fırtınası"; break;
						case 'R': echo "Rüzgarlı"; break;
						case 'GKR': echo "Güneyli Kuvvetli Rüzgar"; break;
						case 'KKR': echo "Kuzeyli Kuvvetli Rüzgar"; break;
						case 'SCK': echo "Sıcak"; break;
						case 'SGK': echo "Soğuk"; break;
						case 'HHY': echo "Yağışlı"; break;
					}
					echo '</p><p class="item-pr">'.$j->sicaklik."&#x2103;</p>";
					echo '</p><p class="item-pr">Nem: '.$j->nem."</p>";
					echo '<p style="font-size: 2vw;"></br><p>';
				}
			}
		echo '</div>';
	}
?>
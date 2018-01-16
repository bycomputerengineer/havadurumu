$(document).ready(function(){

	var sehirid = 0; 
	$("#ekle-btn").click(function(){
		sehirid++;
		$(".sehirler").append('<input type="text" id="sehir'+sehirid+'">');
	});

	var sehirler = [];
	var sondurum = 0;
	$("#gonder-btn").click(function(){
		var secim;
		var sehirSayisi = $(".sehirler").children().length-1;
		for(var i = 0; i < sehirSayisi; i++){
			secim = "#sehir"+i;
			sehirler.push($(secim).val());
		}

		$(".icerik").children().remove();
		$(".icerik").append('<div id="demo" class="carousel slide" data-ride="carousel"><!-- The slideshow --><div class="carousel-inner"></div><!-- Left and right controls --><a class="carousel-control-prev" href="#demo" data-slide="prev"><span class="carousel-control-prev-icon"></span></a><a class="carousel-control-next" href="#demo" data-slide="next"><span class="carousel-control-next-icon"></span></a></div>');


		$.post("getveri.php",{veri: sehirler}, function(ver){
			sehirler = ver.split("*");
			havadurumugetir();
		});
	});

	function havadurumugetir(){
		for(var i = 0; i <= sondurum+5 && i < sehirler.length; i++){
			if(i%5 === 0){
				if(sondurum == 0){
					$(".carousel-inner").append('<div class="carousel-item active"></div>');
				}
				else{
					$(".carousel-inner").append('<div class="carousel-item"></div>');
				}
				sondurum += 5;
			}
			$(".carousel-inner").children().last().append(sehirler[i]);
		}
	}
});
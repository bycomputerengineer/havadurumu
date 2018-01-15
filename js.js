$(document).ready(function(){

	var sehir = 0; 
	$("#ekle-btn").click(function(){
		sehir++;
		$(".sehirler").append('<input type="text" id="sehir'+sehir+'">');
	});

	var sehirler = [];
	$("#gonder-btn").click(function(){
		var secim;
		var sehirSayisi = $(".sehirler").children().length-1;
		for(var i = 0; i < sehirSayisi; i++){
			secim = "#sehir"+i;
			sehirler.push($(secim).val());
		}

		$.post("getveri.php",{veri: sehirler}, function(ver){
			$("body").children().first().next().remove();
			$("body").append('<div class="icerik">' + ver + '</div>');
		});
	});
});
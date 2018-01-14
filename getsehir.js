$(document).ready(function(){
	var sehir = 0; 
	$("#ekle-btn").click(function(){
		sehir++;
		$(".sehirler").append('<input type="text" id="sehir'+sehir+'">');
	});

	var sehirler = "";
	$("#gonder-btn").click(function(){
		var secim;
		var sehirSayisi = $(".sehirler").children().length-1;
		for(var i = 0; i < sehirSayisi; i++){
			secim = "#sehir"+i;
			sehirler += $(secim).val() + " ";
		}

		$.post("setsehir.php",{veri: sehirler}, function(ver){
			window.location = "monitor.html";
		});
	});
});
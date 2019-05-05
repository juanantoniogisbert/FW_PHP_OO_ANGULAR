$(document).ready(function(){
	$('.ajaxLoader').fadeOut("fast");
	
	$(document).on('click','#send',function(){
		result = true;
		$(".error").remove();
		
		var Vfname = /^[a-zA-Z]+[\-'\s]?[a-zA-Z]{2,51}$/;
    	var Vcorreo = /[a-z0-9!#$%&'*+/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&'*+/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/;
	    var Vmessage = /^[0-9A-Za-z\s]{25,100}$/;
		
		if ($("#fullname").val() === "" || $("#fullname").val() === "Introduce tu nombre" ) {
			$("#fullname").focus().after("<span class='error'>Introduce tu nombre</span>");
			return false;
		}else if (!Vfname.test($("#fullname").val())) {
			$("#fullname").focus().after("<span class='error'>El nombre tiene un minimo de 3 caracteres</span>");
			return false;
        }
        
		if ($("#correo").val() === "" || $("#correo").val() === "Introduce tu email" ) {
			$("#correo").focus().after("<span class='error'>Introduce tu email</span>");
			return false;
		}else if (!Vcorreo.test($("#correo").val())) {
			$("#correo").focus().after("<span class='error'>El formato del mail es incorrecto</span>");
			return false;
        }
		
		if ($("#message").val() === "" || $("#message").val() === "Seleccione un asunto" ) {
			$("#message").focus().after("<span class='error'>Introduzca su mensaje</span>");
			return false;
		}else if (!Vmessage.test($("#message").val())) {
			$("#message").focus().after("<span class='error'>El mensaje tiene un minimo de 25 caracteres</span>");
			return false;
		}
		
		if (result) {
			$('#send').attr('disabled', true);
			$('.ajaxLoader').fadeIn("fast");
			var data = {"fullname":$("#fullname").val(),"correo":$("#correo").val(),"message":$("#message").val()};
			var fin_data = JSON.stringify(data);
			$.post(amigable("?module=contact&function=send_cont"),{"fin_data":fin_data},function(data,event){
				$('.ajaxLoader').fadeOut("fast");
				console.log(data);
				$("#rltsendmessage").html(data).fadeIn("slow");
                    
			    setTimeout(function() {
			        $("#rltsendmessage").fadeOut("slow")
			    }, 5000);
			});
		}
	});
});

function initMap() {
	var cst = {lat: 39.078470, lng: -0.514171};
	var map = new google.maps.Map(document.getElementById('map'), {
	  zoom: 12,
	  center: cst
	});
 
	var contentString = '<div id="content">'+
		'<div id="siteNotice">'+
		'</div>'+
		'<h1 id="firstHeading" class="firstHeading">Villanueva de Castellón</h1>'+
		'<div id="bodyContent">'+
		'<p><b>Villanueva de Castellón</b>, Situado en la confluencia de los ríos Júcar y Albaida. ' +
		'El relieve es totalmente llano y apenas sobresalen algunos cerros en la parte meridional: Destacan las '+
		'alturas del puerto de Cárcer (Serreta de Uchera), y la Montaña del Castillo (el Castellet), que corona los restos del antiguo castillo que dio nombre al pueblo,  '+
		'fortaleza vigía adelantada del de Játiva. El resto del término se mantiene a una altitud media de 30-40 m sobre el nivel del mar, y lo cubren sedimentos  '+
		'pleistocenos y holocenos procedentes de los acarreos de los ríos Júcar y Albaida. '+
		'<p>Mas información de Villanueva de Castellón en: '+
		'<a href="https://es.wikipedia.org/wiki/Villanueva_de_Castell%C3%B3n">'+
		'https://es.wikipedia.org/wiki/Villanueva_de_Castell%C3%B3n</a> '+
		'</div>'+
		'</div>';
 
	var infowindow = new google.maps.InfoWindow({
	  content: contentString
	});
 
	var marker = new google.maps.Marker({
	  position: cst,
	  map: map,
	  title: 'Villanueva de castellon (Valencia)'
	});
	marker.addListener('click', function() {
	  infowindow.open(map, marker);
	});
  }
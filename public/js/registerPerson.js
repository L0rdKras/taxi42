$(document).ready(function() {
	//guardarPaciente();
	enterRut();
	dejarRut();

	guardaTitular();

});

var guardaTitular = function(){
	$("#guardar").on('click',function(e){
		e.preventDefault();

		var form = $("#formPersons");
		//var formRuta = $("#formSaveIncumbents");

		var url = form.attr('action');

		var data = form.serialize();

		/*$.post(url,data,function(response){
			console.log(response);
		}).fail(function(){
			alert("Ocurrio un error al intentar guardar la informacion");
		});*/
		$.post(url,data,function(response){
			//borrar los alert
			cleanAlerts("formPersons");
			if(response.respuesta!=undefined){
				var modalWindow = $('#modalTemplate').html();
				if(response.respuesta==="Guardado"){
					//informar y recargar
					modalWindow = modalWindow.replace(':MENSAJE','Persona Guardada');
					$(modalWindow).modal({
					  keyboard: false,
					  backdrop: 'static'
					});
					setTimeout(function(){location.href=response.ruta;}, 3000);
				}else{
					//informar error
					modalWindow = modalWindow.replace(':MENSAJE',response.respuesta);
					$(modalWindow).modal();
				}
			}else{
				$("#formPersons .campoIngreso").each(function (index) 
        		{
        			var id_name = this.id;

        			showError(id_name,response);
        			
        		});
			}
		},'json').fail(function(){
			alert("Ocurrio un error al intentar guardar la informacion");
		});
	});
};

var cleanAlerts = function(object){
	$("#"+object+" .alert").remove();
};

var showError = function(fieldName,response){
	if(response[fieldName]!=undefined){
		//console.log(response[fieldName][0]);
		$("#"+fieldName).after('<div class="label alert alert-danger" role="alert">'+response[fieldName][0]+'</div>');
	}
};

var enterRut = function(){
	$("#rut").on("keypress",function(e){
		if(e.which == 13){
			e.preventDefault();
			var rut = $(this).val();
			formatearRevisarRut(rut);
		}
	});
};

var dejarRut = function(){
	$("#rut").on("focusout",function(){
		var rut = $(this).val();
		formatearRevisarRut(rut);
	});
};

var formatearRevisarRut = function(rut){
	rut = daformator(rut);

	if(valida_cadena(rut)){
		$("#rut").val(rut);
	}else{
		$("#rut").select();
	}
};
$(document).ready(function() {
	//guardarPaciente();
	guardaTitular();

	buscarFondo();

	seleccionaFondo();

	elijeCondicion();

});

var guardaTitular = function(){
	$("#guardar").on('click',function(e){
		e.preventDefault();

		var form = $("#formAccounts");
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
			cleanAlerts("formAccounts");
			if(response.respuesta!=undefined){
				var modalWindow = $('#modalTemplate').html();
				if(response.respuesta==="Guardado"){
					//informar y recargar
					modalWindow = modalWindow.replace(':MENSAJE','Cuenta Guardada');
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
				$("#formAccounts .campoIngreso").each(function (index) 
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

var buscarFondo = function(){
	$("#btnBuscarPartner").on('click',function(e){
		e.preventDefault();
		$("#modal-search-fondo").modal();
	});
};

var seleccionaFondo = function(){
	$("body #modal-search-fondo").on("click","table tbody tr td .agregaPartner",function(){
		var padre = $(this).parent();
		var abuelo = $(padre).parent();

		var id = abuelo.data('id');
		var nombre = abuelo.data('name');

		$("#fondo_id").val(id);
		$("#fondo").val(nombre);

		$("#modal-search-fondo").modal('hide');
	});
};

var elijeCondicion = function(){
	$("#exigible").on('change',function(){
		if($(this).val() == "SI"){
			$("#exigibleArea").css("visibility","visible");
		}else{
			$("#exigibleArea").css("visibility","hidden");
		}
	});
};
$(document).ready(function() {
	//guardarPaciente();
	guardaTitular();

	buscarPartner();

	seleccionaPartner();

});

var guardaTitular = function(){
	$("#guardar").on('click',function(e){
		e.preventDefault();

		var form = $("#formSaving");
		//var formRuta = $("#formSaveIncumbents");

		var url = form.attr('action');

		var data = form.serialize();

		$.post(url,data,function(response){
			//borrar los alert
			cleanAlerts("formSaving");
			if(response.respuesta!=undefined){
				var modalWindow = $('#modalTemplate').html();
				if(response.respuesta==="Guardado"){
					//informar y recargar
					modalWindow = modalWindow.replace(':MENSAJE','Ahorro Ingresado');
					$(modalWindow).modal({
					  keyboard: false,
					  backdrop: 'static'
					});
					cargarCartola(response.id_persona);
					$("#amount").val("");
					//setTimeout(function(){location.href=response.ruta;}, 3000);
				}else{
					//informar error
					modalWindow = modalWindow.replace(':MENSAJE',response.respuesta);
					$(modalWindow).modal();
				}
			}else{
				$("#formSaving .campoIngreso").each(function (index) 
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

var buscarPartner = function(){
	$("#btnBuscarPartner").on('click',function(e){
		e.preventDefault();
		$("#modal-search-partner").modal();
	});
};

var seleccionaPartner = function(){
	$("body #modal-search-partner").on("click","table tbody tr td .agregaPartner",function(){
		var padre = $(this).parent();
		var abuelo = $(padre).parent();

		var id = abuelo.data('id');
		var nombre = abuelo.data('name');

		$("#person_id").val(id);
		$("#person").val(nombre);

		$("#modal-search-partner").modal('hide');

		cargarCartola(id);
	});
};

var cargarCartola = function(id){
	$("#tablaCartola tbody").html("");

	var ruta = $("#rutaCartola").val();

	ruta = ruta.replace(":ID", id);

	var fila = $("#filaMovimientos").html();
	//console.log(ruta);
	$.getJSON(ruta,function(response){
		var arreglo = response.movements;

		var saldo = 0;

		for (var i = 0; i < arreglo.length; i++) {
			//console.log(arreglo[i]);

			var filaAdd = fila.replace(":FECHA",arreglo[i].created_at);

			if(arreglo[i].type==="Ingreso"){
				saldo+=arreglo[i].amount;
				filaAdd = filaAdd.replace(":INGRESO",arreglo[i].amount);
				filaAdd = filaAdd.replace(":EGRESO","0");
				filaAdd = filaAdd.replace(":SALDO",saldo);
			}else{
				saldo-=arreglo[i].amount;
				filaAdd = filaAdd.replace(":EGRESO",arreglo[i].amount);
				filaAdd = filaAdd.replace(":INGRESO","0");
				filaAdd = filaAdd.replace(":SALDO",saldo);
			}

			//console.log(filaAdd);

			$("#tablaCartola tbody").append(filaAdd);
		}
	});
};
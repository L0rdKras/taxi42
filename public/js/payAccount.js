$(document).ready(function() {

	buscarSocio();

	seleccionaSocio();

	seleccionaMovil();

	seleccionarPendiente();

});

var cleanAlerts = function(object){
	$("#"+object+" .alert").remove();
};

var showError = function(fieldName,response){
	if(response[fieldName]!=undefined){
		//console.log(response[fieldName][0]);
		$("#"+fieldName).after('<div class="label alert alert-danger" role="alert">'+response[fieldName][0]+'</div>');
	}
};

var buscarSocio = function(){
	$("#btnBuscarPartner").on('click',function(e){
		e.preventDefault();
		//console.log("algo");
		$("#modal-search-partner").modal();
	});
};

var seleccionaSocio = function(){
	$("body #modal-search-partner").on("click","table tbody tr td .agregaPartner",function(){
		var padre = $(this).parent();
		var abuelo = $(padre).parent();

		var id = abuelo.data('id');
		/*$("#fondo_id").val(id);
		$("#fondo").val(nombre);*/

		//cargar data del socio
		//listar en un combo los moviles asociados

		cargarDataSocio(id);

		$("#modal-search-partner").modal('hide');
	});
};

var cargarDataSocio = function (id){
	ruta = $("#rutaData").val();

	ruta = ruta.replace(':ID',id);
	$.getJSON(ruta,function(response){
		moviles = response.moviles;
		persona = response.person;
		
		var plantilla = $("#templateDataPartner").html();

		plantilla = plantilla.replace(':NOMBRE',persona.firstName+" "+persona.lastName);

		$("#dataOfPartner").html(plantilla);

		var mySelect = $("#movil");

		for (var i = 0, largo=moviles.length; i < largo; i++) {
			//console.log(moviles[i].id);
			mySelect.append($('<option>', {
				value: moviles[i].id,
				text: moviles[i].id
			}));
		};

	}).fail(function(){
		alert("Ocurrio un error al intentar guardar la informacion");
	});
};

var seleccionaMovil = function(){
	$("#dataOfPartner").on('change',"#movil",function(){
		if($(this).val()!=""){
			cargarDeudasMovil($(this).val());
		}else{
			//borra info en pantalla
			$("#detallePendientes").html("");
		}
	});
};

var cargarDeudasMovil = function(id){
	ruta = $("#rutaDataMovil").val();

	ruta = ruta.replace(':ID',id);

	var fila = $("#filaPendientes").html();

	$.getJSON(ruta,function(response){
		for (var i = 0, largo=response.length; i < largo; i++) {
			//console.log(response[i].date);
			toAdd = fila.replace(/:FECHA/g,response[i].date);
			toAdd = toAdd.replace(':TOTAL',response[i].total);
			toAdd = toAdd.replace(':ID',id);

			$("#detallePendientes").append(toAdd);
		};
	});
};

var seleccionarPendiente = function(){
	$("#detallePendientes").on('click',"tr th .pagar-pendiente",function(event){
		event.preventDefault();

		var padre = $(this).parent();

		var abuelo = $(padre).parent();

		console.log(abuelo.data('date'));
	});
};
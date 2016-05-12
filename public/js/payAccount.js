$(document).ready(function() {

	buscarSocio();

	seleccionaSocio();

	seleccionaMovil();

	seleccionarPendiente();

	cantidadHojas();

});

var cleanAlerts = function(object){
	$("#"+object+" .alert").remove();
};

var showError = function(fieldName,response){
	if(response[fieldName]!==undefined){
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
		}

	}).fail(function(){
		alert("Ocurrio un error al intentar guardar la informacion");
	});
};

var seleccionaMovil = function(){
	$("#dataOfPartner").on('change',"#movil",function(){
		if($(this).val()!==""){
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
		}
	});
};

var seleccionarPendiente = function(){
	$("#detallePendientes").on('click',"tr th .pagar-pendiente",function(event){
		event.preventDefault();

		var padre = $(this).parent();

		var abuelo = $(padre).parent();

		var ruta = $("#rutaDeudaDia").val();

		ruta = ruta.replace(':ID',abuelo.data('id'));

		ruta = ruta.replace(':DATE',abuelo.data('date'));

		var templateRow = $("#rowDetail").html();

		$("#detailDebtsMovil").html("");

		var valorHoja = $("#valorHoja").val();

		var numeroHojas = $("#numeroHojas").val("1");

		$.getJSON(ruta,function(response){
			var totalAccounts = 0;
			for (var i = 0, largo=response.length; i < largo; i++) {

				toAdd = templateRow.replace(':CUENTA',response[i].name);
				toAdd = toAdd.replace(':MONTO',response[i].amount);

				totalAccounts += parseInt(response[i].amount);

				$("#detailDebtsMovil").append(toAdd);

			}
			$("#totalAccounts").val(totalAccounts);

			var total = parseInt(totalAccounts)+parseInt(valorHoja);

			$("#totalPagar").val(total);

			$("#totalHojas").val(valorHoja);

			$("#modalPagar").modal('show');
		});
	});
};

var cantidadHojas = function(){
	$(".modSheet").on("click",function(event){
		event.preventDefault();

		alterSheet($(this).data('mod'));
	});
};

var alterSheet = function(operator){
	var sheets = parseInt($("#numeroHojas").val());

	switch (operator) {
		case '+':
			sheets++;
			break;
		default:
			sheets--;
	}

	if(sheets <= 0){
		sheets = 1;
	}

	$("#numeroHojas").val(sheets);

	calcularTotal(sheets);
};

var calcularTotal = function(sheets){
	var valorHoja = $("#valorHoja").val();

	var totalHojas = valorHoja*sheets;

	var totalAccounts = $("#totalAccounts").val();

	var totalPagar = parseInt(totalHojas)+parseInt(totalAccounts);

	$("#totalHojas").val(totalHojas);

	$("#totalPagar").val(totalPagar);
};

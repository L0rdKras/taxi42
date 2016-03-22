$(document).ready(function() {
	verModalChoferes();
	verModalMovil();
	seleccionaChofer();
	seleccionaMovil();
});

var verModalMovil = function(){
	$("#btnBuscarMovil").on('click',function(e){
		e.preventDefault();
		$("#modal-search-movil").modal();
	});
};

var verModalChoferes = function(){
	$("#btnBuscarChofer").on('click',function(e){
		e.preventDefault();
		$("#modal-search-driver").modal();
	});
};

var seleccionaChofer = function(){
	$("body #modal-search-driver").on("click","table tbody tr td .agregaPartner",function(){
		var padre = $(this).parent();
		var abuelo = $(padre).parent();

		var id = abuelo.data('id');
		var nombre = abuelo.data('name');

		$("#person_id").val(id);
		$("#person").val(nombre);

		$("#modal-search-driver").modal('hide');
	});
};

var seleccionaMovil = function(){
	$("body #modal-search-movil").on("click","table tbody tr td .agregaPartner",function(){
		var padre = $(this).parent();
		var abuelo = $(padre).parent();

		var id = abuelo.data('id');
		var nombre = abuelo.data('name');
		var idOwnner = abuelo.data('idOwner');

		muestraCuentasAsociadas(idOwnner);

		$("#movil_id").val(id);
		$("#movil").val(nombre);

		$("#modal-search-movil").modal('hide');
	});
};

var muestraCuentasAsociadas = function(id){
	var url = $("#rutaCuentas").val();

	url = url.replace(':ID',id);

	var fila = $("#filaCuentas").html();

	$("#detalleCuentas").html("");

	$("#totalCuentas").val("");

	$.get(url,function(response){
		//console.log(response);
		var arreglo = response.arreglo;

		for (i = 0; i < arreglo.length; i++) { 
			
			//console.log(arreglo[i].name);
			var filaAdd = fila.replace(':CUENTA',arreglo[i].name);
			filaAdd = filaAdd.replace(':VALOR',arreglo[i].amount);

			$("#detalleCuentas").append(filaAdd);
		}

		$("#totalCuentas").val(response.suma);
	});
};
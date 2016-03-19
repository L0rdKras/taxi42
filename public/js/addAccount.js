$(document).ready(function() {
	seleccionarNuevaCuenta();
	borrarCuentaDelListado();
});

var seleccionarNuevaCuenta = function(){
	$(".cuentasAgregables").on('dblclick',function(){
		var idAccount = $(this).data("id");
		var name = $(this).data("name");
		var amount = $(this).data("amount");
		$("#account_id").val(idAccount);

		var form = $("#formAdd");
		var url = form.attr('action');

		var data = form.serialize();

		var fila = $("#filaDinamica").html();

		$.post(url,data,function(response){
			if(response.respuesta === "Guardado"){
				//agregar dinamicamente en la tabla
				//de asignados
				fila = fila.replace(":ID",idAccount);
				fila = fila.replace(":NOMBRE",name);
				fila = fila.replace(":MONTO",amount);

				$("#added_accounts tbody").append(fila);
			}else{
				alert(response.mensaje);
			}
		},'json');
	});
};

var borrarCuentaDelListado = function(){
	$("#added_accounts tbody").on("click",".cuentasAgregadas th .btnRemoveList",function(e){
		e.preventDefault();
		var padre = $(this).parent();
		var abuelo = $(padre).parent();

		var accountId = $(abuelo).data("id");

		deleteOfList(accountId,abuelo);

	});
};

var deleteOfList = function(id,row){
	//$.post(){}
};
$(document).ready(function() {
	abonar();
});

var abonar = function(){
	$("#abonarPrestamo").on("click",function(event){
		event.preventDefault();

		var form = $("#formLoan");

		var url = form.attr('action');

		var data = form.serialize();

		$.post(url,data,function(response){
			//borrar los alert
			cleanAlerts("formLoan");
			if(response.respuesta!=undefined){
				var modalWindow = $('#modalTemplate').html();
				if(response.respuesta==="Guardado"){
					//informar y recargar
					modalWindow = modalWindow.replace(':MENSAJE','Prestamo Registrado');
					$(modalWindow).modal({
					  keyboard: false,
					  backdrop: 'static'
					});
					
					$("#amount").val("");
					//setTimeout(function(){location.href=response.ruta;}, 3000);
				}else{
					//informar error
					modalWindow = modalWindow.replace(':MENSAJE',response.mensaje);
					$(modalWindow).modal();
				}
			}else{
				$("#formLoan .campoIngreso").each(function (index) 
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
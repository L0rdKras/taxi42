$(document).ready(function() {
	//guardarPaciente();
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
		//console.log(url);
		$.post(url,data,function(response){
			//borrar los alert
			cleanAlerts("formPersons");
			if(response.respuesta!=undefined){
				var modalWindow = $('#modalTemplate').html();
				if(response.respuesta==="Actualizado"){
					//informar y recargar
					modalWindow = modalWindow.replace(':MENSAJE','Persona Actualizada');
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
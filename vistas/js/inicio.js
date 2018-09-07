/*=============================================
 //INICIO DE LABOR OTTO
=============================================*/

$('#inicioLabor').datepicker({
	format: "yyyy-mm-dd",
    startDate: '-0d',
    language: "es"
});

/*=============================================
 //FINAL DE LABOR OTTO
=============================================*/

$('#finalLabor').datepicker({
	format: "yyyy-mm-dd",
    startDate: '-0d',
    language: "es"
});

/*=============================================
 //TIME PICKER FINAL DE LABOR OTTO
=============================================*/

    //$('#inicioHoraLabor').timepicker({
      //showInputs: false
    //})

    
/*=============================================
CALENDARIO DE LABORES DEL PERSONAL PAGINA DE INICIO
=============================================*/

$(document).ready(function (){

	$('#CalendarioWeb').fullCalendar({
		header:{
			left:'today, prev,next',
			center:'title',
			right:'month, basicWeek, basicDay, agendaWeek, agendaDay'
		}, 

		dayClick: function(date,jsEvent,view){
			//alert("Valor selecciondo: "+date.format());
			//alert("Vista: "+view.name);
			$(this).css('background-color', '#ebfafa');

			$('#btnAgregarLabor').prop("disabled", false); 
			$('#btnModificarLabor').prop("disabled", true);
			$('#btnEliminarLabor').prop("disabled", true);

			limpiarFormulario();
			$('#inicioLabor').val(date.format());
			$('#finalLabor').val(date.format());

			$("#modalLabor").modal();
		},

		events: 'http://localhost/inder/eventos.php',

	    eventClick:function(calEvent, jsEvent, view){

	    	$('#btnAgregarLabor').prop("disabled", true); 
			$('#btnModificarLabor').prop("disabled", false);
			$('#btnEliminarLabor').prop("disabled", false);

	    	$('#id').val(calEvent.id);
	    	$('#tituloLabor').val(calEvent.title);
	    	$('#descripcionLabor').val(calEvent.descripcion);
	    	$('#etiquetaLabor').val(calEvent.color);
	    	$('#letraLabor').val(calEvent.textColor);

	    	FechaHoraInicio = calEvent.start._i.split(" ");
	    	$('#inicioLabor').val(FechaHoraInicio[0]);
	    	$('#inicioHoraLabor').val(FechaHoraInicio[1]);

	    	FechaHoraFinal = calEvent.end._i.split(" ");
	    	$('#finalLabor').val(FechaHoraFinal[0]);
	    	$('#finalHoraLabor').val(FechaHoraFinal[1]);
	    	
	    	$("#modalLabor").modal();
	    },

	    editable:true,
	    eventDrop:function(calEvent){

	    	$('#id').val(calEvent.id);
	    	$('#tituloLabor').val(calEvent.title);
	    	$('#descripcionLabor').val(calEvent.descripcion);
	    	$('#etiquetaLabor').val(calEvent.color);
	    	$('#letraLabor').val(calEvent.textColor);

	    	FechaHoraInicio = calEvent.start.format().split("T");
	    	$('#inicioLabor').val(FechaHoraInicio[0]);
	    	$('#inicioHoraLabor').val(FechaHoraInicio[1]);

	    	FechaHoraFinal = calEvent.end.format().split("T");
	    	$('#finalLabor').val(FechaHoraFinal[0]);
	    	$('#finalHoraLabor').val(FechaHoraFinal[1]);

			RecolectarDatos();
			EnviarDatos('modificar', nuevoEvento, true);
	    }

	});

});


/*=============================================
btnAgregarLabor AGREGAR LABOR EN LA PAGINA DE INICIO
=============================================*/

var nuevoEvento;

$('#btnAgregarLabor').click(function(){

	RecolectarDatos();

	EnviarDatos('agregar', nuevoEvento);

});


/*=============================================
btnModificarLabor MODIFICAR LABOR EN LA PAGINA DE INICIO
=============================================*/

$('#btnModificarLabor').click(function(){

	RecolectarDatos();

	EnviarDatos('modificar', nuevoEvento);

});

/*=============================================
btnEliminarLabor ELIMINAR LABOR EN LA PAGINA DE INICIO
=============================================*/

$('#btnEliminarLabor').click(function(){


	swal({
	 	title: '¿Está seguro de borrar la labor?',
	 	text: "¡Si no lo está puede cancelar la acción!",
	 	type: 'warning',
	 	showCancelButton: true,
	 	confirmButtonColor: '#3085d6',
	 	cancelButtonColor: '#d33',
	 	cancelButtonText: 'Cancelar',
	 	confirmButtonText: 'Si, borrar labor!'
	 }).then(function(result){

	 	if(result.value){

	 		RecolectarDatos();

			EnviarDatos('eliminar', nuevoEvento);

	 	}

	 })
	

});


/*=============================================
RECOLECTAR DATOS MODAL
=============================================*/
function RecolectarDatos(){

	nuevoEvento = {
		id:$('#id').val(),
		title:$('#tituloLabor').val(),
		descripcion:$('#descripcionLabor').val(),
		color:$('#etiquetaLabor').val(),
		textColor:$('#letraLabor').val(),
		start:$('#inicioLabor').val()+" "+$('#inicioHoraLabor').val(),
		end:$('#finalLabor').val()+" "+$('#finalHoraLabor').val()
	};
}


/*=============================================
INSERTAR EN BASE DE DATOS
=============================================*/

function EnviarDatos(accion, objEvento, modal){

	$.ajax({
		type:'POST',
		url:'eventos.php?accion='+accion,
		data:objEvento,
		success: function(msg){

			if (msg) {
				$('#CalendarioWeb').fullCalendar('refetchEvents');

				if (!modal) {
					$("#modalLabor").modal('toggle');
				}

			}
			alert("Todo bien");

		}, 
		error: function(){

			alert("Algo esta mal");

		}

	});
}


/*=============================================
LIMPIAR EL FORMULARIO
=============================================*/
function limpiarFormulario(){
	$('#id').val('');
	$('#tituloLabor').val('');
	$('#descripcionLabor').val('');
	$('#etiquetaLabor').val('');
	$('#letraLabor').val('');
}
/*=============================================
	TIMEPICKER PAGINA DE INICIO
=============================================*/
    $('.timepicker').timepicker({
      showInputs: false
    })

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
			$('#nuevoInicio').val(date.format());
			$('#nuevoFinal').val(date.format());
			$("#modalAgregarLabor").modal();
		},
			events: 'http://localhost/inder/eventos.php',

		    eventClick:function(calEvent, jsEvent, view){

		    	$('#id').val(calEvent.id);

		    	$('#editarTitulo').val(calEvent.title);
		    	$('#editarDescripcion').val(calEvent.descripcion);
		    	$('#editarEtiqueta').val(calEvent.color);
		    	$('#editarLetra').val(calEvent.textColor);

		    	FechaHoraInicio = calEvent.start._i.split(" ");
		    	$('#editarInicio').val(FechaHoraInicio[0]);
		    	$('#editarInicioHora').val(FechaHoraInicio[1]);

		    	FechaHoraFinal = calEvent.end._i.split(" ");
		    	$('#editarFinal').val(FechaHoraFinal[0]);
		    	$('#editarFinalHora').val(FechaHoraFinal[1]);

		    	$('#modalEditarLabor').modal();
		    },

		    editable:true,
		    eventDrop:function(calEvent){

		    	id:$('#id').val(),

		    	$('#editarTitulo').val(calEvent.title);
		    	$('#editarDescripcion').val(calEvent.descripcion);
		    	$('#editarEtiqueta').val(calEvent.color);
		    	$('#editarLetra').val(calEvent.textColor);

		    	FechaHoraInicio = calEvent.start.format().split("T");
		    	$('#editarInicio').val(FechaHoraInicio[0]);
		    	$('#editarInicioHora').val(FechaHoraInicio[1]);

		    	FechaHoraFinal = calEvent.end.format().split("T");
		    	$('#editarFinal').val(FechaHoraFinal[0]);
		    	$('#editarFinalHora').val(FechaHoraFinal[1]);

				RecolectarDatosEditados();

				EnviarDatos('modificar', nuevoEvento,true);
		    }

	});

})


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

	RecolectarDatosEditados();

	EnviarDatos('modificar', nuevoEvento);

});

/*=============================================
btnEliminarLabor ELIMINAR LABOR EN LA PAGINA DE INICIO
=============================================*/

$('#btnEliminarLabor').click(function(){

	RecolectarDatosEditados();

	EnviarDatos('eliminar', nuevoEvento);

});




/*=============================================
RECOLECTAR DATOS MODAL AGREGAR
=============================================*/
function RecolectarDatos(){

	nuevoEvento = {
		id:$('#id').val(),
		title:$('#nuevoTitulo').val(),
		descripcion:$('#nuevaDescripcion').val(),
		color:$('#nuevaEtiqueta').val(),
		textColor:$('#nuevaLetra').val(),
		start:$('#nuevoInicio').val()+" "+$('#nuevoInicioHora').val(),
		end:$('#nuevoFinal').val()+" "+$('#nuevoFinalHora').val()
	};
}

/*=============================================
RECOLECTAR DATOS MODAL EDITAR
=============================================*/
function RecolectarDatosEditados(){

	nuevoEvento = {
		id:$('#id').val(),
		title:$('#editarTitulo').val(),
		descripcion:$('#editarDescripcion').val(),
		color:$('#editarEtiqueta').val(),
		textColor:$('#editarLetra').val(),
		start:$('#editarInicio').val()+" "+$('#editarInicioHora').val(),
		end:$('#editarFinal').val()+" "+$('#editarFinalHora').val()
	};
}

/*=============================================
INSERTAR EN BASE DE DATOS
=============================================*/

function EnviarDatos(accion, objEvent, modal){

	$.ajax({

		type:'POST',
		url:'eventos.php?accion='+accion,
		data:objEvent,

		success: function(msg){

			$("#modalModificarLabor").modal('toggle');

			if (msg) {

				$('#CalendarioWeb').fullCalendar('refetchEvents');

				if (!modal) {
					$("#modalAgregarLabor").modal('toggle');
					$("#modalModificarLabor").modal('toggle');
				}

			}
		}, 

		error: function(){

			alert("enviado");

		}

	});
}
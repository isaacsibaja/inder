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

$('.inicioHoraLabor').clockpicker();

$('.finalHoraLabor').clockpicker();

    
/*=============================================
CALENDARIO DE LABORES DEL PERSONAL PAGINA DE INICIO
=============================================*/

$(document).ready(function (){

	$('#CalendarioWeb').fullCalendar({
		header:{
			left:'today, prev,next',
			center:'title',
			right:'month, agendaWeek, agendaDay',
			defaultView: window.mobilecheck() ? 'basicDay' : 'agendaWeek'
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

	RecolectarDatos();

	EnviarDatos('eliminar', nuevoEvento);
	

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

		}, 
		error: function(){

			/*alert("Algo esta mal"); Guarda todo bien, por separar la fecha y la hora de un mismo campo de la BD
			tira un error a la hora de guardar la labor, a causa de ser, un atributo, y obtener la info de 2 input
			en realidad todo lo agrega o modifica bien.

			Debido a esto que esta en eventClick daria la alerta de que "Algo esta mal"
			FechaHoraInicio = calEvent.start._i.split(" ");
	    	$('#inicioLabor').val(FechaHoraInicio[0]);
	    	$('#inicioHoraLabor').val(FechaHoraInicio[1]);

	    	FechaHoraFinal = calEvent.end._i.split(" ");
	    	$('#finalLabor').val(FechaHoraFinal[0]);
	    	$('#finalHoraLabor').val(FechaHoraFinal[1]);*/

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


window.mobilecheck = function() {
var check = false;
(function(a){if(/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i.test(a)||/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0,4)))check = true})(navigator.userAgent||navigator.vendor||window.opera);
return check; }
<?php

require_once "../../../controladores/instituto.controlador.php";
require_once "../../../modelos/instituto.modelo.php";

require_once "../../../controladores/tramites.controlador.php";
require_once "../../../modelos/tramites.modelo.php";

require_once "../../../controladores/tipotramite.controlador.php";
require_once "../../../modelos/tipotramite.modelo.php";

require_once "../../../controladores/usuarios.controlador.php";
require_once "../../../modelos/usuarios.modelo.php";

require_once "../../../controladores/clientes.controlador.php";
require_once "../../../modelos/clientes.modelo.php";

class imprimirTramite
{
    public $id;

    public function traerImprimirTramite()
    {

        date_default_timezone_set('America/Costa_Rica');

        setlocale(LC_ALL, "es_ES");

        $fechaActual = strftime("%A %d de %B del %Y.");

//TRAEMOS LA INFORMACIÓN DEL TRAMITE

        $itemTramite  = "id";
        $valorTramite = $this->id;

        $respuestaTramite = ControladorTramites::ctrMostrarTramites($itemTramite, $valorTramite);

        $fecha = $respuestaTramite["fecha"];

//TRAEMOS LA INFORMACIÓN DEL CLIENTE

        $itemCliente  = "id";
        $valorCliente = $respuestaTramite["idCliente"];

        $respuestaCliente = ControladorClientes::ctrMostrarClientes($itemCliente, $valorCliente);

        $solicitante = $respuestaCliente["nombre"];

//TRAEMOS LA INFORMACIÓN DEL Instituto

        $tabla = "instituto";
        $item  = null;
        $valor = null;

        $empresa = ModeloInstituto::mdlMostrarInstituto($tabla, $item, $valor);

        foreach ($empresa as $key => $value) {

            $nombre    = $value["nombre"];
            $direccion = $value["direccion"];
            $oficina   = $value["oficina"];
            $logo      = $value["logo"];
            $telefono  = $value["telefono"];
            $fax       = $value["fax"];
            $email     = $value["email"];
            $pie       = $value["pie"];
        }

        require_once 'tcpdf_include.php';

        //$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, '', true, 'UTF-8', false);

        $pdf->startPageGroup();

        $pdf->AddPage();

        //$pdf->SetFont('dejavusans', '', 12, '', true, 'UTF-8', false);

        $pdf->SetPrintHeader(false);
        //$pdf->SetPrintFooter(false);

        $bloque1 = <<<EOF
	<table>
		<tr>
			<td style="width:90px; background-color:white;"><img src="images/inder.png"></td>

		    <td style="background-color:white; font-size:11.5px; text-align:center; width:360px;">
						<br>
						<strong style="font-size:14px;">$nombre</strong>
						<br>
						<strong style="font-size:14px;">$direccion</strong>
						<br>
						<strong style="font-size:14px;">$oficina</strong>
						<br>
						Teléfono: $telefono | Email: $email
		    </td>
		    <td style="width:25px; background-color:white;"></td>
		    <td style="width:40px; background-color:white;"><img src="images/sarapiqui.png"></td>
		    <td style="width:25px; background-color:white;"></td>

		</tr>
	</table>

EOF;
        $pdf->writeHTML($bloque1, false, false, false, false, '');

        $bloque2 = <<<EOF
	<table>

		<tr>
			<td style="width:540px;"><img src="images/backFact3.jpg"></td>
		</tr>

		<tr>
			<td style="width:540px; text-align:right; font-size:11.5px">$fechaActual</td>
		</tr>

		<tr>
			<td style="width:540px;"><img src="images/backFact2.jpg"></td>
		</tr>

		<tr>
			<td style="width:540px; background-color:white;">
			<p style="font-weight: bold">Estimado (a) Solicitante.</p>
			$respuestaCliente[nombre], cédula: $respuestaCliente[documento]
			<p style="font-weight: bold">Presente</p>
			<p style="text-align: justify;">$respuestaTramite[respuesta]</p>
			<p style="font-size:14px; color:white;">.</p>
			<p style="font-weight: bold; text-align:center;">_________________________________________</p>
			<p style="font-weight: bold; text-align:center;">Jefe de Oficina Territorial Horquetas</p>
			<p style="font-weight: bold; text-align:center; font-size:11.5px;">"$pie".</p>
			</td>
		</tr>
	</table>

EOF;
        $pdf->writeHTML($bloque2, false, false, false, false, '');

// set margins

        $pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

// set some language-dependent strings (optional)
        if (@file_exists(dirname(__FILE__) . '/lang/eng.php')) {
            require_once dirname(__FILE__) . '/lang/eng.php';
            $pdf->setLanguageArray($l);
        }

        //$pdf->setPrintHeader(false);
        //$pdf->setPrintFooter(false);

// ---------------------------------------------------------
        //SALIDA DEL ARCHIVO

        $pdf->Output('Tramite ' . $solicitante . '.pdf');

    }
}

$tramite     = new imprimirTramite();
$tramite->id = $_GET["id"];
$tramite->traerImprimirTramite();

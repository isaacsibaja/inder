<?php

require_once "conexion.php";

class ModeloTramites
{
    /*=============================================
    CREAR TRAMITE
    =============================================*/

    public static function mdlIngresarTramite($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fecha, idCliente, asentamiento, predio, idTipoTramite, solicitudRespuesta, respuesta, observacion, idEstado, idUsuario) VALUES (:fecha, :idCliente, :asentamiento, :predio, :idTipoTramite, :solicitudRespuesta, :respuesta, :observacion, :idEstado, :idUsuario)");

        $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        $stmt->bindParam(":idCliente", $datos["idCliente"], PDO::PARAM_INT);
        $stmt->bindParam(":asentamiento", $datos["asentamiento"], PDO::PARAM_STR);
        $stmt->bindParam(":predio", $datos["predio"], PDO::PARAM_STR);
        $stmt->bindParam(":idTipoTramite", $datos["idTipoTramite"], PDO::PARAM_INT);
        $stmt->bindParam(":solicitudRespuesta", $datos["solicitudRespuesta"], PDO::PARAM_INT);
        $stmt->bindParam(":respuesta", $datos["respuesta"], PDO::PARAM_STR);
        $stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);
        $stmt->bindParam(":idEstado", $datos["idEstado"], PDO::PARAM_INT);
        $stmt->bindParam(":idUsuario", $datos["idUsuario"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();
        $stmt = null;

    }

    /*=============================================
    MOSTRAR TRAMITES
    =============================================*/

    public static function mdlMostrarTramites($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();

        } else {
            // ORDER BY id DESC

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

            $stmt->execute();

            return $stmt->fetchAll();

        }

        $stmt->close();

        $stmt = null;

    }

    /*=============================================
    EDITAR TRAMITE
    =============================================*/

    /*$datos = array("id"  => $_POST["idTramite"],
    "fecha"              => $_POST["editarFecha"],
    "idCliente"          => $_POST["editarSolicitante"],
    "asentamiento"       => $_POST["editarAsentamiento"],
    "predio"             => $_POST["editarPredio"],
    "idTipoTramite"      => $_POST["editarTipoTramite"],
    "solicitudRespuesta" => $_POST["editarSolicitudRespuesta"],
    "respuesta"          => $_POST["editarRespuesta"],
    "observacion"        => $_POST["editarObservacion"],
    "idEstado"           => $_POST["editarEstado"],
    "idUsuario"          => $_POST["editarEnviado"]);*/

    public static function mdlEditarTramite($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET fecha = :fecha, idCliente = :idCliente, asentamiento = :asentamiento, predio = :predio, idTipoTramite = :idTipoTramite, solicitudRespuesta = :solicitudRespuesta, respuesta = :respuesta, observacion = :observacion, idEstado = :idEstado, idUsuario = :idUsuario WHERE id = :id");

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        $stmt->bindParam(":idCliente", $datos["idCliente"], PDO::PARAM_INT);
        $stmt->bindParam(":asentamiento", $datos["asentamiento"], PDO::PARAM_STR);
        $stmt->bindParam(":predio", $datos["predio"], PDO::PARAM_STR);

        $stmt->bindParam(":idTipoTramite", $datos["idTipoTramite"], PDO::PARAM_INT);
        $stmt->bindParam(":solicitudRespuesta", $datos["solicitudRespuesta"], PDO::PARAM_INT);
        $stmt->bindParam(":respuesta", $datos["respuesta"], PDO::PARAM_STR);

        $stmt->bindParam(":observacion", $datos["observacion"], PDO::PARAM_STR);
        $stmt->bindParam(":idEstado", $datos["idEstado"], PDO::PARAM_INT);
        $stmt->bindParam(":idUsuario", $datos["idUsuario"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();
        $stmt = null;

    }

    /*=============================================
    ELIMINAR CLIENTE
    =============================================*/

    public static function mdlEliminarTramite($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

        $stmt = null;

    }

    /*=============================================
    ACTUALIZAR TRAMITE
    =============================================*/

    public static function mdlActualizarTramite($tabla, $item1, $valor1, $valor)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE id = :id");

        $stmt->bindParam(":" . $item1, $valor1, PDO::PARAM_STR);
        $stmt->bindParam(":id", $valor, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();

        $stmt = null;

    }

}

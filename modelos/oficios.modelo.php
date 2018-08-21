<?php

require_once "conexion.php";

class ModeloOficios
{

    /*=============================================
    CREAR OFICIO
    =============================================*/

    public static function mdlIngresarOficio($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fecha, oficio, ano, dirigidoA, asunto, enviadoPor, plazoRespuesta, idEstado) VALUES (:fecha, :oficio, :ano, :dirigidoA, :asunto, :enviadoPor, :plazoRespuesta, :idEstado)");

        $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        $stmt->bindParam(":oficio", $datos["oficio"], PDO::PARAM_INT);
        $stmt->bindParam(":ano", $datos["ano"], PDO::PARAM_INT);
        $stmt->bindParam(":dirigidoA", $datos["dirigidoA"], PDO::PARAM_STR);
        $stmt->bindParam(":asunto", $datos["asunto"], PDO::PARAM_STR);
        $stmt->bindParam(":enviadoPor", $datos["enviadoPor"], PDO::PARAM_STR);
        $stmt->bindParam(":plazoRespuesta", $datos["plazoRespuesta"], PDO::PARAM_STR);
        $stmt->bindParam(":idEstado", $datos["idEstado"], PDO::PARAM_INT);

        $stmtCall = Conexion::conectar()->prepare("CALL ContadorOficio()");

        if ($stmt->execute() && $stmtCall->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();
        $stmt = null;

    }

    /*=============================================
    CREAR OFICIO AÑO NUEVO
    =============================================*/

    public static function mdlIngresarOficioAnoNuevo($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fecha, oficio, ano, dirigidoA, asunto, enviadoPor, plazoRespuesta, idEstado) VALUES (:fecha, :oficio, :ano, :dirigidoA, :asunto, :enviadoPor, :plazoRespuesta, :idEstado)");

        $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        $stmt->bindParam(":oficio", $datos["oficio"], PDO::PARAM_INT);
        $stmt->bindParam(":ano", $datos["ano"], PDO::PARAM_INT);
        $stmt->bindParam(":dirigidoA", $datos["dirigidoA"], PDO::PARAM_STR);
        $stmt->bindParam(":asunto", $datos["asunto"], PDO::PARAM_STR);
        $stmt->bindParam(":enviadoPor", $datos["enviadoPor"], PDO::PARAM_STR);
        $stmt->bindParam(":plazoRespuesta", $datos["plazoRespuesta"], PDO::PARAM_STR);
        $stmt->bindParam(":idEstado", $datos["idEstado"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();
        $stmt = null;

    }

    /*=============================================
    MOSTRAR OFICIOS
    =============================================*/

    public static function mdlMostrarOficios($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();

        } else {
            //ORDER BY id DESC

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt->execute();

            return $stmt->fetchAll();

        }

        $stmt->close();

        $stmt = null;

    }

    /*=============================================
    EDITAR OFICIO
    =============================================*/

    public static function mdlEditarOficio($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET fecha = :fecha, oficio = :oficio, dirigidoA = :dirigidoA, asunto = :asunto, enviadoPor = :enviadoPor, plazoRespuesta = :plazoRespuesta, idEstado = :idEstado WHERE id = :id");

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        $stmt->bindParam(":oficio", $datos["oficio"], PDO::PARAM_INT);
        $stmt->bindParam(":dirigidoA", $datos["dirigidoA"], PDO::PARAM_STR);
        $stmt->bindParam(":asunto", $datos["asunto"], PDO::PARAM_STR);
        $stmt->bindParam(":enviadoPor", $datos["enviadoPor"], PDO::PARAM_STR);
        $stmt->bindParam(":plazoRespuesta", $datos["plazoRespuesta"], PDO::PARAM_STR);
        $stmt->bindParam(":idEstado", $datos["idEstado"], PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";

        } else {

            return "error";

        }

        $stmt->close();
        $stmt = null;

    }

    /*=============================================
    ELIMINAR OFICIO
    =============================================*/

    public static function mdlEliminarOficio($tabla, $datos)
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
    ACTUALIZAR OFICIO
    =============================================*/

    public static function mdlActualizarOficio($tabla, $item1, $valor1, $valor)
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

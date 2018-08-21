<?php

require_once "conexion.php";

class ModeloTramites
{

    /*=============================================
    CREAR TRAMITE
    =============================================*/

    public static function mdlIngresarTramite($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(fecha, idCliente, asentamiento, predio, tramite, observacion, idEstado, idUsuario) VALUES (:fecha, :idCliente, :asentamiento, :predio, :tramite, :observacion, :idEstado, :idUsuario)");

        $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        $stmt->bindParam(":idCliente", $datos["idCliente"], PDO::PARAM_INT);
        $stmt->bindParam(":asentamiento", $datos["asentamiento"], PDO::PARAM_STR);
        $stmt->bindParam(":predio", $datos["predio"], PDO::PARAM_STR);
        $stmt->bindParam(":tramite", $datos["tramite"], PDO::PARAM_STR);
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

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt->execute();

            return $stmt->fetchAll();

        }

        $stmt->close();

        $stmt = null;

    }

    /*=============================================
    EDITAR TRAMITE
    =============================================*/

    public static function mdlEditarTramite($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET fecha = :fecha, idCliente = :idCliente, asentamiento = :asentamiento, predio = :predio, tramite = :tramite, observacion = :observacion, idEstado = :idEstado, idUsuario = :idUsuario WHERE id = :id");

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_INT);
        $stmt->bindParam(":fecha", $datos["fecha"], PDO::PARAM_STR);
        $stmt->bindParam(":idCliente", $datos["idCliente"], PDO::PARAM_INT);
        $stmt->bindParam(":asentamiento", $datos["asentamiento"], PDO::PARAM_STR);
        $stmt->bindParam(":predio", $datos["predio"], PDO::PARAM_STR);
        $stmt->bindParam(":tramite", $datos["tramite"], PDO::PARAM_STR);
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

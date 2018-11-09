<?php

require_once "conexion.php";

/**
 *
 */
class ModeloLabores
{

    public static function mdlMostrarLabores($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();

        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla ORDER BY id DESC");

            $stmt->execute();

            return $stmt->fetchAll();

        }

        echo "hola"+$consecutivo_oficio = Conexion::conectar()->prepare("SELECT consecutivo_oficio() As consecutivo_oficio");

        $stmt->close();

        $stmt = null;

    }

}

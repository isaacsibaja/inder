<?php

/*=============================================
=            CLASE CONEXION A LA BD           =
=============================================*/

class Conexion
{

    public static function conectar()
    {

        $link = new PDO("mysql:host=localhost;dbname=inder", "root", "");

        $link->exec("set names utf8");

        return $link;

    }
}

<?php

header('Content-type: application/json');

$pdo = new PDO("mysql:dbname=inder;host=127.0.0.1", "root", "");

$accion = (isset($_GET['accion'])) ? $_GET['accion'] : 'leer';

switch ($accion) {

    case 'agregar':

        $stmt = $pdo->prepare("INSERT INTO labores (title, descripcion, color, textColor, start, end) VALUES (:title, :descripcion, :color, :textColor, :start, :end)");

        $respuesta = $stmt->execute(array(
            "title"       => $_POST['title'],
            "descripcion" => $_POST['descripcion'],
            "color"       => $_POST['color'],
            "textColor"   => $_POST['textColor'],
            "start"       => $_POST['start'],
            "end"         => $_POST['end']));

        echo json_encode($respuesta);

        break;

    case 'eliminar':

        $respuesta = false;

        if (isset($_POST['id'])) {

            $stmt      = $pdo->prepare("DELETE FROM labores WHERE id=:id");
            $respuesta = $stmt->execute(array("id" => $_POST['id']));

        }

        echo json_encode($respuesta);

        break;

    case 'modificar':

        $respuesta = false;

        if (isset($_POST['id'])) {

            $stmt = $pdo->prepare("UPDATE labores SET title=:title, descripcion=:descripcion, color=:color, textColor=:textColor, start=:start, end=:end WHERE id=:id");

            $respuesta = $stmt->execute(array(
                "id"          => $_POST['id'],
                "title"       => $_POST['title'],
                "descripcion" => $_POST['descripcion'],
                "color"       => $_POST['color'],
                "textColor"   => $_POST['textColor'],
                "start"       => $_POST['start'],
                "end"         => $_POST['end']));
        }

        echo json_encode($respuesta);

        break;

    default:

        //Seleccionar todas las labores al calendario

        $stmt = $pdo->prepare("SELECT * FROM labores");

        $stmt->execute();

        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

        echo json_encode($resultado);
        break;
}

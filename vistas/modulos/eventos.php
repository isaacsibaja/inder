<?php

//header('Content-type: application/json');

$pdo = new PDO("mysql:dbname=inder;host=127.0.0.1", "root", "");

//Seleccionar los eventos del calendario
$stmt = $pdo->prepare("SELECT * FROM labores");

$stmt->execute();

$resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($resultado);

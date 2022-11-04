<?php

    if (!isset($_GET['id_usuario'])) {
        header('Location: index.php?mensaje=error');
        exit();
    }

    include 'model/conexion.php';

    $id_usuario = $_GET['id_usuario'];

    $sentencia = $bd->prepare("DELETE FROM persona WHERE id_usuario = ?;");
    $resultado = $sentencia->execute([$id_usuario]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=eliminado');
    } else {
        header('Location: index.php?mensaje=error');
    }

?>
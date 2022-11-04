<?php
    print_r($_POST);

    if (!isset($_POST['id_usuario'])) {
        header('Location: index.php?mensaje=error');
    }

    include_once 'model/conexion.php';
    
    $id_usuario= $_POST['id_usuario'];
    $nombre = $_POST["txtNombre"];
    $apellido = $_POST["txtApellido"];
    $email = $_POST["txtEmail"];
    $pasword_us = $_POST["txtPassword"];

    $sentencia = $bd->prepare("UPDATE persona SET nombre = ?, apellido = ?, email = ?, password_us = ? WHERE id_usuario = ?");
    $resultado = $sentencia->execute([$nombre,$apellido,$email,$pasword_us,$id_usuario]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>

<?php 

    include_once 'model/conexion.php';
    
    $nombre = $_POST["txtNombre"];
    $apellido = $_POST["txtApellido"];
    $email = $_POST["txtEmail"];
    $password_us = $_POST["txtPassword"];

    $sentencia = $bd->prepare("INSERT INTO persona(nombre,apellido,email,password_us) VALUES (?,?,?,?);");// no inserto id porque se va incrementando automaticamente
    $resultado = $sentencia->execute([$nombre,$apellido,$email,$password_us]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>


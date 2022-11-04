<?php include "template/header.php " ?>

<?php

    include_once "model/conexion.php";
    $sentencia = $bd -> query("SELECT * FROM persona");
    $persona = $sentencia -> fetchAll(PDO::FETCH_OBJ);
    
?>

<div class="container mt-5 mb-5">
        <div class="row justify-content-center">
            <div class="col-md-9">

            <?php               
                if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'registrado'){                                  
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Registrado!</strong> Datos agregados.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
              }
            ?>
            <?php
                
                if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'error'){
                                   
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <strong>Error!</strong> Vuelve a intentar.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
              }
            ?>
            <?php               
                if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'editado'){                                   
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Editado!</strong> Proceso exitoso.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
              }
            ?>
            <?php
               
                if (isset($_GET['mensaje']) && $_GET['mensaje'] == 'eliminado'){                                  
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>Eliminado!</strong> Se a elimiando correctamente.
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php
              }
            ?>
            
            <div class="card mt-3">
                    <div class="card-header text-center mb-5">
                    <h2>Lista de Usuarios</h2>
                </div>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end mb-3">
                        <button class="btn btn-primary me-md-2" data-bs-target="#modalUsuario" data-bs-toggle="modal"
                                id="botonCrear" type="button"><i class="bi bi-person-plus-fill"></i> CREAR USUARIO</button>
                    </div>
                <div class="p-4">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Apellido</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Contraseña</th>
                                    <th scope="col" colspan="2">Opciones</th>
                                </tr>
                            </thead>
                            <tbody>    
                                <?php
                                    foreach($persona as $dato){                               
                                ?>
                                <tr>
                                    <td scope="row"><?php echo $dato -> id_usuario; ?></td>
                                    <td><?php echo $dato -> nombre; ?></td>
                                    <td><?php echo $dato -> apellido; ?></td>
                                    <td><?php echo $dato -> email; ?></td>
                                    <td><?php echo $dato -> password_us; ?></td>
                                    
                                    <td><a class="text-success" href="editar.php?id_usuario=<?php echo $dato -> id_usuario; ?>">
                                        <i class="bi bi-pencil-square"></i></a></td>
                                    <td><a onclick="return confirm('¿Estas seguro de eilimiar?')" class="text-danger" href="eliminar.php?id_usuario=<?php echo $dato -> id_usuario; ?>">
                                        <i class="bi bi-trash"></i></a></td>
                                </tr>
                                <?php                               
                                  }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalUsuario" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Nuevo Usuario</h3>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <div class="modal-body">
                    <form class="p-4" method="POST" action="registrar.php">
                        <div class="mb-3">
                            <input type="text" class="form-control" name="txtNombre" placeholder="Nombre" autofocus require>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="txtApellido" placeholder="Apellido" autofocus require>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="txtEmail" placeholder="Email" autofocus require>
                        </div>
                        <div class="mb-3">
                            <input type="text" class="form-control" name="txtPassword" placeholder="Contraseña" require>
                        </div>
                        <div class="modal-footer mt-5">
                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-primary" value="guardar" name="guardar">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php

include "template/footer.php";

?>
<?php 
    
    include "template/header.php" ?>

<?php 

    if (!isset($_GET['id_usuario']) || empty($_GET['id_usuario'])) {
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $id_usuario = $_GET['id_usuario'];
    $sentencia = $bd->prepare("SELECT * FROM persona WHERE id_usuario = ?;");
    $sentencia->execute([$id_usuario]);
    $persona = $sentencia->fetch(PDO::FETCH_OBJ);
?>                                               

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                   <h3>Editar Datos</h3>
                </div>
                <form class="p-4" method="POST" action="editarUsu.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="txtNombre"   require 
                        value="<?php echo $persona->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido</label>
                        <input type="text" class="form-control" name="txtApellido"   require
                        value="<?php echo $persona-> apellido; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="text" class="form-control" name="txtEmail"  require
                        value="<?php echo $persona->email; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Contraseña</label>
                        <input type="text" class="form-control" name="txtPassword"  require
                        value="<?php echo $persona->password_us; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="id_usuario" value="<?php echo $persona->id_usuario; ?>">
                        <input type="submit" value="Editar" class="btn btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include "template/footer.php" ?>
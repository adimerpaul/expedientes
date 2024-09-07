<?php
include('../../templates/template.php');

include("../../conexion.php");


if ($_SESSION['rol'] != 1) {
    exit();
}

$sentencia = $conexion->prepare("SELECT * FROM usuarios");
$sentencia->execute();
$usuarios = $sentencia->fetchAll(PDO::FETCH_ASSOC);


if (isset($_GET['id'])) {

    $txtid = (isset($_GET['id']) ? $_GET['id'] : "");
    $sentencia = $conexion->prepare("DELETE FROM usuarios WHERE id=:idtxt");
    $sentencia->bindParam(":idtxt", $txtid);
    $sentencia->execute();
    echo '<script>window.location.href = "index.php";</script>';
}







?>


<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Usuarios</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">usuarios</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>

    <div class="card">
        <div class="card-header">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#create">
                <i class="fas fa-plus"></i> Nuevo
            </button>
        </div>
        <div class="card-body">
            <div class="table-responsive-sm">
                <table id="example2" class="table table-bordered table-striped table-hover">
                    <thead class="bg-navy">

                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombres</th>
                            <th scope="col">Tipo de usuario</th>
                            <th scope="col">Usuario</th>
                            <th scope="col">Contraseña</th>
                            <th>correo</th>
                            <th>Acciones</th>
                        </tr>

                    </thead>
                    <tbody>
                        <?php $i = 1;   ?>
                        <?php foreach ($usuarios as $usuario) { ?>
                            <tr class="">
                                <td scope="row"><?php echo $i++; ?></td>
                                <td><?php echo $usuario['nombres']; ?></td>
                                <td>
                                    <?php
                                    if ($usuario['rol'] == 1) {
                                        echo "Admin";
                                    } else {
                                        echo "Consulta";
                                    }
                                    ?>
                                </td>
                                <td><?php echo $usuario['usuario']; ?></td>
                                <td><?php echo $usuario['password']; ?></td>
                                <td><?php echo $usuario['correo']; ?></td>
                                <td>
                                    <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#edit<?php echo $usuario['id']; ?>">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <a class="btn btn-danger" href="javascript:borrar(<?php echo $usuario['id']; ?>)"
                                        role="button"> <i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>

                            <!-- Modal edit -->
                            <div class="modal fade" id="edit<?php echo $usuario['id']; ?>" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header bg-primary">
                                            <h5 class="modal-title" id="exampleModalLabel">EDITAR USUARIOS</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="editar.php" method="post" enctype="multipart/form-data">
                                            <div class="modal-body">
                                                <div class="mb-3">
                                                    <input type="hidden" value="<?php echo $usuario['id']; ?>"
                                                        class="form-control" name="txtid" id="txtid"
                                                        aria-describedby="helpId">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="nombre" class="form-label">Nombres</label>
                                                    <input type="text" class="form-control" name="nombre" id="nombre"
                                                        aria-describedby="helpId" value="<?php echo $usuario['nombres']; ?>">
                                                </div>
                                                <div class="mb-3">
                                                    <label for="usuario" class="form-label">Nombre del usuario</label>
                                                    <input type="text" class="form-control" name="usuario" id="usuario"
                                                        aria-describedby="helpId" value="<?php echo $usuario['usuario']; ?>">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="password" class="form-label">Contraseña</label>
                                                    <input type="password" class="form-control" name="password"
                                                        id="password" aria-describedby="helpId"
                                                        value="<?php echo $usuario['password']; ?>">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="correo" class="form-label">Correo</label>
                                                    <input type="email" class="form-control" name="correo" id="correo"
                                                        aria-describedby="helpId" value="<?php echo $usuario['correo']; ?>">
                                                </div>

                                                <div class="mb-3">
                                                    <label for="correo" class="form-label">Tipo de usuario</label>
                                                    <select name="rol" id="rol" class="form-control">
                                                        <?php if ($usuario['rol'] == 1) { ?>
                                                            <option value="1" selected>Admin</option>
                                                            <option value="0">Consulta</option>
                                                        <?php } else { ?>
                                                            <option value="0" selected>Consulta</option>
                                                            <option value="1">Admin</option>
                                                        <?php } ?>
                                                    </select>
                                                </div>


                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger"
                                                    data-dismiss="modal">Cerrar</button>
                                                <button type="submit" class="btn btn-primary">Actualizar</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        <?php  }  ?>

                    </tbody>
                </table>
            </div>

            <!-- Modal create -->
            <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title" id="exampleModalLabel">AGREGAR USUARIO</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="crear.php" method="post" enctype="multipart/form-data">
                            <div class="modal-body">

                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombres</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre"
                                        aria-describedby="helpId" placeholder="Nombres">
                                </div>
                                <div class="mb-3">
                                    <label for="usuario" class="form-label">Nombre del usuario</label>
                                    <input type="text" class="form-control" name="usuario" id="usuario"
                                        aria-describedby="helpId" placeholder="Nombre usuario">
                                </div>

                                <div class="mb-3">
                                    <label for="password" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" name="password" id="password"
                                        aria-describedby="helpId" placeholder="contraseña">
                                </div>

                                <div class="mb-3">
                                    <label for="correo" class="form-label">Correo</label>
                                    <input type="email" class="form-control" name="correo" id="correo"
                                        aria-describedby="helpId" placeholder="Correo">
                                </div>

                                <div class="mb-3">
                                    <label for="rol" class="form-label">Tipo de usuario</label>
                                    <select name="rol" id="rol" class="form-control">
                                        <option value="1">Admin</option>
                                        <option value="0">Consulta</option>
                                    </select>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
                                <button type="submit" class="btn btn-primary">Guardar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>


<?php include('../../templates/footer.php'); ?>
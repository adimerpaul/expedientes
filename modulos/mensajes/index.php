<?php 
include('../../templates/template.php');

include("../../conexion.php");

$idusuario=$_SESSION['login'];
$rol=$_SESSION['rol'];

if($rol==1){
    $sentencia=$conexion->prepare("SELECT *,usuarios.nombres as usuario FROM mensajes INNER JOIN usuarios ON mensajes.idusuario=usuarios.id");
    $sentencia->execute();
    $mensajes=$sentencia->fetchAll(PDO::FETCH_ASSOC);

}elseif($rol==0){
    $sentencia=$conexion->prepare("SELECT *,usuarios.nombres as usuario FROM mensajes INNER JOIN usuarios ON mensajes.idusuario=usuarios.id WHERE idusuario=:idusuario");
    $sentencia->bindParam(":idusuario",$idusuario);
    $sentencia->execute();
    $mensajes=$sentencia->fetchAll(PDO::FETCH_ASSOC);
}





if(isset($_GET['id'])){

$txtid=(isset($_GET['id'])? $_GET['id']:"");
$sentencia=$conexion->prepare("DELETE FROM mensajes WHERE id=:idtxt");
$sentencia->bindParam(":idtxt",$txtid);
$sentencia->execute();
echo '<script>window.location.href = "index.php";</script>';

}


?>


<div class="content-wrapper">

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Mensajes</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">mensajes</li>
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
                            <th>Usuario</th>
                            <th scope="col">Asunto</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1;  ?>
                        <?php foreach($mensajes as $mensaje)  {  ?>
                        <tr class="">
                            <td scope="row"><?php echo $i++; ?></td>
                            <td><?php echo $mensaje['usuario']; ?></td>
                            <td><?php echo $mensaje['asunto']; ?></td>
                            <td><?php echo $mensaje['descripcion'];  ?></td>
                            <td>

                                <button type="button" class="btn btn-info" data-toggle="modal"
                                    data-target="#edit<?php echo $mensaje['id']; ?>">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a class="btn btn-danger" href="javascript:borrar(<?php echo $mensaje['id'];?>)"
                                    role="button"> <i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <!-- Modal edit -->
                        <div class="modal fade" id="edit<?php echo $mensaje['id']; ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h5 class="modal-title" id="exampleModalLabel">EDITAR MENSAJE</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="editar.php" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="mb-3">

                                                <input type="hidden" value="<?php echo $mensaje['id'];?>"
                                                    class="form-control" name="txtid" id="txtid"
                                                    aria-describedby="helpId">
                                            </div>

                                            <div class="mb-3">
                                                <label for="asunto" class="form-label">Asunto</label>
                                                <input type="text" class="form-control" name="asunto"
                                                    value="<?php echo $mensaje['asunto'];?>" aria-describedby="helpId">
                                            </div>
                                            <div class="mb-3">
                                                <label for="descripcion" class="form-label">Descripcion</label>
                                                <input type="text" class="form-control" name="descripcion"
                                                    value="<?php echo $mensaje['descripcion'];?>" id="descripcion"
                                                    aria-describedby="helpId">
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
                        <?php } ?>

                    </tbody>
                </table>
            </div>

            <!-- Modal create -->
            <div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title" id="exampleModalLabel">AGREGAR MENSAJE</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="crear.php" method="post" enctype="multipart/form-data">
                            <div class="modal-body">


                                <div class="mb-3">
                                    <label for="asunto" class="form-label">Asunto</label>
                                    <input type="text" class="form-control" name="asunto" aria-describedby="helpId"
                                        placeholder="Asunto">
                                </div>
                                <div class="mb-3">
                                    <label for="descripcion" class="form-label">Descripción</label>
                                    <input type="text" class="form-control" name="descripcion" id="descripcion"
                                        aria-describedby="helpId" placeholder="Descripción">
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
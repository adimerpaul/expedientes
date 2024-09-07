<?php 
include('../../templates/template.php');

include("../../conexion.php");
$sentencia=$conexion->prepare("SELECT * FROM categorias");
$sentencia->execute();
$categorias=$sentencia->fetchAll(PDO::FETCH_ASSOC);



if(isset($_GET['id'])){

$txtid=(isset($_GET['id'])? $_GET['id']:"");
$sentencia=$conexion->prepare("DELETE FROM categorias WHERE id=:idtxt");
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
                    <h1 class="m-0">Especialidades</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">especialidades</li>
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
                            <th scope="col">Nombre</th>
                            <th>Descripción</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i=1;  ?>
                        <?php foreach($categorias as $categoria)  {  ?>
                        <tr class="">
                            <td scope="row"><?php echo $i++; ?></td>
                            <td><?php echo $categoria['nombre']; ?></td>
                            <td><?php echo $categoria['descripcion'];  ?></td>
                            <td>

                                <button type="button" class="btn btn-info" data-toggle="modal"
                                    data-target="#edit<?php echo $categoria['id']; ?>">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a class="btn btn-danger" href="javascript:borrar(<?php echo $categoria['id'];?>)"
                                    role="button"> <i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                        <!-- Modal edit -->
                        <div class="modal fade" id="edit<?php echo $categoria['id']; ?>" tabindex="-1"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header bg-primary">
                                        <h5 class="modal-title" id="exampleModalLabel">EDITAR ESPECIALIDADES</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="editar.php" method="post" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="mb-3">

                                                <input type="hidden" value="<?php echo $categoria['id'];?>"
                                                    class="form-control" name="txtid" id="txtid"
                                                    aria-describedby="helpId">
                                            </div>

                                            <div class="mb-3">
                                                <label for="nombre" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" name="nombre"
                                                    value="<?php echo $categoria['nombre'];?>" id="nombre"
                                                    aria-describedby="helpId">
                                            </div>
                                            <div class="mb-3">
                                                <label for="descripcion" class="form-label">Descripcion</label>
                                                <input type="text" class="form-control" name="descripcion"
                                                    value="<?php echo $categoria['descripcion'];?>" id="descripcion"
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
                            <h5 class="modal-title" id="exampleModalLabel">AGREGAR ESPECIALIDADES</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="crear.php" method="post" enctype="multipart/form-data">
                            <div class="modal-body">


                                <div class="mb-3">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" name="nombre" id="nombre"
                                        aria-describedby="helpId" placeholder="Nombre">
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
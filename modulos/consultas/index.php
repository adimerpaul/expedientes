<?php
include '../../templates/template.php';
include '../../conexion.php';

$user_id = $_SESSION['login'];
$sentencia = $conexion->prepare('SELECT archivos.*, categorias.nombre as categoria FROM archivos
INNER JOIN categorias on archivos.idcategoria=categorias.id
WHERE archivos.user_asignado_id = :user_id
order by id desc');
$sentencia->bindParam(':user_id', $user_id);
$sentencia->execute();
$archivos = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentencia = $conexion->prepare('SELECT * FROM categorias');
$sentencia->execute();
$categorias = $sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentencia = $conexion->prepare('SELECT * FROM instituciones');
$sentencia->execute();
$instituciones = $sentencia->fetchAll(PDO::FETCH_ASSOC);

if (isset($_GET['id'])) {
    $txtid = isset($_GET['id']) ? $_GET['id'] : '';
    $sentencia = $conexion->prepare('DELETE FROM mensajes WHERE id=:idtxt');
    $sentencia->bindParam(':idtxt', $txtid);
    $sentencia->execute();
    echo '<script>window.location.href = "index.php";</script>';
}
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Todos los expdientes</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">consultas</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>


    <div class="card">
        <div class="card-header">

            <div class="row">
                <div class="col-md-2">
                    <div class="mb-3">
                        <label for="" class="form-label">Especialidad</label>
                        <select name="categoria" id="categoria" class="form-control">
                            <option>Seleccionar...</option>
                            <?php foreach($categorias as $categoria): ?>
                            <option value="<?= $categoria['id'] ?>"><?= $categoria['nombre'] ?></option>
                            <?php endforeach ?>
                        </select>

                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-3">
                        <label for="" class="form-label">Ooad</label>
                        <select name="institucion" id="institucion" class="form-control">
                            <option>Seleccionar...</option>
                            <?php foreach($instituciones as $institucion): ?>
                            <option value="<?php echo $institucion['id']; ?>"><?php echo $institucion['nombre']; ?>
                            </option>
                            <?php endforeach ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="mb-2">
                        <label for="" class="form-label">Palabra clave</label>
                        <input type="search" class="form-control" placeholder="Buscar" id="palabraClave">

                    </div>
                </div>
                <div class="col-md-4">
                    <div class="mb-3">
                        <label for="" class="form-label d-block">Fecha de registro</label>

                        <div class="d-inline-block">
                            <input type="date" class="form-control" id="fechaInicio">
                        </div>

                        <div class="d-inline-block">
                            <input type="date" class="form-control" id="fechaFin">
                        </div>

                    </div>
                </div>

                <div class="col-md-2">
                    <div class="mb-3">
                        <label for="" class="form-label">Ordenar por:</label>
                        <select name="ordenarPor" id="ordenarPor" class="form-control">
                            <option value="recientes">Más recientes primero</option>
                            <option value="antiguos">Más antiguos primero</option>
                            <option value="descendente">En orden descendente</option>
                            <option value="ascendente">En orden ascendente</option>
                        </select>

                    </div>
                </div>
            </div>


        </div>
        <div class="card-body" id="archivosContainer">
            <?php foreach($archivos as $archivo): ?>
            <div class="row categoria-<?php echo $archivo['idcategoria']; ?> institucion-<?php echo $archivo['idinstitucion']; ?>" >
                <div class="col-lg-10">
                    <h4><?= $archivo['categoria'] ?> N.° <?= $archivo['numero'] ?></h4>
                    <p><?= $archivo['descripcion'] ?></p>
                    <p class="fecha-publicacion"><?= date('d/m/Y', strtotime($archivo['fecha'])) ?></p>
                </div>
                <div class="col-lg-2 text-right pt-5">
                    <a href="detalles.php?id=<?php echo $archivo['id']; ?>" class="btn btn-outline-primary">Leer más ></a>
                </div>
            </div>

            <?php endforeach ?>
        </div>

    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#categoria').change(function() {
        var categoriaSeleccionada = $(this).val();
        if (categoriaSeleccionada == 'Seleccionar...') {
            $('#archivosContainer .row').show();
        } else {
            $('#archivosContainer .row').hide();
            $('#archivosContainer .categoria-' + categoriaSeleccionada).show();
        }
    });

    $('#institucion').change(function() {
        var institucionSeleccionada = $(this).val();
        if (institucionSeleccionada == 'Seleccionar...') {
            $('#archivosContainer .row').show();
        } else {
            $('#archivosContainer .row').hide();
            $('#archivosContainer .institucion-' + institucionSeleccionada).show();
        }
    });

    $('#palabraClave').on('input', function() {
        var palabraClave = $(this).val().toLowerCase();
        $('#archivosContainer .row').hide();
        $('#archivosContainer .row').filter(function() {
            var contenido = $(this).text().toLowerCase();
            return contenido.indexOf(palabraClave) > -1;
        }).show();
    });

    $('#fechaInicio, #fechaFin').change(function() {
        var fechaInicio = $('#fechaInicio').val();
        var fechaFin = $('#fechaFin').val();

        $('#archivosContainer .row').hide();

        $('#archivosContainer .row').filter(function() {
            var fechaArchivo = $(this).find('.fecha-publicacion').text();
            var fechaArchivoFormatted = fechaArchivo.split('/').reverse().join('-');
            return fechaArchivoFormatted >= fechaInicio && fechaArchivoFormatted <= fechaFin;
        }).show();
    });
    $('#ordenarPor').change(function() {
        var ordenSeleccionado = $(this).val();
        var archivosContainer = $('#archivosContainer');
        var archivos = archivosContainer.find('.row');

        switch (ordenSeleccionado) {
            case 'recientes':
                archivos.sort(function(a, b) {
                    var fechaA = parseDate($(a).find('.fecha-publicacion').text());
                    var fechaB = parseDate($(b).find('.fecha-publicacion').text());
                    return fechaB - fechaA;
                });
                archivosContainer.html(archivos);
                break;
            case 'antiguos':
                archivos.sort(function(a, b) {
                    var fechaA = parseDate($(a).find('.fecha-publicacion').text());
                    var fechaB = parseDate($(b).find('.fecha-publicacion').text());
                    return fechaA - fechaB;
                });
                archivosContainer.html(archivos);
                break;
            case 'descendente':
                archivos.sort(function(a, b) {
                    var fechaA = parseDate($(a).find('.fecha-publicacion').text());
                    var fechaB = parseDate($(b).find('.fecha-publicacion').text());
                    return fechaB - fechaA;
                });
                archivosContainer.html(archivos);
                break;
            case 'ascendente':
                archivos.sort(function(a, b) {
                    var fechaA = parseDate($(a).find('.fecha-publicacion').text());
                    var fechaB = parseDate($(b).find('.fecha-publicacion').text());
                    return fechaA - fechaB;
                });
                archivosContainer.html(archivos);
                break;
            default:
                break;
        }
    });


    function parseDate(dateString) {
        var parts = dateString.split('/');
        var day = parseInt(parts[0], 10);
        var month = parseInt(parts[1], 10) - 1;
        var year = parseInt(parts[2], 10);
        return new Date(year, month, day);
    }
</script>


<?php include '../../templates/footer.php'; ?>

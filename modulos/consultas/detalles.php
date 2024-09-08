<?php 
include('../../templates/template.php');
include("../../conexion.php");



    $idconsulta=$_GET['id'];


$sentencia = $conexion->prepare("SELECT archivos.*, categorias.nombre as categoria FROM archivos INNER JOIN categorias on archivos.idcategoria=categorias.id WHERE archivos.id=:idconsulta");
$sentencia->bindParam(":idconsulta",$idconsulta);
$sentencia->execute();
$archivos = $sentencia->fetch(PDO::FETCH_ASSOC);
$categoria=$archivos['categoria'];
$numero=$archivos['numero'];
$fecha=$archivos['fecha'];
$descripcion=$archivos['descripcion'];
//$miniatura=$archivos['miniatura'];
$documento=$archivos['documento'];
$tipo=$archivos['tipo'];
$tamaño=$archivos['tamano'];



?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Todas las normas y documentos legales</h1>
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


    <div class="p-3">
        <h2><?php echo $categoria;  ?> N.° <?php echo $numero; ?> </h2>
        <p><?php echo date("d/m/Y", strtotime($fecha)); ?></p>
        <p><?php echo $descripcion; ?></p>
        <h3>Documentos</h3>
    </div>

    <div class="card mb-3 p-3" style="max-width: 440px;">
        <div class="row no-gutters">
          
              <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title text-lg"><?php echo $categoria;  ?> N.° <?php echo $numero; ?></h5>
                    <p class="card-text pt-3"><?php echo $tipo; ?> | <?php echo $tamaño; ?></p>
                    <a href="../../public/documentos/<?php echo $documento; ?>" class="btn btn-outline-primary btn-lg" target="_blank"><i class="fas fa-download"></i> Descargar</a>
                </div>

            </div>
        </div>
    </div>
      <!-- Columna derecha con el formulario -->
      <div class="col-md-6">
            <div class="card-body">
                <form>
                    <div class="mb-3">
                        <label for="fileUpload" class="form-label">Subir documento Word</label>
                        <input type="file" class="form-control" id="fileUpload" name="fileUpload" required>
                    </div>
                    <button type="submit" class="btn btn-primary" id="btnSubmit">Subir</button>
                    <button type="button" class="btn btn-secondary" onclick="window.history.back();">Cancelar</button>
                </form>
            </div>
        </div>


</div>

 



<!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
<script>
    window.onload = function() {
        $('#btnSubmit').click(function() {
            if ($('#fileUpload').val() == '') {
                toastr.error('Por favor seleccione un archivo');
                return false;
            }
            // var fileUpload = $('#fileUpload').val();
            const form = new FormData();
            form.append('documento', $('#fileUpload')[0].files[0]);
            form.append('id', <?php echo $idconsulta; ?>);
            $.ajax({
                url: '../../controllers/ArchivoControllers.php/updateArchivoAsignado',
                type: 'POST',
                data: form,
                contentType: false,
                processData: false,
                success: function(response) {
                    toastr.success('Archivo subido correctamente');
                },
                error: function() {
                    toastr.error('Error al subir el archivo');
                }
            });
            return false;
        });
    }
// $('#categoria').change(function() {
//     var categoriaSeleccionada = $(this).val();
//     if (categoriaSeleccionada == 'Seleccionar...') {
//         $('#archivosContainer .row').show();
//     } else {
//         $('#archivosContainer .row').hide();
//         $('#archivosContainer .categoria-' + categoriaSeleccionada).show();
//     }
// });
//
// $('#institucion').change(function() {
//     var institucionSeleccionada = $(this).val();
//     if (institucionSeleccionada == 'Seleccionar...') {
//         $('#archivosContainer .row').show();
//     } else {
//         $('#archivosContainer .row').hide();
//         $('#archivosContainer .institucion-' + institucionSeleccionada).show();
//     }
// });
//
// $('#palabraClave').on('input', function() {
//     var palabraClave = $(this).val().toLowerCase();
//     $('#archivosContainer .row').hide();
//     $('#archivosContainer .row').filter(function() {
//         var contenido = $(this).text().toLowerCase();
//         return contenido.indexOf(palabraClave) > -1;
//     }).show();
// });
//
// $('#fechaInicio, #fechaFin').change(function() {
//     var fechaInicio = $('#fechaInicio').val();
//     var fechaFin = $('#fechaFin').val();
//
//     $('#archivosContainer .row').hide();
//
//     $('#archivosContainer .row').filter(function() {
//         var fechaArchivo = $(this).find('.fecha-publicacion').text();
//         var fechaArchivoFormatted = fechaArchivo.split('/').reverse().join('-');
//         return fechaArchivoFormatted >= fechaInicio && fechaArchivoFormatted <= fechaFin;
//     }).show();
// });
// $('#ordenarPor').change(function() {
//     var ordenSeleccionado = $(this).val();
//     var archivosContainer = $('#archivosContainer');
//     var archivos = archivosContainer.find('.row');
//
//     switch (ordenSeleccionado) {
//         case 'recientes':
//             archivos.sort(function(a, b) {
//                 var fechaA = new Date($(a).find('.fecha-publicacion').text());
//                 var fechaB = new Date($(b).find('.fecha-publicacion').text());
//                 return fechaB - fechaA;
//             });
//             archivosContainer.html(archivos);
//             break;
//         case 'antiguos':
//             archivos.sort(function(a, b) {
//                 var fechaA = new Date($(a).find('.fecha-publicacion').text());
//                 var fechaB = new Date($(b).find('.fecha-publicacion').text());
//                 return fechaA - fechaB;
//             });
//             archivosContainer.html(archivos);
//             break;
//         case 'descendente':
//             archivos.sort(function(a, b) {
//                 var fechaA = new Date($(a).find('.fecha-publicacion').text());
//                 var fechaB = new Date($(b).find('.fecha-publicacion').text());
//                 return fechaB - fechaA;
//             });
//             archivosContainer.html(archivos);
//             break;
//         case 'ascendente':
//             archivos.sort(function(a, b) {
//                 var fechaA = new Date($(a).find('.fecha-publicacion').text());
//                 var fechaB = new Date($(b).find('.fecha-publicacion').text());
//                 return fechaA - fechaB;
//             });
//             archivosContainer.html(archivos);
//             break;
//         default:
//             break;
//     }
// });
</script>


<?php include('../../templates/footer.php'); ?>
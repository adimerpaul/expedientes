<?php
include('../../templates/template.php');
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Documentos</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">home</a></li>
                        <li class="breadcrumb-item active">documentos</li>
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
                <table id="tableArchivos" class="table table-bordered table-striped table-hover">
                    <thead class="bg-navy">
                        <tr>
                            <th>ID</th>
                            <th>Especialidad</th>
                            <th>Ooad</th>
                            <th>Motivo</th>
                            <th>Actor</th>
                            <th>Número de Expediente</th>
                            <th>Pdf</th>
                            <th>Word</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Modal create -->
<div class="modal fade" id="create" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary">
                <h5 class="modal-title" id="exampleModalLabel">AGREGAR ARCHIVO</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" enctype="multipart/form-data" id="formCreate">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="idcategoria" class="form-label">Especialidad</label>
                                <select class="form-control form-select form-select-sm" name="idcategoria"
                                    id="idcategoria">
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="idinstitucion" class="form-label">Ooad</label>
                                <select class="form-control form-select form-select-sm" name="idinstitucion"
                                    id="idinstitucion">
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="motivo" class="form-label">Motivo</label>
                                <input type="text" class="form-control" name="motivo" id="motivo"
                                    aria-describedby="helpId" placeholder="Motivo">
                            </div>
                            <div class="mb-3">
                                <label for="nombre" class="form-label">Actor</label>
                                <input type="text" class="form-control" name="nombre" id="nombre"
                                    aria-describedby="helpId" placeholder="Nombres">
                            </div>
                            <div class="mb-3">
                                <label for="numero" class="form-label">Número de expediente</label>
                                <input type="text" class="form-control" name="numero" id="numero"
                                    aria-describedby="helpId" placeholder="Número">
                            </div>
                            <div class="mb-3">
                                <label for="fecha" class="form-label">Fecha</label>
                                <input type="date" class="form-control" name="fecha" id="fecha"
                                    aria-describedby="helpId" placeholder="">
                            </div>

                        </div>
                        <div class="col-md-6">

                            <!-- <div class="mb-3">
                                    <label for="" class="form-label">Miniatura</label>
                                    <input type="file" class="form-control" name="miniatura" id="miniatura"
                                        aria-describedby="helpId">
                                </div>-->
                            <div class="mb-3">
                                <label for="" class="form-label">Archivo</label>
                                <input type="file" class="form-control" name="documento" id="documento"
                                    aria-describedby="helpId">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Tipo de archivo</label>
                                <input type="text" class="form-control" name="tipo" id="tipo"
                                    aria-describedby="helpId" placeholder="Tipo">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Tamaño de archivo</label>
                                <input type="text" class="form-control" name="tamano" id="tamano"
                                    aria-describedby="helpId" placeholder="Tamaño">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label">Descripción</label>
                                <textarea name="descripcion" id="descripcion" class="form-control" cols="30" rows="5"
                                    placeholder="Descripción"></textarea>
                            </div>
                        </div>
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
<script>
    window.onload = function () {
        let archivos = []
        let archivo = {}
        $('#tableArchivos').DataTable();
        archivosGet();
        categoriasInstitucionesGet();
        $('#documento').change(function (e) {
            let file = e.target.files[0];
            console.log(file.type);
            if (file.type == 'application/pdf') {
                $('#tipo').val('pdf');
            } else if (file.type == 'application/msword') {
                $('#tipo').val('word');
            } else if (file.type == 'image/jpeg') {
                $('#tipo').val('jpeg');
            } else if (file.type == 'image/png') {
                $('#tipo').val('png');
            } else {
                $('#tipo').val('otro');
            }
            $('#tamano').val((file.size / 1024).toFixed(2) + ' KB');
        });

        $('#formCreate').submit(function (e) {
            e.preventDefault();
            if ($('#documento')[0].files.length == 0) {
                alert('El archivo es requerido');
                return;
            }
            let formData = new FormData();
            formData.append('idcategoria', $('#idcategoria').val());
            formData.append('idinstitucion', $('#idinstitucion').val());
            formData.append('motivo', $('#motivo').val());
            formData.append('nombre', $('#nombre').val());
            formData.append('numero', $('#numero').val());
            formData.append('fecha', $('#fecha').val());
            formData.append('documento', $('#documento')[0].files[0]);
            formData.append('tipo', $('#tipo').val());
            formData.append('tamano', $('#tamano').val());
            formData.append('descripcion', $('#descripcion').val());
            $.ajax({
                url: '../../controllers/ArchivoControllers.php/',
                type: 'POST',
                data: formData,
                contentType: false,
                processData: false,
                success: function (response) {
                    console.log(response);
                    $('#create').modal('hide');
                    archivosGet();
                }
            });
        });

        function categoriasInstitucionesGet() {
            $.ajax({
                url: '../../controllers/ArchivoControllers.php/categoriasInstituciones',
                type: 'GET',
                success: function (response) {
                    console.log(response);
                    let data = JSON.parse(response);
                    let categorias = data.categorias;
                    let instituciones = data.instituciones;
                    let templateCategorias = '';
                    let templateInstituciones = '';
                    categorias.forEach(c => {
                        templateCategorias += `
                        <option value="${c.id}">${c.nombre}</option>
                        `;
                    });
                    instituciones.forEach(i => {
                        templateInstituciones += `
                        <option value="${i.id}">${i.nombre}</option>
                        `;
                    });
                    $('#idcategoria').html(templateCategorias);
                    $('#idinstitucion').html(templateInstituciones);
                }
            });
        }
        $(document).on('click', '.edit-btn', function() {
            const id = $(this).data('id');
            console.log(id);
            $('#create').modal('show');
            const archivo = archivos.find(a => a.id == id);
            $('#idcategoria').val(archivo.idcategoria);
            $('#idinstitucion').val(archivo.idinstitucion);
            $('#motivo').val(archivo.motivo);
            $('#nombre').val(archivo.nombre);
            $('#numero').val(archivo.numero);
            $('#fecha').val(archivo.fecha);
            $('#tipo').val(archivo.tipo);
            $('#tamano').val(archivo.tamano);
            $('#descripcion').val(archivo.descripcion);
        });

        function archivosGet() {
            $('#tbody').html('');
            $('#tableArchivos').DataTable().destroy();
            archivos = [];
            $.ajax({
                url: '../../controllers/ArchivoControllers.php/',
                type: 'GET',
                success: function (response) {
                    // console.log(response);
                    let data = JSON.parse(response);
                    let template = '';
                    data.forEach(d => {
                        archivos.push(d);
                        template += `
                        <tr>
                            <td>${d.id}</td>
                            <td>${d.categoria}</td>
                            <td>${d.institucion}</td>
                            <td>${d.motivo}</td>
                            <td>${d.nombre}</td>
                            <td>${d.numero}</td>
                            <td>
                                <a href="../../public/documentos/${d.documento}" target="_blank">
                                    <i class="fas fa-eye text-success"></i>
                                </a>
                            </td>
                            <td>
                                <a href="../../public/documentos/${d.documento}" target="_blank">
                                    <i class="fas fa-eye text-success"></i>
                                </a>
                            </td>
                            <td class="text-center">
                            <div class="btn-group mr-2" role="group" aria-label="First group">
                                <button type="button" class="btn btn-info btn-sm edit-btn" data-id="${d.id}">
                                    <i class="fas fa-edit"></i> Editar
                                </button>
                                <button type="button" class="btn btn-warning btn-sm" data-toggle="modal" data-target="#asig${d.id}">
                                    <i class="fas fa-stethoscope"></i> Asignar
                                </button>
                                <a class="btn btn-danger btn-sm" href="javascript:borrar(${d.id})">
                                    <i class="fas fa-trash-alt"></i> Eliminar
                                </a>
                            </div>
                            </td>
                        </tr>
                        `;
                    });
                    $('#tbody').html(template);
                    $('#tableArchivos').DataTable();
                }
            });
        }
    }
</script>

<?php include('../../templates/footer.php'); ?>
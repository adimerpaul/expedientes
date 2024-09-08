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
<!--                        --><?php //$i = 1; ?>
<!--                        --><?php //foreach ($archivos as $archivo) { ?>
<!--                            <tr class="">-->
<!--                                <td>--><?php //echo $i++; ?><!--</td>-->
<!--                                <td>--><?php //echo $archivo['categoria']; ?><!-- </td>-->
<!--                                <td>--><?php //echo $archivo['institucion']; ?><!-- </td>-->
<!--                                <td>--><?php //echo $archivo['motivo']; ?><!-- </td>-->
<!--                                <td>--><?php //echo $archivo['nombre']; ?><!-- </td>-->
<!--                                <td>--><?php //echo $archivo['numero']; ?><!-- </td>-->
<!---->
<!--                                    <td>-->
<!--                                        <a href="../../public/documentos/--><?php //echo $archivo["documento"]; ?><!--"-->
<!--                                            target="_blank"><i class="fas fa-eye text-success"></i> </a>-->
<!--                                    </td>-->
<!---->
<!--                                    <!-- Aqui se debe ver el documento de word. -->-->
<!--                                    <td>-->
<!--                                        <a href="../../public/documentos/--><?php //echo $archivo["documento"]; ?><!--"  -->
<!--                                            target="_blank"><i class="fas fa-eye text-success"></i> </a>-->
<!--                                    </td>-->
<!--                                    <td>-->
<!--                                        <button type="button" class="btn btn-info" data-toggle="modal"-->
<!--                                            data-target="#edit--><?php //echo $archivo['id']; ?><!--">-->
<!--                                            <i class="fas fa-edit"></i>-->
<!--                                        </button>-->
<!--                                        <br>-->
<!--                                        <br>-->
<!---->
<!--                                        <button type="button" data-toggle="modal" data-target="#asig--><?php //echo $archivo['id']; ?><!--">-->
<!--                                            <i class="fas fa-stethoscope" style="font-size: 20px; margin-right: 5px;"></i>-->
<!--                                        </button>-->
<!--                                        <br>-->
<!--                                        <br>-->
<!--                                        <a class="btn btn-danger" href="javascript:borrar(--><?php //echo $archivo['id']; ?><!--)"-->
<!--                                            role="button"> <i class="fas fa-trash-alt"></i></a>-->
<!--                                    </td>-->
<!--                            </tr>-->
<!--            -->
<!--            <!-- Modal edit -->-->
<!--            <div class="modal fade" id="edit--><?php //echo $archivo['id']; ?><!--" tabindex="-1"-->
<!--                aria-labelledby="exampleModalLabel" aria-hidden="true">-->
<!--                <div class="modal-dialog modal-lg">-->
<!--                    <div class="modal-content">-->
<!--                        <div class="modal-header bg-primary">-->
<!--                            <h5 class="modal-title" id="exampleModalLabel">EDITAR ARCHIVO</h5>-->
<!--                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">-->
<!--                                <span aria-hidden="true">&times;</span>-->
<!--                            </button>-->
<!--                        </div>-->
<!--                        <form action="editar.php" method="post" enctype="multipart/form-data">-->
<!--                            <div class="modal-body">-->
<!--                                <div class="row">-->
<!--                                    <div class="col-md-6">-->
<!--                                        <div class="mb-3">-->
<!---->
<!--                                            <input type="hidden" value="--><?php //echo $archivo['id']; ?><!--"-->
<!--                                                class="form-control" name="txtid" id="txtid"-->
<!--                                                aria-describedby="helpId">-->
<!--                                        </div>-->
<!---->
<!---->
<!--                                        <div class="mb-3">-->
<!--                                            <label for="idcategoria" class="form-label">Especialidad</label>-->
<!--                                            <select class=" form-control form-select form-select-sm"-->
<!--                                                name="idcategoria" id="idcategoria">-->
<!--                                                --><?php //foreach ($categorias as $categoria) {  ?>
<!--                                                    <option-->
<!--                                                        --><?php //echo ($archivo['idcategoria'] == $categoria['id']) ? "selected" : ""; ?>
<!--                                                        value="--><?php //echo $categoria['id']; ?><!--">-->
<!--                                                        --><?php //echo $categoria['nombre']; ?>
<!--                                                    </option>-->
<!--                                                --><?php // } ?>
<!--                                            </select>-->
<!--                                        </div>-->
<!---->
<!--                                        <div class="mb-3">-->
<!--                                            <label for="idinstitucion"-->
<!--                                                class="form-label">Ooad</label>-->
<!--                                            <select class=" form-control form-select form-select-sm"-->
<!--                                                name="idinstitucion" id="idinstitucion">-->
<!--                                                --><?php //foreach ($instituciones as $institucion) {  ?>
<!--                                                    <option-->
<!--                                                        --><?php //echo ($archivo['idinstitucion'] == $institucion['id']) ? "selected" : ""; ?>
<!--                                                        value="--><?php //echo $institucion['id']; ?><!--">-->
<!--                                                        --><?php //echo $institucion['nombre']; ?>
<!--                                                    </option>-->
<!--                                                --><?php // } ?>
<!--                                            </select>-->
<!--                                        </div>-->
<!--                                        <div class="mb-3">-->
<!--                                            <label for="motivo" class="form-label">Motivo</label>-->
<!--                                            <textarea class="form-control" name="motivo"-->
<!--                                                id="motivo" aria-describedby="helpId">--><?php //echo isset($archivo['motivo']) ? htmlspecialchars($archivo['motivo'], ENT_QUOTES, 'UTF-8') : ""; ?><!--</textarea>-->
<!--                                        </div>-->
<!---->
<!--                                        <div class="mb-3">-->
<!--                                            <label for="nombre" class="form-label">Actor</label>-->
<!--                                            <input type="text" class="form-control" name="nombre"-->
<!--                                                id="nombre" aria-describedby="helpId"-->
<!--                                                value="--><?php //echo isset($archivo['nombre']) ? $archivo['nombre'] : ""; ?><!--">-->
<!--                                        </div>-->
<!--                                        <div class="mb-3">-->
<!--                                            <label for="numero" class="form-label">Número de expediente</label>-->
<!--                                            <input type="text" class="form-control" name="numero"-->
<!--                                                id="numero" aria-describedby="helpId"-->
<!--                                                value="--><?php //echo $archivo['numero']; ?><!--">-->
<!--                                        </div>-->
<!--                                        <div class="mb-3">-->
<!--                                            <label for="fecha" class="form-label">Fecha</label>-->
<!--                                            <input type="date" class="form-control" name="fecha" id="fecha"-->
<!--                                                aria-describedby="helpId"-->
<!--                                                value="--><?php //echo $archivo['fecha']; ?><!--">-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                    <div class="col-md-6">-->
<!--                                        <!-- <div class="mb-3">-->
<!--                                                            <label for="" class="form-label">Miniatura</label>-->
<!--                                                            <input type="file" class="form-control" name="miniatura"-->
<!--                                                                id="miniatura" aria-describedby="helpId">-->
<!--                                                        </div>-->-->
<!--                                        <div class="mb-3">-->
<!--                                            <label for="" class="form-label">Archivo</label>-->
<!--                                            <input type="file" class="form-control" name="documento" id=""-->
<!--                                                aria-describedby="helpId">-->
<!--                                        </div>-->
<!--                                        <div class="mb-3">-->
<!--                                            <label for="" class="form-label">Tipo de archivo</label>-->
<!--                                            <input type="text" class="form-control" name="tipo" id=""-->
<!--                                                aria-describedby="helpId"-->
<!--                                                value="--><?php //echo $archivo['tipo']; ?><!--">-->
<!--                                        </div>-->
<!--                                        <div class="mb-3">-->
<!--                                            <label for="" class="form-label">Tamaño de archivo</label>-->
<!--                                            <input type="text" class="form-control" name="tamano" id=""-->
<!--                                                aria-describedby="helpId"-->
<!--                                                value="--><?php //echo $archivo['tamano']; ?><!--">-->
<!--                                        </div>-->
<!--                                        <div class="mb-3">-->
<!--                                            <label for="" class="form-label">Descripción</label>-->
<!--                                            <textarea name="descripcion" id=""-->
<!--                                                class="form-control">--><?php //echo $archivo['descripcion']; ?><!--</textarea>-->
<!--                                        </div>-->
<!--                                    </div>-->
<!--                                </div>-->
<!---->
<!---->
<!--                            </div>-->
<!--                            <div class="modal-footer">-->
<!--                                <button type="button" class="btn btn-danger"-->
<!--                                    data-dismiss="modal">Cerrar</button>-->
<!--                                <button type="submit" class="btn btn-primary">Actualizar</button>-->
<!--                            </div>-->
<!--                        </form>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        --><?php //  } ?>
<!--        </tbody>-->
<!--        </table>-->
<!--        </div>-->
<!---->
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
                    <form action="crear.php" method="post" enctype="multipart/form-data">
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
                                        <input type="file" class="form-control" name="documento" id=""
                                            aria-describedby="helpId">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Tipo de archivo</label>
                                        <input type="text" class="form-control" name="tipo" id=""
                                            aria-describedby="helpId" placeholder="Tipo">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Tamaño de archivo</label>
                                        <input type="text" class="form-control" name="tamano" id=""
                                            aria-describedby="helpId" placeholder="Tamaño">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="form-label">Descripción</label>
                                        <textarea name="descripcion" id="" class="form-control"></textarea>
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

<!--    </div>-->
<!---->
<!--</div>-->
<!--</div>-->
    <script>
        window.onload = function () {
            $('#tableArchivos').DataTable();
            archivosGet();
            categoriasInstitucionesGet();
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

            function archivosGet() {
                $('#tbody').html('');
                $('#tableArchivos').DataTable().destroy();
                $.ajax({
                    url: '../../controllers/ArchivoControllers.php/',
                    type: 'GET',
                    success: function (response) {
                        // console.log(response);
                        let data = JSON.parse(response);
                        let template = '';
                        data.forEach(d => {
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
                                <td>
                                    <button type="button" class="btn btn-info" data-toggle="modal" data-target="#edit${d.id}">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <br>
                                    <br>
                                    <button type="button" data-toggle="modal" data-target="#asig${d.id}">
                                        <i class="fas fa-stethoscope" style="font-size: 20px; margin-right: 5px;"></i>
                                    </button>
                                    <br>
                                    <br>
                                    <a class="btn btn-danger" href="javascript:borrar(${d.id})" role="button">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
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
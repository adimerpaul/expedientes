<?php

include 'conexion.php';

$sql = $conexion->prepare('SELECT COUNT(id) FROM usuarios');
$sql->execute();
$usuarios = $sql->fetchColumn();

$sql = $conexion->prepare('SELECT COUNT(id) FROM categorias');
$sql->execute();
$categorias = $sql->fetchColumn();

$sql = $conexion->prepare('SELECT COUNT(id) FROM archivos');
$sql->execute();
$archivos = $sql->fetchColumn();

$sql = $conexion->prepare('SELECT COUNT(id) FROM mensajes');
$sql->execute();
$mensajes = $sql->fetchColumn();

$anio_actual = date('Y');

$sql = "SELECT MONTH(fecha) AS mes, COUNT(*) AS cantidad_documentos
        FROM archivos
        WHERE YEAR(fecha) = :anio
        GROUP BY MONTH(fecha)
        ORDER BY mes";

$stmt = $conexion->prepare($sql);
$stmt->bindParam(':anio', $anio_actual, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

$datosDocumentos = array_fill(0, 12, 0);

foreach ($result as $row) {
    $mes = intval($row['mes']) - 1;
    $cantidad = intval($row['cantidad_documentos']);
    $datosDocumentos[$mes] = $cantidad;
}

?>



<?php include 'templates/template.php'; ?>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Sistema de Gestión de Expedientes</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-user"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Usuarios</span>
                            <span class="info-box-number">
                                <?= $usuarios ?>

                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-info elevation-1"><i class="fas fa-briefcase"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Especialidades</span>
                            <span class="info-box-number"><?= $categorias ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-secondary elevation-1"><i class="fas fa-file"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Documentos</span>
                            <span class="info-box-number"><?= $archivos ?></span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
        
                <!-- /.col -->
            </div>
        </div>
        <!--/. container-fluid -->
    </section>

</div>


<?php include 'templates/footer.php'; ?>

<script>
    $(function() {

        var datosDocumentos = <?php echo json_encode($datosDocumentos); ?>;

        var areaChartData = {
            labels: [
                "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio",
                "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"
            ],
            datasets: [{
                label: "Documentos Subidos",
                backgroundColor: "rgba(60,141,188,0.9)",
                borderColor: "rgba(60,141,188,0.8)",
                borderWidth: 1,
                data: datosDocumentos
            }],
        };

        var barChartCanvas = $("#barChart").get(0).getContext("2d");

        var barChartOptions = {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                xAxes: [{
                    gridLines: {
                        display: false,
                    },
                }],
                yAxes: [{
                    ticks: {
                        beginAtZero: true,
                    },
                    gridLines: {
                        display: true,
                    },
                }],
            },
        };


        new Chart(barChartCanvas, {
            type: 'bar',
            data: areaChartData,
            options: barChartOptions
        });
    });
</script>
<!-- /.content -->

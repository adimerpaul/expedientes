<?php
session_start();
if ($_POST) {

    include("conexion.php");

    $usuario = $_POST['usuario'];
    $password = $_POST['password'];

    $sentencia = $conexion->prepare("SELECT *, count(*) as n_usuarios FROM usuarios WHERE usuario=:usuario AND password=:password");
    $sentencia->bindParam(":usuario", $usuario);
    $sentencia->bindParam(":password", $password);
    $sentencia->execute();

    $registro = $sentencia->fetch(PDO::FETCH_ASSOC);


    if ($registro["n_usuarios"] > 0) {
        $_SESSION['login'] = $registro['id'];
        $_SESSION['usuario'] = $registro['usuario'];
        $_SESSION['nombre'] = $registro['nombres'];
        $_SESSION['rol'] = $registro['rol'];
        $_SESSION['logueado'] = true;
        header("location:home");
    } else {
        $mensaje = "Usuario o contraseña incorrecta";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="templates/plugins/fontawesome-free/css/all.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="templates/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="templates/dist/css/adminlte.min.css">
</head>

<body class="hold-transition login-page">
    <div class="login-box">
        <!-- /.login-logo -->
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="" class="h1"><b>GESTIÓN DE EXPEDIENTES</b></a>
            </div>
            <div class="card-body">
                <p class="login-box-msg">Iniciar sesión</p>
                <?php if(isset($mensaje)) {  ?>
                <div class="alert alert-danger" role="alert">
                    <strong><?php echo $mensaje;  ?></strong>
                </div>
                <?php } ?>

                <form action="" method="post">
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="usuario" placeholder="usuario">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Contraseña">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">
    
                        </div>
                        <!-- /.col -->
                        <div class="col-4">
                            <button type="submit" class="btn btn-primary btn-block">Ingresar</button>
                        </div>
                        <!-- /.col -->
                    </div>
                </form>


                <!-- /.social-auth-links -->

            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </div>
    <!-- /.login-box -->

    <!-- jQuery -->
    <script src="templates/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="templates/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="templates/dist/js/adminlte.min.js"></script>
</body>

</html>
<?php
  session_start();

  if ($_POST) {
    include("./bd.php");

    $usuario = (isset($_POST['usuario'])) ? $_POST['usuario'] : "";
    $contraseña = (isset($_POST['contraseña'])) ? $_POST['contraseña'] : "";

    if (empty($usuario) || empty($contraseña)) {
        echo '<div class="alert alert-warning" role="alert">Por favor, completa todos los campos.</div>';
    } else {
        $sentencia = $conexion->prepare("SELECT *, count(*) as n_usuarios FROM `tb_usuarios` 
        WHERE correo=:correo AND pass=:pass");
        $sentencia->bindParam(":correo", $usuario);
        $sentencia->bindParam(":pass", $contraseña);
        $sentencia->execute();
        $usuario_encontrado = $sentencia->fetch(PDO::FETCH_LAZY);

        if ($usuario_encontrado['n_usuarios'] > 0) {
            $mensaje="El usuario existe";
                $_SESSION['correo'] = $usuario_encontrado['correo'];
                $_SESSION['logueado'] = true;
                header("Location:index.php");
                exit();
            } else {
                echo '<div class="alert alert-danger" role="alert">Error: La contraseña es incorrecta</div>';
            }
        } 
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Log in</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../admin/libros/plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../admin/libros/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../admin/libros/dist/css/adminlte.min.css">

  </head>

  <body class="hold-transition login-page">
      <div class="login-box">
      <!-- /.login-logo -->
      <div class="card card-outline card-primary">
        <div class="card-header text-center">
          <a class="h1"><b>Administrador del semillero </b></a>
        </div>
        <div class="card-body">
          <p class="login-box-msg">INICIO DE SESION</p>

          <form action="" method="post">
            <div class="input-group mb-3">
            <input id="usuario" type="email" name="usuario" class="form-control" placeholder="CORREO ELECTRONICO" />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
            <input for="contraseña" type="password" name="contraseña" id="pass" class="form-control" placeholder="CONTRASEÑA" />

              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input type="checkbox" id="remember" />
                  <label for="remember">Recordarme</label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
              <input type="hidden" name="enviar" id="enviar" class="form-control" value="si">
              <button type="submit" class="btn btn-primary btn-block">
                INICIAR
                </button>
              </div>
              <!-- /.col -->
            </div>
            
            
          </form>

          <p class="mb-1">
            <a href="cambio_contraseña.php">OLVIDASTE LA CONTRASEÑA</a>
          </p>
          
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
    <!-- /.login-box -->
      <!-- LOGIN -->
     <!-- jQuery -->
     <script src="../admin/libros/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap 4 -->
    <script src="../admin/libros/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../admin/libros/dist/js/adminlte.min.js"></script>
  </body>
</html>
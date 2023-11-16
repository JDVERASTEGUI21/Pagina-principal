<?php 
session_start();
$url_base = "http://localhost/pagina/admin/";
if (!isset($_SESSION['correo'])) {
  header("Location: " . $url_base . "login.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Administrador semillero</title>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="icon" type="image/x-icon" href="../../../assets/favicon.ico" />
  <!-- DataTable -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" />
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.3.3/css/buttons.bootstrap5.min.css"/>
  <!-- Bootstrap-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"/>
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w=="
    crossorigin="anonymous" referrerpolicy="no-referrer"/>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
<header>
  <!-- place navbar here -->
  <nav class="navbar navbar-expand navbar-light bg-light">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="#" aria-current="page">Administrador <span class="visually-hidden">(current)</span></a>
      <a class="nav-item nav-link" href="<?php echo $url_base; ?>secciones/servicios/">Servicios</a>
      <a class="nav-item nav-link" href="<?php echo $url_base; ?>secciones/portafolio/">Portafolio</a>
      <a class="nav-item nav-link" href="<?php echo $url_base; ?>secciones/entradas/">Entradas</a>
      <a class="nav-item nav-link" href="<?php echo $url_base; ?>secciones/Profesores/">Profesores</a>
      <a class="nav-item nav-link" href="<?php echo $url_base; ?>secciones/Estudiantes/">Estudiantes</a>
      <a class="nav-item nav-link" href="<?php echo $url_base; ?>secciones/configuraciones/">Configuraciones</a>
      <a class="nav-item nav-link" href="<?php echo $url_base; ?>secciones/Admin/">Admin</a>
      <a class="nav-item nav-link" href="<?php echo $url_base; ?>cerrar.php">Cerrar sesión</a>
    </div>
  </nav>
</header>

<main class="container">

<script>
  <?php if (isset($_GET['mensaje'])) { ?>
    Swal.fire({ icon: "success", title: "<?php echo $_GET['mensaje']; ?>" });
  <?php } ?>
</script>
<br>
<?php 
include ("../../bd.php"); 

if($_POST){
    $imagen = (isset($_FILES['imagen']['name'])) ? $_FILES['imagen']['name'] : "";
    $usuario=(isset($_POST['usuario']))?$_POST['usuario']:"";
    $correo=(isset($_POST['correo']))?$_POST['correo']:"";
    $pass=(isset($_POST['pass']))?$_POST['pass']:"";

    $fecha_imagen = new DateTime();
    $nombre_archivo_imagen = ($imagen != "") ? $fecha_imagen->getTimestamp() . "_" . $imagen : "";

    $tmp_imagen = $_FILES['imagen']['tmp_name'];
    if ($tmp_imagen != "") {
        move_uploaded_file($tmp_imagen, "../../../assets/img/usuarios/" . $nombre_archivo_imagen);
    }

    $sentencia=$conexion->prepare("INSERT INTO `tb_usuarios` (`ID`, `imagen`, `usuario`, `correo`, `pass`) 
    VALUES (NULL, :imagen, :usuario, :correo, :pass);");

    $sentencia->bindParam(":imagen", $nombre_archivo_imagen);
    $sentencia->bindParam(":usuario",$usuario);
    $sentencia->bindParam(":correo",$correo);
    $sentencia->bindParam(":pass",$pass);
    
    $sentencia->execute();

    $mensaje="Registro agregado con exito.";
    header("location:index.php?mensaje=".$mensaje);
  }

include ("../../templates/header.php"); 
?>

<div class="card">
    <div class="card-header">
        Crear usuarios
    </div>
    <div class="card-body">
   
    <form action="" enctype="multipart/form-data" method="post">

    <div class="mb-3">
       <label for="imagen" class="form-label">Imagen:</label>
       <input type="file" class="form-control" name="imagen" id="imagen" placeholder="imagen" aria-describedby="fileHelpId">
     </div>

        <div class="mb-3">
          <label for="usuario" class="form-label">usuario:</label>
          <input type="text"
            class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="usuario">
        </div>

        <div class="mb-3">
          <label for="correo" class="form-label">correo:</label>
          <input type="text"
            class="form-control" name="correo" id=correo" aria-describedby="helpId" placeholder="correo">
        </div>

        <div class="mb-3">
          <label for="pass" class="form-label">Contraseña:</label>
          <input type="text"
            class="form-control" name="pass" id="pass" aria-describedby="helpId" placeholder="Contraseña">
        </div>

        <button type="submit" class="btn btn-success">Agregar</button>
        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

    </form>

    </div>
    <div class="card-footer text-muted">
    </div>
</div>

<?php include ("../../templates/footer.php"); ?>
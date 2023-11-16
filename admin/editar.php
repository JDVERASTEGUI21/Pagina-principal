<?php 
include ("../../bd.php"); 

if (isset ($_GET['txtID'])){
  $txtID=(isset($_GET['txtID']) )?$_GET['txtID']:"";
    
    $sentencia=$conexion->prepare("SELECT * FROM tb_usuarios WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();

    $usuarios=$sentencia->fetch(PDO::FETCH_LAZY);

    $imagen=$usuarios['imagen'];
    $usuario=$usuarios['usuario'];
    $correo=$usuarios['correo'];
    $pass=$usuarios['pass'];
}

if($_POST){
   
    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
    $usuario=(isset($_POST['usuario']))?$_POST['usuario']:"";
    $correo=(isset($_POST['correo']))?$_POST['correo']:"";
    $pass=(isset($_POST['pass']))?$_POST['pass']:"";

    $sentencia=$conexion->prepare("UPDATE tb_usuarios 
    SET usuario=:usuario, correo=:correo, pass=:pass WHERE id=:id ");

    $sentencia->bindParam(":usuario",$usuario);
    $sentencia->bindParam(":correo",$correo);
    $sentencia->bindParam(":pass",$pass);
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();

    if($_FILES["imagen"]["name"]!=""){
      $imagen=(isset($_FILES['imagen']['name']))?$_FILES['imagen']['name']:"";
      $fecha_imagen=new DateTime();
      $nombre_archivo_imagen=($imagen!="")? $fecha_imagen->getTimestamp()."_".$imagen:"";

      $tmp_imagen=$_FILES['imagen']['tmp_name'];
      move_uploaded_file($tmp_imagen,"../../../assets/img/usuarios/".$nombre_archivo_imagen);

      $sentencia=$conexion->prepare("SELECT imagen FROM tb_usuarios WHERE id=:id");
      $sentencia->bindParam(":id",$txtID);
      $sentencia->execute();
      $usuarios_imagen=$sentencia->fetch(PDO::FETCH_LAZY);

      if(isset($usuarios_imagen["imagen"])){
        if(file_exists("../../../assets/img/usuarios/".$usuarios_imagen["imagen"])){
           unlink("../../../assets/img/usuarios/".$usuarios_imagen["imagen"]);
        } 
      }

     $sentencia = $conexion->prepare("UPDATE tb_usuarios SET imagen=:imagen WHERE id=:id");
     $sentencia->bindParam(":imagen", $nombre_archivo_imagen);
     $sentencia->bindParam(":id", $txtID);
     $sentencia->execute();
    }
    $mensaje="Registro modificado con exito.";
    header("location:index.php?mensaje=".$mensaje);
}

include ("../../templates/header.php"); ?>

<div class="card">
    <div class="card-header">
        Editanto informacion de servicios.
    </div>
    <div class="card-body">
   
    <form action="" enctype="multipart/form-data" method="post">

    <div class="mb-3">
      <label for="txtID" class="form-label">ID:</label>
      <input readonly value="<?php echo $txtID;?>" type="text"
        class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">
    </div>

    <div class="mb-3">
       <label for="imagen" class="form-label">Imagen:</label>
       <img width="80" src="../../../assets/img/usuarios/<?php echo $imagen;?>"/>
       <input type="file" class="form-control" name="imagen" id="imagen" placeholder="imagen" aria-describedby="fileHelpId">
     </div>

        <div class="mb-3">
          <label for="usuario" class="form-label">usuario:</label>
          <input value="<?php echo $usuario;?>" type="text"
            class="form-control" name="usuario" id="usuario" aria-describedby="helpId" placeholder="usuario">
        </div>

        <div class="mb-3">
          <label for="correo" class="form-label">correo:</label>
          <input value="<?php echo $correo;?>"type="text"
            class="form-control" name="correo" id=correo" aria-describedby="helpId" placeholder="correo">
        </div>

        <div class="mb-3">
          <label for="pass" class="form-label">Contraseña:</label>
          <input value="<?php echo $pass;?>"type="text"
            class="form-control" name="pass" id="pass" aria-describedby="helpId" placeholder="Contraseña">
        </div>

        <button type="submit" class="btn btn-success">Actualizar</button>
        |
        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

    </form>

    </div>
    <div class="card-footer text-muted">
       
    </div>
</div>

<?php include ("../../templates/footer.php"); ?>
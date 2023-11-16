<?php 
include ("../../bd.php"); 

if($_POST){
    $Nombre=(isset($_POST['Nombre']))?$_POST['Nombre']:"";
    $valor=(isset($_POST['valor']))?$_POST['valor']:"";

    $sentencia=$conexion->prepare("INSERT INTO `tb_configuraciones` (`ID`, `Nombre`, `valor`) 
    VALUES (NULL, :Nombre, :valor);");

    $sentencia->bindParam(":Nombre",$Nombre);
    $sentencia->bindParam(":valor",$valor);
    
    $sentencia->execute();

    $mensaje="Registro agregado con exito.";
    header("location:index.php?mensaje=".$mensaje);
  }

include ("../../templates/header.php"); 
?>

<div class="card">
    <div class="card-header">
       CONFIGURACION
    </div>
    <div class="card-body">
   
    <form action="" enctype="multipart/form-data" method="post">
        <div class="mb-3">
          <label for="Nombre" class="form-label">Nombre:</label>
          <input type="text"
            class="form-control" name="Nombre" id="Nombre" aria-describedby="helpId" placeholder="Nombre">
        </div>

        <div class="mb-3">
          <label for="valor" class="form-label">Valor:</label>
          <input type="text"
            class="form-control" name="valor" id=valor" aria-describedby="helpId" placeholder="Valor">
        </div>

        <button type="submit" class="btn btn-success">Agregar</button>
        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

    </form>

    </div>
    <div class="card-footer text-muted">
       
    </div>
</div>

<?php include ("../../templates/footer.php"); ?>
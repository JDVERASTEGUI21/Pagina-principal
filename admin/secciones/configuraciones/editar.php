<?php 
include ("../../bd.php"); 

if (isset ($_GET['txtID'])){
  $txtID=(isset($_GET['txtID']) )?$_GET['txtID']:"";
    
    $sentencia=$conexion->prepare("SELECT * FROM tb_configuraciones WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();

    $registro=$sentencia->fetch(PDO::FETCH_LAZY);

    $Nombre=$registro['Nombre'];
    $valor=$registro['valor'];
}

if($_POST){
   
    $Nombre=(isset($_POST['txtID']))?$_POST['txtID']:"";
    $Nombre=(isset($_POST['Nombre']))?$_POST['Nombre']:"";
    $valor=(isset($_POST['valor']))?$_POST['valor']:"";

    $sentencia=$conexion->prepare("UPDATE tb_configuraciones 
    SET Nombre=:Nombre, valor=:valor WHERE id=:id ");

    $sentencia->bindParam(":Nombre",$Nombre);
    $sentencia->bindParam(":valor",$valor);
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();

    $mensaje="Registro modificado con exito.";
    header("location:index.php?mensaje=".$mensaje);
}

include ("../../templates/header.php"); ?>

<div class="card">
    <div class="card-header">
        Editanto Configuracion.
    </div>
    <div class="card-body">
   
    <form action="" enctype="multipart/form-data" method="post">

    <div class="mb-3">
      <label for="txtID" class="form-label">ID:</label>
      <input readonly value="<?php echo $txtID;?>" type="text"
        class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="ID">
    </div>

    
        <div class="mb-3">
          <label for="Nombre" class="form-label">Nombre:</label>
          <input value="<?php echo $Nombre;?>" type="text"
            class="form-control" name="Nombre" id="Nombre" aria-describedby="helpId" placeholder="Nombre">
        </div>

        <div class="mb-3">
          <label for="valor" class="form-label">valor:</label>
          <input value="<?php echo $valor;?>"type="text"
            class="form-control" name="valor" id=valor" aria-describedby="helpId" placeholder="valor">
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
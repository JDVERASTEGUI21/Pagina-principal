<?php 

include ("../../bd.php"); 

if (isset ($_GET['txtID'])){
  $txtID=(isset($_GET['txtID']) )?$_GET['txtID']:"";
    
    $sentencia=$conexion->prepare("SELECT * FROM tb_estudiantes WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();

    $estudiantes=$sentencia->fetch(PDO::FETCH_LAZY);

    $Nombre=$estudiantes['Nombre'];
    $Programa=$estudiantes['Programa'];
    $Semestre=$estudiantes['Semestre'];
    $Sexo=$estudiantes['Sexo'];
    $Descripcion=$estudiantes['Descripcion'];
    $Imagen=$estudiantes['Imagen'];
    $Estado=$estudiantes['Estado'];
}

if($_POST){
   
    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
    $Nombre=(isset($_POST['Nombre']))?$_POST['Nombre']:"";
    $Programa=(isset($_POST['Programa']))?$_POST['Programa']:"";
    $Semestre=(isset($_POST['Semestre']))?$_POST['Semestre']:"";
    $Sexo=(isset($_POST['Sexo']))?$_POST['Sexo']:"";
    $Descripcion=(isset($_POST['Descripcion']))?$_POST['Descripcion']:"";
    $Estado=(isset($_POST['Estado']))?$_POST['Estado']:"";

    $sentencia=$conexion->prepare("UPDATE tb_estudiantes
    SET Nombre=:Nombre, Programa=:Programa, Semestre=:Semestre, Sexo=:Sexo, Descripcion=:Descripcion, Estado=:Estado WHERE id=:id ");

    $sentencia->bindParam(":Nombre",$Nombre);
    $sentencia->bindParam(":Programa",$Programa);
    $sentencia->bindParam(":Semestre",$Semestre);
    $sentencia->bindParam(":Sexo",$Sexo);
    $sentencia->bindParam(":Descripcion",$Descripcion);
    $sentencia->bindParam(":id",$txtID);
    $sentencia->bindParam(":Estado",$Estado);
    $sentencia->execute();

    if($_FILES["Imagen"]["name"]!=""){
        $Imagen=(isset($_FILES['Imagen']['name']))?$_FILES['Imagen']['name']:"";
        $fecha_Imagen=new DateTime();
        $Nombre_archivo_Imagen=($Imagen!="")? $fecha_Imagen->getTimestamp()."_".$Imagen:"";
  
        $tmp_Imagen=$_FILES['Imagen']['tmp_name'];
        move_uploaded_file($tmp_Imagen,"../../../assets/img/Estudiantes/".$Nombre_archivo_Imagen);
  
        $sentencia=$conexion->prepare("SELECT Imagen FROM tb_estudiantes WHERE id=:id");
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
        $estudiantes_Imagen=$sentencia->fetch(PDO::FETCH_LAZY);
  
        if(isset($estudiantes_Imagen["Imagen"])){
          if(file_exists("../../../assets/img/Estudiantes/".$estudiantes_Imagen["Imagen"])){
             unlink("../../../assets/img/Estudiantes/".$estudiantes_Imagen["Imagen"]);
          } 
        }
  
       $sentencia = $conexion->prepare("UPDATE tb_estudiantes SET Imagen=:Imagen WHERE id=:id");
       $sentencia->bindParam(":Imagen", $Nombre_archivo_Imagen);
       $sentencia->bindParam(":id", $txtID);
       $sentencia->execute();
      }
      $mensaje="Registro modificado con exito.";
      header("location:index.php?mensaje=".$mensaje);
  }

include ("../../templates/header.php"); 
?>

<div class="card">
    <div class="card-header">
        EDITAR estudiantes
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
      <input type="text" value="<?php echo $Nombre;?>"
      class="form-control" name="Nombre" id="Nombre" aria-describedby="helpId" placeholder="Nombre">
     </div>

     <div class="mb-3">
       <label for="Programa" class="form-label">Programa:</label>
       <input type="text" value="<?php echo $Programa;?>"
         class="form-control" name="Programa" id="Programa" aria-describedby="helpId" placeholder="Programa">
     </div>

     <div class="mb-3">
       <label for="Semestre" class="form-label">Semestre:</label>
       <input type="text" value="<?php echo $Semestre;?>"
         class="form-control" name="Semestre" id="Semestre" aria-describedby="helpId" placeholder="Semestre">
     </div>

     <div class="mb-3">
       <label for="Sexo" class="form-label">Sexo:</label>
       <input type="text" value="<?php echo $Sexo;?>"
         class="form-control" name="Sexo" id="Sexo" aria-describedby="helpId" placeholder="Sexo">
     </div>

     <div class="mb-3">
       <label for="Descripcion" class="form-label">Descripcion:</label>
       <input type="text" value="<?php echo $Descripcion;?>"
         class="form-control" name="Descripcion" id="Descripcion" aria-describedby="helpId" placeholder="Descripcion">
     </div>

     <div class="mb-3">
       <label for="Imagen" class="form-label">Imagen:</label>
       <img width="80" src="../../../assets/img/Estudiantes/<?php echo $Imagen;?>"/>
       <input type="file" class="form-control" name="Imagen" id="Imagen" placeholder="Imagen" aria-describedby="fileHelpId">
     </div>

     <div class="mb-3">
      <label for="Estado" class="form-label">Estado:</label>
      <input type="text" value="<?php echo $Estado;?>"
      class="form-control" name="Estado" id="Estado" aria-describedby="helpId" placeholder="Estado">
     </div>

     <button type="submit" class="btn btn-success">Actualizar</button>
     |
        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

    </form>
 </div>
    </div>
</div>

<?php include ("../../templates/footer.php"); ?>
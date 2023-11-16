<?php 

include ("../../bd.php"); 

if (isset ($_GET['txtID'])){
  $txtID=(isset($_GET['txtID']) )?$_GET['txtID']:"";
    
    $sentencia=$conexion->prepare("SELECT * FROM tb_equipo WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();

    $equipo=$sentencia->fetch(PDO::FETCH_LAZY);

    $imagen=$equipo['imagen'];
    $nombre=$equipo['nombre'];
    $puesto=$equipo['puesto'];
    $twitter=$equipo['twitter'];
    $facebook=$equipo['facebook'];
    $linkedin=$equipo['linkedin'];
}

if($_POST){
   
    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
    $nombre=(isset($_POST['nombre']))?$_POST['nombre']:"";
    $puesto=(isset($_POST['puesto']))?$_POST['puesto']:"";
    $twitter=(isset($_POST['twitter']))?$_POST['twitter']:"";
    $facebook=(isset($_POST['facebook']))?$_POST['facebook']:"";
    $linkedin=(isset($_POST['linkedin']))?$_POST['linkedin']:"";

    $sentencia=$conexion->prepare("UPDATE tb_equipo
    SET nombre=:nombre, puesto=:puesto, twitter=:twitter, facebook=:facebook, linkedin=:linkedin WHERE id=:id ");

    $sentencia->bindParam(":nombre",$nombre);
    $sentencia->bindParam(":puesto",$puesto);
    $sentencia->bindParam(":twitter",$twitter);
    $sentencia->bindParam(":facebook",$facebook);
    $sentencia->bindParam(":linkedin",$linkedin);
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();

    if($_FILES["imagen"]["name"]!=""){
        $imagen=(isset($_FILES['imagen']['name']))?$_FILES['imagen']['name']:"";
        $fecha_imagen=new DateTime();
        $nombre_archivo_imagen=($imagen!="")? $fecha_imagen->getTimestamp()."_".$imagen:"";
  
        $tmp_imagen=$_FILES['imagen']['tmp_name'];
        move_uploaded_file($tmp_imagen,"../../../assets/img/Profesores/".$nombre_archivo_imagen);
  
        $sentencia=$conexion->prepare("SELECT imagen FROM tb_equipo WHERE id=:id");
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
        $equipo_imagen=$sentencia->fetch(PDO::FETCH_LAZY);
  
        if(isset($equipo_imagen["imagen"])){
          if(file_exists("../../../assets/img/Profesores/".$equipo_imagen["imagen"])){
             unlink("../../../assets/img/Profesores/".$equipo_imagen["imagen"]);
          } 
        }
  
       $sentencia = $conexion->prepare("UPDATE tb_equipo SET imagen=:imagen WHERE id=:id");
       $sentencia->bindParam(":imagen", $nombre_archivo_imagen);
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
        EDITAR EQUIPO
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
       <img width="80" src="../../../assets/img/Profesores/<?php echo $imagen;?>"/>
       <input type="file" class="form-control" name="imagen" id="imagen" placeholder="imagen" aria-describedby="fileHelpId">
     </div>

     <div class="mb-3">
      <label for="nombre" class="form-label">Nombre:</label>
      <input type="text" value="<?php echo $nombre;?>"
      class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="nombre">
     </div>

     <div class="mb-3">
       <label for="puesto" class="form-label">Puesto:</label>
       <input type="text" value="<?php echo $puesto;?>"
         class="form-control" name="puesto" id="puesto" aria-describedby="helpId" placeholder="puesto">
     </div>

     <div class="mb-3">
       <label for="twitter" class="form-label">Twitter:</label>
       <input type="text" value="<?php echo $twitter;?>"
         class="form-control" name="twitter" id="twitter" aria-describedby="helpId" placeholder="twitter">
     </div>

     <div class="mb-3">
       <label for="facebook" class="form-label">Facebook:</label>
       <input type="text" value="<?php echo $facebook;?>"
         class="form-control" name="facebook" id="facebook" aria-describedby="helpId" placeholder="facebook">
     </div>

     <div class="mb-3">
       <label for="linkedin" class="form-label">Linkedin:</label>
       <input type="text" value="<?php echo $linkedin;?>"
         class="form-control" name="linkedin" id="linkedin" aria-describedby="helpId" placeholder="linkedin">
     </div>

     <button type="submit" class="btn btn-success">Actualizar</button>
     |
        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

    </form>
 </div>
    </div>
</div>

<?php include ("../../templates/footer.php"); ?>
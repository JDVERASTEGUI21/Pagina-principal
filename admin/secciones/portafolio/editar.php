<?php 
include ("../../bd.php");

if (isset ($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']) )?$_GET['txtID']:"";
      
      $sentencia=$conexion->prepare("SELECT * FROM tb_portafolio WHERE id=:id");
      $sentencia->bindParam(":id",$txtID);
      $sentencia->execute();
  
      $portafolio=$sentencia->fetch(PDO::FETCH_LAZY);
  
      $titulo=$portafolio['titulo'];
      $subtitulo=$portafolio['subtitulo'];
      $imagen=$portafolio['imagen'];
      $descripcion=$portafolio['descripcion'];
      $cliente=$portafolio['cliente'];
      $categoria=$portafolio['categoria'];
      $url=$portafolio['url'];

  }

  if($_POST){
    
    $txtID=(isset($_POST['txtID']))?$_POST['txtID']:"";
    $titulo=(isset($_POST['titulo']))?$_POST['titulo']:"";
    $subtitulo=(isset($_POST['subtitulo']))?$_POST['subtitulo']:"";
    $descripcion=(isset($_POST['descripcion']))?$_POST['descripcion']:"";
    $cliente=(isset($_POST['cliente']))?$_POST['cliente']:"";
    $categoria=(isset($_POST['categoria']))?$_POST['categoria']:"";
    $url=(isset($_POST['url']))?$_POST['url']:"";

    $sentencia = $conexion->prepare("UPDATE tb_portafolio
    SET 
    titulo=:titulo, 
    subtitulo=:subtitulo, 
    descripcion=:descripcion, 
    cliente=:cliente, 
    categoria=:categoria, 
    url=:url 
    WHERE id=:id");

    $sentencia->bindParam(":titulo", $titulo);
    $sentencia->bindParam(":subtitulo", $subtitulo);
    $sentencia->bindParam(":descripcion", $descripcion);

    $sentencia->bindParam(":cliente", $cliente);
    $sentencia->bindParam(":categoria", $categoria);
    $sentencia->bindParam(":url", $url);

    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();

    
    if($_FILES["imagen"]["name"]!=""){
      $imagen=(isset($_FILES['imagen']['name']))?$_FILES['imagen']['name']:"";
      $fecha_imagen=new DateTime();
      $nombre_archivo_imagen=($imagen!="")? $fecha_imagen->getTimestamp()."_".$imagen:"";

      $tmp_imagen=$_FILES['imagen']['tmp_name'];
      move_uploaded_file($tmp_imagen,"../../../assets/img/portfolio/".$nombre_archivo_imagen);

      $sentencia=$conexion->prepare("SELECT imagen FROM tb_portafolio WHERE id=:id");
      $sentencia->bindParam(":id",$txtID);
      $sentencia->execute();
      $portafolio_imagen=$sentencia->fetch(PDO::FETCH_LAZY);

      if(isset($portafolio_imagen["imagen"])){
        if(file_exists("../../../assets/img/portfolio/".$portafolio_imagen["imagen"])){
           unlink("../../../assets/img/portfolio/".$portafolio_imagen["imagen"]);
        } 
      }

     $sentencia = $conexion->prepare("UPDATE tb_portafolio SET imagen=:imagen WHERE id=:id");
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
        Producto del portafolio
    </div>
    <div class="card-body">
    <form action="" enctype="multipart/form-data" method="post">

     <div class="mb-3">
       <label for="txtID" class="form-label">ID:</label>
       <input readonly value="<?php echo $txtID;?>" type="text"
         class="form-control" name="txtID" id="txtID" aria-describedby="helpId" placeholder="txtID">
     </div>
     
     <div class="mb-3">
      <label for="titulo" class="form-label">Titulo:</label>
      <input type="text"
      class="form-control" value="<?php echo $titulo;?>" name="titulo" id="titulo" aria-describedby="helpId" placeholder="titulo">
     </div>

     <div class="mb-3">
       <label for="subtitulo" class="form-label">Subtitulo:</label>
       <input type="text"
         class="form-control" value="<?php echo $subtitulo;?>" name="subtitulo" id="subtitulo" aria-describedby="helpId" placeholder="subtitulo">
     </div>

     <div class="mb-3">
       <label for="imagen" class="form-label">Imagen:</label>
       <img width="80" src="../../../assets/img/portfolio/<?php echo $imagen;?>"/>
       <input type="file" class="form-control" name="imagen" id="imagen" placeholder="imagen" aria-describedby="fileHelpId">
     </div>

     <div class="mb-3">
       <label for="descripcion" class="form-label">Descripcion:</label>
       <input type="text"
         class="form-control" value="<?php echo $descripcion;?>" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="descripcion">
     </div>

     <div class="mb-3">
       <label for="cliente" class="form-label">Cliente:</label>
       <input type="text"
         class="form-control" value="<?php echo $cliente;?>" name="cliente" id="cliente" aria-describedby="helpId" placeholder="cliente">
     </div>

     <div class="mb-3">
       <label for="categoria" class="form-label">Categoria:</label>
       <input type="text"
         class="form-control" value="<?php echo $categoria;?>" name="categoria" id="categoria" aria-describedby="helpId" placeholder="categoria">
     </div>

     <div class="mb-3">
       <label for="url" class="form-label">URL:</label>
       <input type="text"
         class="form-control" value="<?php echo $url;?>" name="url" id="url" aria-describedby="helpId" placeholder="url del proyecto">
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
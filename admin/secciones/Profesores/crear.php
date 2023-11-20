<?php 
include ("../../bd.php");

if ($_POST) {

    $imagen = (isset($_FILES['imagen']['name'])) ? $_FILES['imagen']['name'] : "";
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : "";
    $puesto = (isset($_POST['puesto'])) ? $_POST['puesto'] : "";
    $twitter = (isset($_POST['twitter'])) ? $_POST['twitter'] : "";
    $facebook = (isset($_POST['facebook'])) ? $_POST['facebook'] : "";
    $linkedin = (isset($_POST['linkedin'])) ? $_POST['linkedin'] : "";

    $fecha_imagen = new DateTime();
    $nombre_archivo_imagen = ($imagen != "") ? $fecha_imagen->getTimestamp() . "_" . $imagen : "";

    $tmp_imagen = $_FILES['imagen']['tmp_name'];
    if ($tmp_imagen != "") {
        move_uploaded_file($tmp_imagen, "../../../assets/img/Profesores/" . $nombre_archivo_imagen);
    }

    $sentencia = $conexion->prepare("INSERT INTO `tb_equipo` (`ID`, `imagen`, `nombre`, `puesto`, `twitter`, `facebook`, `linkedin`) 
    VALUES (NULL, :imagen, :nombre, :puesto, :twitter, :facebook, :linkedin)");

    $sentencia->bindParam(":imagen", $nombre_archivo_imagen);
    $sentencia->bindParam(":nombre", $nombre);
    $sentencia->bindParam(":puesto", $puesto);
    $sentencia->bindParam(":twitter", $twitter);
    $sentencia->bindParam(":facebook", $facebook);
    $sentencia->bindParam(":linkedin", $linkedin);

    $sentencia->execute();

    $mensaje = "Registro agregado con éxito.";
    header("location: index.php?mensaje=" . $mensaje);
}


include ("../../templates/header.php"); 

?>
<div class="card">
    <div class="card-header">
        Crear Equipo
    </div>
    <div class="card-body">
    <form action="" enctype="multipart/form-data" method="post">
     
     <div class="mb-3">
       <label for="imagen" class="form-label">Imagen:</label>
       <input type="file" class="form-control" name="imagen" id="imagen" placeholder="imagen" aria-describedby="fileHelpId">
     </div>

     <div class="mb-3">
      <label for="nombre" class="form-label">Nombre:</label>
      <input type="text"
      class="form-control" name="nombre" id="nombre" aria-describedby="helpId" placeholder="nombre">
     </div>

     <div class="mb-3">
       <label for="puesto" class="form-label">Puesto:</label>
       <input type="text"
         class="form-control" name="puesto" id="puesto" aria-describedby="helpId" placeholder="puesto">
     </div>

     <div class="mb-3">
       <label for="twitter" class="form-label">Twitter:</label>
       <input type="text"
         class="form-control" name="twitter" id="twitter" aria-describedby="helpId" placeholder="twitter">
     </div>

     <div class="mb-3">
       <label for="facebook" class="form-label">Facebook:</label>
       <input type="text"
         class="form-control" name="facebook" id="facebook" aria-describedby="helpId" placeholder="facebook">
     </div>

     <div class="mb-3">
       <label for="linkedin" class="form-label">Linkedin:</label>
       <input type="text"
         class="form-control" name="linkedin" id="linkedin" aria-describedby="helpId" placeholder="linkedin">
     </div>

     <button type="submit" class="btn btn-success">Agregar</button>
        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

    </form>
 </div>
 <div class="card-footer text-muted">
    </div>
</div>

<?php include ("../../templates/footer.php"); ?>
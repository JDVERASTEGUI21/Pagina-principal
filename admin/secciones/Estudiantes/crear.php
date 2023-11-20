<?php 
include ("../../bd.php");

if ($_POST) {

    $Imagen = (isset($_FILES['Imagen']['name'])) ? $_FILES['Imagen']['name'] : "";
    $Nombre = (isset($_POST['Nombre'])) ? $_POST['Nombre'] : "";
    $Programa = (isset($_POST['Programa'])) ? $_POST['Programa'] : "";
    $Semestre = (isset($_POST['Semestre'])) ? $_POST['Semestre'] : "";
    $Sexo = (isset($_POST['Sexo'])) ? $_POST['Sexo'] : "";
    $Descripcion = (isset($_POST['Descripcion'])) ? $_POST['Descripcion'] : "";
    $Estado = (isset($_POST['Estado'])) ? $_POST['Estado'] : "";

    $fecha_Imagen = new DateTime();
    $Nombre_archivo_Imagen = ($Imagen != "") ? $fecha_Imagen->getTimestamp() . "_" . $Imagen : "";

    $tmp_Imagen = $_FILES['Imagen']['tmp_name'];
    if ($tmp_Imagen != "") {
        move_uploaded_file($tmp_Imagen, "../../../assets/img/Estudiantes/" . $Nombre_archivo_Imagen);
    }

    $sentencia = $conexion->prepare("INSERT INTO `tb_estudiantes` (`ID`, `Imagen`, `Nombre`, `Programa`, `Semestre`, `Sexo`, `Descripcion`, `Estado`) 
    VALUES (NULL, :Imagen, :Nombre, :Programa, :Semestre, :Sexo, :Descripcion, :Estado)");

    $sentencia->bindParam(":Imagen", $Nombre_archivo_Imagen);
    $sentencia->bindParam(":Nombre", $Nombre);
    $sentencia->bindParam(":Programa", $Programa);
    $sentencia->bindParam(":Semestre", $Semestre);
    $sentencia->bindParam(":Sexo", $Sexo);
    $sentencia->bindParam(":Descripcion", $Descripcion);
    $sentencia->bindParam(":Estado", $Estado);

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
      <label for="Nombre" class="form-label">Nombre:</label>
      <input type="text"
      class="form-control" name="Nombre" id="Nombre" aria-describedby="helpId" placeholder="Nombre">
     </div>

     <div class="mb-3">
       <label for="Programa" class="form-label">Programa:</label>
       <input type="text"
         class="form-control" name="Programa" id="Programa" aria-describedby="helpId" placeholder="Programa">
     </div>

     <div class="mb-3">
       <label for="Semestre" class="form-label">Semestre:</label>
       <input type="text"
         class="form-control" name="Semestre" id="Semestre" aria-describedby="helpId" placeholder="Semestre">
     </div>

     <div class="mb-3">
       <label for="Sexo" class="form-label">Sexo:</label>
       <input type="text"
         class="form-control" name="Sexo" id="Sexo" aria-describedby="helpId" placeholder="Sexo">
     </div>

     <div class="mb-3">
       <label for="Descripcion" class="form-label">Descripcion:</label>
       <input type="text"
         class="form-control" name="Descripcion" id="Descripcion" aria-describedby="helpId" placeholder="Descripcion">
     </div>

     <div class="mb-3">
       <label for="Imagen" class="form-label">Imagen:</label>
       <input type="file" class="form-control" name="Imagen" id="Imagen" placeholder="Imagen" aria-describedby="fileHelpId">
     </div>

     <div class="mb-3">
      <label for="Estado" class="form-label">Estado:</label>
      <input type="text"
      class="form-control" name="Estado" id="Estado" aria-describedby="helpId" placeholder="Estado">
     </div>

     <button type="submit" class="btn btn-success">Agregar</button>
        <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

    </form>
 </div>
 <div class="card-footer text-muted">
    </div>
</div>

<?php include ("../../templates/footer.php"); ?>
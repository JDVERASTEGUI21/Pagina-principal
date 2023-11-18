<?php 
 include ("../../bd.php");

 if (isset ($_GET['txtID'])){
  $txtID=(isset($_GET['txtID']) )?$_GET['txtID']:"";

  $sentencia=$conexion->prepare("SELECT Imagen FROM tb_estudiantes WHERE id=:id");
  $sentencia->bindParam(":id",$txtID);
  $sentencia->execute();
  $registro_Imagen=$sentencia->fetch(PDO::FETCH_LAZY);

  if(isset($registro_Imagen["Imagen"])){
      if(file_exists("../../../assets/img/Estudiantes/".$registro_Imagen["Imagen"])){
         unlink("../../../assets/img/Estudiantes/".$registro_Imagen["Imagen"]);
      } 
  }

  $sentencia=$conexion->prepare("DELETE FROM tb_estudiantes WHERE id=:id");
  $sentencia->bindParam(":id",$txtID);
  $sentencia->execute();
  $mensaje="Registro eliminado con exito.";
    header("location:index.php?mensaje=".$mensaje);
 }

 $sentencia=$conexion->prepare("SELECT * FROM `tb_estudiantes`");
 $sentencia->execute();
 $lista_estudiantes=$sentencia->fetchAll(PDO::FETCH_ASSOC);

 include ("../../templates/header.php"); 
?>
  
  <div class="card">
    <div class="card-header">
     <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registro</a>
     <button type="button" id="insertarExcel" href="prueva.php" class="btn btn-outline-success">Cargar plantilla</button>

    </div>
    <div class="card-body">

     <div class="table-responsive-sm">
     <table id="tablas" class="table table-striped" style="width: 100%">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Programa</th>
                    <th scope="col">Semestre</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Descripcion</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Estado</th>
                    <th scope="col">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lista_estudiantes as $estudiantes){?>
                  <tr class="">
                    <td scope="col"><?php echo $estudiantes['ID'];?></td>
                    <td scope="col"><?php echo $estudiantes['Nombre'];?></td>
                    <td scope="col"><?php echo $estudiantes['Programa'];?></td>
                    <td scope="col"><?php echo $estudiantes['Semestre'];?></td>
                    <td scope="col"><?php echo $estudiantes['Sexo'];?></td>
                    <td scope="col"><?php echo $estudiantes['Descripcion'];?></td>
                    <td scope="col">
                        <img width="60" src="../../../assets/img/Estudiantes/<?php echo $estudiantes['Imagen']; ?>"/>
                    </td>
                    
                    <!-- Dentro de la etiqueta <tbody>, reemplaza el <td> existente para 'Estado' con el siguiente código: -->
                    <td scope="col" id="estado_<?php echo $estudiantes['ID']; ?>">
    <?php if ($estudiantes['Estado'] == 1): ?>
        <button class="btn btn-success" onclick="cambiarEstado(<?php echo $estudiantes['ID']; ?>, 0)">Activo</button>
    <?php else: ?>
        <button class="btn btn-danger" onclick="cambiarEstado(<?php echo $estudiantes['ID']; ?>, 1)">Inactivo</button>
    <?php endif; ?>
</td>


<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function cambiarEstado(txtID, nuevoEstado) {
        if (confirm('¿Seguro que desea cambiar el estado?')) {
            $.ajax({
                type: 'POST',
                url: 'index.php',
                data: { txtID: txtID, nuevoEstado: nuevoEstado },
                success: function(response) {
                    // Actualizar el texto y estilo del botón después de la actualización exitosa
                    $('#estado_' + txtID);
                    // Considera actualizar solo la parte necesaria en lugar de recargar toda la página
                    location.reload();
                },
                error: function(xhr, status, error) {
                    console.error('Error al cambiar el estado:', status, error);
                    alert('Error al cambiar el estado');
                }
                
            });
        }
    }
</script>

<?php

if (isset($_POST['txtID']) && isset($_POST['nuevoEstado'])) {
    $txtID = $_POST['txtID'];
    $nuevoEstado = $_POST['nuevoEstado'];

    // Verifica si $conexion está definida antes de usarla
    if (isset($conexion)) {
        try {
            // Actualizar el Estado en la base de datos
            $sentencia = $conexion->prepare("UPDATE tb_estudiantes SET Estado = :nuevoEstado WHERE id = :id");
            $sentencia->bindParam(":nuevoEstado", $nuevoEstado, PDO::PARAM_INT); // Asegúrate de que $nuevoEstado sea un entero
            $sentencia->bindParam(":id", $txtID, PDO::PARAM_INT); // Asegúrate de que $txtID sea un entero
            $sentencia->execute();

            // Devolver el nuevo botón actualizado
            echo ($nuevoEstado == 1) ? '<button class="btn btn-success" onclick="cambiarEstado('.$txtID.', 0)">Activo</button>' : '<button class="btn btn-danger" onclick="cambiarEstado('.$txtID.', 1)">Inactivo</button>';
        } catch (PDOException $e) {
            // Manejar errores de la base de datos
            echo "Error de la base de datos: " . $e->getMessage();
        }
    } else {
        echo "No se ha establecido la conexión a la base de datos.";
    }
} else {
    echo "Parámetros inválidos";
}
?>


                    <td>
                     <a class="btn btn-sm btn-primary" href="editar.php?txtID=<?php echo $estudiantes['ID']; ?>">
                      <i class="fa-solid fa-pencil"></i>
                     </a>

                     <a class="btn btn-sm btn-danger" href="index.php?txtID=<?php echo $estudiantes['ID']; ?>">
                      <i class="fa-solid fa-trash-can"></i>
                     </a>
                    </td>
                    
                  </tr>
                <?php }?>
                </tbody>
        </table>
      </div>
    </div>
    </div>


<?php include ("../../templates/footer.php"); ?>
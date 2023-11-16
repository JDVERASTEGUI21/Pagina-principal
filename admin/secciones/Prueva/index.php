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
<style>
    .overlay {
  display: none;
  position: fixed; /* Posición fija en relación con la ventana del navegador */
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(0, 0, 0, 0.7);
  z-index: 999; /* Un valor alto para estar por encima de todo */
}

/* Estilo para el popup */
.popup {
  display: none;
  position: fixed; /* Posición fija en relación con la ventana del navegador */
  background: white;
  width: 60%;
  max-width: 600px;
  height: 300px;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  padding: 20px;
  border-radius: 5px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
  overflow: auto;
  z-index: 1000; /* Un valor aún más alto para estar por encima del overlay y de todo */
}
        .close-button {
            background: red;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            position: absolute;
            bottom: 10px;
            right: 10px;
        }
    </style>


  <div class="card">
    <div class="card-header">
     <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registro</a>
     

     <button id="openPopup" class="btn btn-outline-success">Insertar Excel</button>

    <div class="overlay" id="overlay"></div>
    <div class="popup" id="popup">
        <h2>Insertar Archivo Excel</h2>
        <input type="file" id="fileInput" accept=".xlsx">
        <button id="closePopup" class="close-button">Cerrar</button>
    </div>


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
                    <td scope="col"><?php echo $estudiantes['Estado'];?></td>
                    
                    <td>
                        <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $estudiantes['ID']; ?>" role="button">Editar</a>
                        |
                        <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $estudiantes['ID']; ?>" role="button">Eliminar</a>
                    </td>
                    
                  </tr>
                <?php }?>
                </tbody>
        </table>
    <script>
        document.getElementById("openPopup").addEventListener("click", function() {
    document.getElementById("overlay").style.display = "block";
    document.getElementById("popup").style.display = "block";
});

document.getElementById("closePopup").addEventListener("click", function() {
    document.getElementById("overlay").style.display = "none";
    document.getElementById("popup").style.display = "none";
});
        document.getElementById("fileInput").addEventListener("change", function() {
            const fileInput = document.getElementById("fileInput");
            const file = fileInput.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const data = new Uint8Array(e.target.result);
                    const workbook = XLSX.read(data, { type: 'array' });
                    const worksheet = workbook.Sheets[workbook.SheetNames[0]];
                    const jsonData = XLSX.utils.sheet_to_json(worksheet);

                    // Validación de columnas
                    const expectedColumns = ["ID", "Nombre", "Programa", "Semestre", "Sexo", "Descripción", "Estado"];
                    const actualColumns = Object.keys(jsonData[0]);

                    if (!expectedColumns.every(col => actualColumns.includes(col))) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Los espacios de la tabla no coinciden.'
                        });
                        fileInput.value = "";  // Limpiar el valor del input
                        return;
                    }

                    // Aquí puedes enviar los datos al servidor y actualizar la base de datos
                    // Por ejemplo, puedes utilizar AJAX o Fetch para enviar los datos al servidor

                    // Después de subir el archivo y procesarlo, puedes borrar el valor del input
                    fileInput.value = "";

                    Swal.fire({
                        icon: 'success',
                        title: 'Éxito',
                        text: 'Datos insertados correctamente.'
                    });
                };
                reader.readAsArrayBuffer(file);
            }
        });
    </script>
      </div>
    </div>
    </div>


<?php include ("../../templates/footer.php"); ?>
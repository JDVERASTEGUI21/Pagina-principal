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
      </div>
    </div>
    </div>


<?php include ("../../templates/footer.php"); ?>
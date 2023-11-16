<?php 
 include ("../../bd.php");

 if (isset ($_GET['txtID'])){
  $txtID=(isset($_GET['txtID']) )?$_GET['txtID']:"";

  $sentencia=$conexion->prepare("SELECT imagen FROM tb_equipo WHERE id=:id");
  $sentencia->bindParam(":id",$txtID);
  $sentencia->execute();
  $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);

  if(isset($registro_imagen["imagen"])){
      if(file_exists("../../../assets/img/Profesores/".$registro_imagen["imagen"])){
         unlink("../../../assets/img/Profesores/".$registro_imagen["imagen"]);
      } 
  }

  $sentencia=$conexion->prepare("DELETE FROM tb_equipo WHERE id=:id");
  $sentencia->bindParam(":id",$txtID);
  $sentencia->execute();
  $mensaje="Registro eliminado con exito.";
    header("location:index.php?mensaje=".$mensaje);
 }

 $sentencia=$conexion->prepare("SELECT * FROM `tb_equipo`");
 $sentencia->execute();
 $lista_equipo=$sentencia->fetchAll(PDO::FETCH_ASSOC);

 include ("../../templates/header.php"); 
?>
  
  <div class="card">
    <div class="card-header">
     <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registro</a>

    </div>
    <div class="card-body">

     <div class="table-responsive-sm">
     <table id="tablas" class="table table-striped" style="width: 100%">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Puesto</th>
                    <th scope="col">REDES SOCIALES</th>
                    <th scope="col">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lista_equipo as $equipo){?>
                  <tr class="">
                    <td scope="col"><?php echo $equipo['ID'];?></td>
                    <td scope="col">
                        <img width="60" src="../../../assets/img/Profesores/<?php echo $equipo['imagen']; ?>"/>
                    </td>
                    <td scope="col"><?php echo $equipo['nombre'];?></td>
                    <td scope="col"><?php echo $equipo['puesto'];?></td>
                    <td> <?php echo $equipo['twitter'];?>
                         <br><?php echo $equipo['facebook'];?>
                         <br><?php echo $equipo['linkedin'];?>
                    </td>
                    <td>
                        <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $equipo['ID']; ?>" role="button">Editar</a>
                        |
                        <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $equipo['ID']; ?>" role="button">Eliminar</a>
                    </td>
                    
                  </tr>
                <?php }?>
                </tbody>
        </table>
      </div>
    </div>
    </div>


<?php include ("../../templates/footer.php"); ?>
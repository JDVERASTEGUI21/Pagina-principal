<?php 
include ("../../bd.php");

//borrrando registro
if (isset ($_GET['txtID'])){
  $txtID=(isset($_GET['txtID']) )?$_GET['txtID']:"";

  $sentencia=$conexion->prepare("SELECT imagen FROM tb_entradas WHERE id=:id");
  $sentencia->bindParam(":id",$txtID);
  $sentencia->execute();
  $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);

  if(isset($registro_imagen["imagen"])){
      if(file_exists("../../../assets/img/about/".$registro_imagen["imagen"])){
         unlink("../../../assets/img/about/".$registro_imagen["imagen"]);
      } 
  }

  $sentencia=$conexion->prepare("DELETE FROM tb_entradas WHERE id=:id");
  $sentencia->bindParam(":id",$txtID);
  $sentencia->execute();
  $mensaje="Registro elininado con exito.";
    header("location:index.php?mensaje=".$mensaje);
}

//seleccionar registro
  $sentencia=$conexion->prepare("SELECT * FROM `tb_entradas`");
  $sentencia->execute();
  $lista_entradas=$sentencia->fetchAll(PDO::FETCH_ASSOC);
   
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
                    <th scope="col">FECHA</th>
                    <th scope="col">TITULO</th>
                    <th scope="col">DESCRIPCION</th>
                    <th scope="col">IMAGEN</th>
                    <th scope="col">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
              <?php foreach($lista_entradas as $entradas){?>
                <tr class="">
                    <td><?php echo $entradas['ID'];?></td>
                    <td><?php echo $entradas['fecha'];?></td>
                    <td><?php echo $entradas['titulo'];?></td>
                    <td><?php echo $entradas['descripcion'];?></td>
                    <td><img width="60" src="../../../assets/img/about/<?php echo $entradas['imagen'];?>"/></td>
                    <td>
                     <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $entradas['ID']; ?>" role="button">Editar</a>
                     |
                     <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $entradas['ID']; ?>" role="button">Eliminar</a>
                    
                    </td>
                </tr>
              <?php }?>
               
            </tbody>
        </table>
     </div>
    </div>
  </div>

<?php include ("../../templates/footer.php"); ?>
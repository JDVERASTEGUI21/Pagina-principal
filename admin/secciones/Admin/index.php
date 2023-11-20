<?php 
include ("../../bd.php"); 

    if (isset ($_GET['txtID'])){
        $txtID=(isset($_GET['txtID']) )?$_GET['txtID']:"";
      
        $sentencia=$conexion->prepare("SELECT imagen FROM tb_usuarios WHERE id=:id");
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();
        $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);
      
        if(isset($registro_imagen["imagen"])){
            if(file_exists("../../../assets/img/usuarios/".$registro_imagen["imagen"])){
               unlink("../../../assets/img/usuarios/".$registro_imagen["imagen"]);
            } 
        }

    $sentencia=$conexion->prepare("DELETE FROM tb_usuarios WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $mensaje="Registro eliminado con exito.";
    header("location:index.php?mensaje=".$mensaje);
}

$sentencia=$conexion->prepare("SELECT * FROM `tb_usuarios`");
$sentencia->execute();
$listar_usuarios=$sentencia->fetchAll(PDO::FETCH_ASSOC);

include ("../../templates/header.php"); 
?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agragar registro</a>
        
    </div>
    <div class="card-body">
        
    <div class="table-responsive-sm">
        <table id="tablas" class="table table-striped" style="width: 100%">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Usuario</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Pass</th>
                    <th scope="col">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($listar_usuarios as $usuarios){?>
                <tr class="">
                    <td><?php echo $usuarios['ID'];?></td>
                    <td>
                        <img width="60" src="../../../assets/img/usuarios/<?php echo $usuarios['imagen']; ?>"/>
                    </td>
                    <td><?php echo $usuarios['usuario'];?></td>
                    <td><?php echo $usuarios['correo'];?></td>
                    <td><?php echo str_repeat('*', strlen($usuarios['pass'])); ?></td>

                    <td>
                     <a class="btn btn-sm btn-primary" href="editar.php?txtID=<?php echo $usuarios['ID']; ?>">
                      <i class="fa-solid fa-pencil"></i>
                     </a>

                     <a class="btn btn-sm btn-danger" href="index.php?txtID=<?php echo $usuarios['ID']; ?>">
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
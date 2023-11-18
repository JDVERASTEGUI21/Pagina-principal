<?php 
include ("../../bd.php"); 

if (isset ($_GET['txtID'])){
    echo $_GET['txtID'];

    $txtID=(isset($_GET['txtID']) )?$_GET['txtID']:"";
    $sentencia=$conexion->prepare("DELETE FROM tb_servicios WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $mensaje="Registro elininado con exito.";
    header("location:index.php?mensaje=".$mensaje);
}

$sentencia=$conexion->prepare("SELECT * FROM `tb_servicios`");
$sentencia->execute();
$lista_servicios=$sentencia->fetchAll(PDO::FETCH_ASSOC);

include ("../../templates/header.php"); ?>

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
                    <th scope="col">ICONO</th>
                    <th scope="col">TITULO</th>
                    <th scope="col">DESCRIPCION</th>
                    <th scope="col">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lista_servicios as $registros){?>
                <tr class="">
                    <td><?php echo $registros['ID'];?></td>
                    <td><?php echo $registros['icono'];?></td>
                    <td><?php echo $registros['titulo'];?></td>
                    <td><?php echo $registros['descripcion'];?></td>
                    <td>
                     <a class="btn btn-sm btn-primary" href="editar.php?txtID=<?php echo $registros['ID']; ?>">
                      <i class="fa-solid fa-pencil"></i>
                     </a>

                     <a class="btn btn-sm btn-danger" href="index.php?txtID=<?php echo $registros['ID']; ?>">
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
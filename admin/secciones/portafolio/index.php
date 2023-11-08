<?php 
include ("../../bd.php"); 

if (isset ($_GET['txtID'])){
    $txtID=(isset($_GET['txtID']) )?$_GET['txtID']:"";

    $sentencia=$conexion->prepare("SELECT imagen FROM tb_portafolio WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
    $registro_imagen=$sentencia->fetch(PDO::FETCH_LAZY);

    if(isset($registro_imagen["imagen"])){
        if(file_exists("../../../assets/img/portfolio/".$registro_imagen["imagen"])){
           unlink("../../../assets/img/portfolio/".$registro_imagen["imagen"]);
        } 
    }

    $sentencia=$conexion->prepare("DELETE FROM tb_portafolio WHERE id=:id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();
}

$sentencia=$conexion->prepare("SELECT * FROM `tb_portafolio`");
$sentencia->execute();
$lista_portafolio=$sentencia->fetchAll(PDO::FETCH_ASSOC);

include ("../../templates/header.php"); 
?>

 <div class="card">
    <div class="card-header">
     <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar registro</a>
    </div>
    <div class="card-body">

     <div class="table-responsive-sm">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">TITULO</th>
                    <th scope="col">SUBTITULO</th>
                    <th scope="col">IMAGEN</th>
                    <th scope="col">DESCRIPCION</th>
                    <th scope="col">CLIENTE</th>
                    <th scope="col">CATEGORIA</th>
                    <th scope="col">URL</th>
                    <th scope="col">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lista_portafolio as $portafolio){?>
                  <tr class="">
                    <td scope="col"><?php echo $portafolio['ID'];?></td>
                    <td scope="col"><?php echo $portafolio['titulo'];?></td>
                    <td scope="col"><?php echo $portafolio['subtitulo'];?></td>
                    <td scope="col">
                        <img width="60" src="../../../assets/img/portfolio/<?php echo $portafolio['imagen'];?>"/>
                    </td>
                    <td scope="col"><?php echo $portafolio['descripcion'];?></td>
                    <td scope="col"><?php echo $portafolio['cliente'];?></td>
                    <td scope="col"><?php echo $portafolio['categoria'];?></td>
                    <td scope="col"><?php echo $portafolio['url'];?></td>
                    <td>
                        <a name="" id="" class="btn btn-info" href="editar.php?txtID=<?php echo $portafolio['ID']; ?>" role="button">Editar</a>

                        <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $portafolio['ID']; ?>" role="button">Eliminar</a>
                    </td>
                    
                  </tr>
                <?php }?>
                
            </tbody>
        </table>
     </div>
    
    </div>
    
 </div>

<?php include ("../../templates/footer.php"); ?>
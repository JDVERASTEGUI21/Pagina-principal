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
    $mensaje="Registro eliminado con exito.";
    header("location:index.php?mensaje=".$mensaje);
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
            <table id="tablas" class="table table-striped" style="width: 100%">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>TITULO</th>
                        <th>SUBTITULO</th>
                        <th>IMAGEN</th>
                        <th>DESCRIPCION</th>
                        <th>CLIENTE</th>
                        <th>CATEGORIA</th>
                        <th>URL</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_portafolio as $portafolio) : ?>
                        <tr>
                            <td><?php echo $portafolio['ID']; ?></td>
                            <td><?php echo $portafolio['titulo']; ?></td>
                            <td><?php echo $portafolio['subtitulo']; ?></td>
                            <td>
                                <img width="60" src="../../../assets/img/portfolio/<?php echo $portafolio['imagen']; ?>" alt="Imagen">
                            </td>
                            <td><?php echo $portafolio['descripcion']; ?></td>
                            <td><?php echo $portafolio['cliente']; ?></td>
                            <td><?php echo $portafolio['categoria']; ?></td>
                            <td><?php echo $portafolio['url']; ?></td>
                            <td>
                                <a class="btn btn-sm btn-primary" href="editar.php?txtID=<?php echo $portafolio['ID']; ?>">
                                    <i class="fa-solid fa-pencil"></i>
                                </a>
                                <a class="btn btn-sm btn-danger" href="index.php?txtID=<?php echo $portafolio['ID']; ?>">
                                    <i class="fa-solid fa-trash-can"></i>
                                </a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


<?php include ("../../templates/footer.php"); ?>
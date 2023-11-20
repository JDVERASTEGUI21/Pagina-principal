<?php 
include ("../../bd.php"); 

$sentencia=$conexion->prepare("SELECT * FROM `tb_configuraciones`");
$sentencia->execute();
$lista_configuraciones=$sentencia->fetchAll(PDO::FETCH_ASSOC);

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
                    <th scope="col">Nombre</th>
                    <th scope="col">Valor</th>
                    <th scope="col">ACCIONES</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($lista_configuraciones as $registros){?>
                <tr class="">
                    <td><?php echo $registros['ID'];?></td>
                    <td><?php echo $registros['Nombre'];?></td>
                    <td><?php echo $registros['valor'];?></td>
                    <td>
                     <a class="btn btn-sm btn-primary" href="editar.php?txtID=<?php echo $registros['ID']; ?>">
                      <i class="fa-solid fa-pencil"></i>
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
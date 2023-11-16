<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla de Estudiantes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Tabla de Estudiantes</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Programa</th>
                    <th>Semestre</th>
                    <th>Sexo</th>
                    <th>Descripción</th>
                    <th>Imagen</th>
                    <th>Estado</th>
                </tr>
            </thead>
            <tbody id="studentTable">
                <!-- Los datos se cargarán aquí -->
            </tbody>
        </table>

        <button id="insertarExcel" class="btn btn-primary">Insertar Excel</button>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
        // JavaScript para manejar el botón de "Insertar Excel"
        document.getElementById('insertExcel').addEventListener('click', function () {
            // Lógica para mostrar una vista flotante para cargar el archivo Excel
            // Puedes usar SweetAlert2 o un modal de Bootstrap para esto.
        });
    </script>

    <?php
    // PHP para manejar la carga y procesamiento del archivo Excel
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_FILES['excelFile']) && $_FILES['excelFile']['error'] == 0) {
            require 'PHPExcel/IOFactory.php';

            // Conecta con la base de datos y procesa el archivo Excel
            $conn = new mysqli("localhost", "usuario", "contraseña", "websibe");
            if ($conn->connect_error) {
                die("Error de conexión a la base de datos: " . $conn->connect_error);
            }

            $excelFile = $_FILES['excelFile']['tmp_name'];
            $objPHPExcel = PHPExcel_IOFactory::load($excelFile);
            $worksheet = $objPHPExcel->getActiveSheet();
            $rows = $worksheet->toArray(null, true, true, true);

            // Verifica si los encabezados del archivo coinciden con la tabla
            $expectedHeaders = ['ID', 'Nombre', 'Programa', 'Semestre', 'Sexo', 'Descripción', 'Imagen', 'Estado'];
            $fileHeaders = $rows[1];

            if ($expectedHeaders != $fileHeaders) {
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                echo "<script>Swal.fire('Error', 'Los encabezados del archivo no coinciden con la tabla.', 'error');</script>";
            } else {
                // Procesa y almacena los datos en la base de datos
                // Implementa el código para insertar los datos aquí
                // Cierra la ventana flotante y elimina el archivo cargado
                echo "<script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>";
                echo "<script>Swal.fire('Éxito', 'Datos insertados correctamente.', 'success');</script>";
            }

            // Cierra la conexión a la base de datos
            $conn->close();
        }
    }
    ?>

</body>
</html>

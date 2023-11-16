<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Cambiar Contraseña</title>
    <!-- Agregar enlaces a Bootstrap CSS y otras bibliotecas necesarias -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Otros enlaces a CSS personalizados, si los tienes -->
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card mt-5">
                    <div class="card-body">
                        <h4 class="card-title">Cambiar Contraseña</h4>
                        <form id="form" action="cambiar_contrasena.php" method="post">
                            <?php
                            session_start();
                            if (!isset($_SESSION['pin'])) {
                                // Paso 1: Ingresar Correo
                                echo '
                                <div class="form-group">
                                    <label for="email">Ingrese su correo electrónico:</label>
                                    <input type="email" id="email" name="email" class="form-control" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Enviar PIN</button>
                                <a name="" id="" class="btn btn-danger" href="index.php" role="button">Cancelar</a>
                                ';
                            } else {
                                if ($_POST) {
                                    // Paso 2: Ingresar PIN y Nueva Contraseña
                                    echo '
                                    <div class="form-group">
                                        <label for="pin">Ingrese el PIN recibido por correo:</label>
                                        <input type="text" id="pin" name="pin" class="form-control" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nueva_contrasena">Ingrese la nueva contraseña:</label>
                                        <input type="password" id="nueva_contrasena" name="nueva_contrasena" class="form-control" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Cambiar Contraseña</button>
                                    ';
                                } else {
                                    // Paso 1: Ingresar Correo
                                    echo '
                                    <div class="form-group">
                                        <label for="email">Ingrese su correo electrónico:</label>
                                        <input type="email" id="email" name="email" class="form-control" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Enviar PIN</button>
                                    
                                    ';
                                }
                            }
                            ?>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Agregar enlaces a Bootstrap y otros scripts JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <!-- Otros enlaces a scripts personalizados, si los tienes -->
</body>
</html>

<?php
include("admin/bd.php");

//registro de servicios
$sentencia=$conexion->prepare("SELECT * FROM `tb_servicios`");
$sentencia->execute();
$lista_servicios=$sentencia->fetchAll(PDO::FETCH_ASSOC);

//registro de portafolio
$sentencia=$conexion->prepare("SELECT * FROM `tb_portafolio`");
$sentencia->execute();
$lista_portafolio=$sentencia->fetchAll(PDO::FETCH_ASSOC);

//registro de entradas
$sentencia=$conexion->prepare("SELECT * FROM `tb_entradas`");
$sentencia->execute();
$lista_entradas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

//registro de equipo
$sentencia=$conexion->prepare("SELECT * FROM `tb_equipo`");
$sentencia->execute();
$lista_equipo=$sentencia->fetchAll(PDO::FETCH_ASSOC);

//registro de estudiantes
$sentencia=$conexion->prepare("SELECT * FROM `tb_estudiantes`");
$sentencia->execute();
$lista_estudiantes=$sentencia->fetchAll(PDO::FETCH_ASSOC);

//registro de configuraciones
$sentencia=$conexion->prepare("SELECT * FROM `tb_configuraciones`");
$sentencia->execute();
$lista_configuraciones=$sentencia->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Semillero satelite social</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/LOGO.png" />

     <!-- Font Awesome icons (free version)-->
     <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />

</head>

<body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div id=bara class="container">
                <a class="navbar-brand" href="index.php"><img width="400" src="./assets/img/Logo.png" alt="logo"></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ms-4"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link" href="#services">Servicios</a></li>
                        <li class="nav-item"><a class="nav-link" href="#portfolio">Portafolio</a></li>
                        <li class="nav-item"><a class="nav-link" href="#about">Historia</a></li>
                        <li class="nav-item"><a class="nav-link" href="#team">Lideres</a></li>
                        <li class="nav-item"><a class="nav-link" href="#Estudiantes">Estudiantes</a></li>
                        <li class="nav-item"><a class="nav-link" href="#contact">Contactanos</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead" id="inicio">
            <div class="container">
                <div class="masthead-subheading"><?php echo $lista_configuraciones[0]['valor'];?></div>
                <div class="masthead-heading text-uppercase"><?php echo $lista_configuraciones[1]['valor'];?></div>
                <a class="btn btn-primary btn-xl text-uppercase" href="<?php echo $lista_configuraciones[3]['valor'];?>"><?php echo $lista_configuraciones[2]['valor'];?></a>
            </div>
        </header>
    <!-- Close Header -->

    <style>
        #portafolios {
            font-family: Arial, sans-serif;
            margin: 60px;
        }

        #portafolio {
            display: flex;
            justify-content: space-between; /* Alinea los elementos al extremo derecho e izquierdo */
        }

        #filtro {
            width: 400px;
            margin-right: 20px;
        }

        #documentos {
            flex-grow: 1;
            justify-content: flex-end;
            align-items: center;
        }

        /* Estilos para la lista de documentos */
        #lista-documentos {
            list-style: none;
            padding: 0;
            text-align: center;
        }

        .documento {
            display: flex;
            align-items: center;
            margin-bottom: 20px;
            text-align: left; /* Alineación a la izquierda */
        }

        .documento img {
            max-width: 100px; /* Ajusta el tamaño de la imagen según tus necesidades */
            margin-right: 20px;
            border-radius: 5px; /* Añade bordes redondeados a la imagen */
        }

        .documento h2 {
            margin: 0;
            font-size: 18px;
        }

        .documento p {
            margin: 0;
            font-size: 14px;
        }

        #busqueda {
            width: 40%;
            padding: 5px;
            margin-left: 600px; 
            margin-bottom: 10px;
        }
    </style>

<section id="portafolios">
    <div id="portafolio">
        <!-- Filtro por categorías -->
        <div id="filtro">
            <h2>Categorías</h2>
            <ul>
                <li><a href="#" onclick="filtrarCategoria('ponencias')">Ponencias</a></li>
                <li><a href="#" onclick="filtrarCategoria('articulos')">Artículos</a></li>
                <li><a href="#" onclick="filtrarCategoria('practica')">Práctica Profesional</a></li>
                <li><a href="#" onclick="filtrarCategoria('eventos')">Eventos</a></li>
            </ul>
        </div>

        <!-- Lista de documentos -->
        <div id="documentos">
            <input type="text" id="busqueda" placeholder="Buscar por título" oninput="buscarDocumento()">
            <ul id="lista-documentos">
                <!-- Aquí se cargarán los documentos dinámicamente -->
            </ul>
        </div>
    </div>

    <script>
        // Datos de ejemplo (puedes reemplazarlos con tus propios datos)
        var documentos = [
            { titulo: 'Ponencia 1', categoria: 'ponencias', imagen: 'imagen_ponencia.jpg', descripcion: 'Descripción de la ponencia 1' },
            { titulo: 'Artículo 1', categoria: 'articulos', imagen: 'imagen_articulo.jpg', descripcion: 'Descripción del artículo 1' },
            { titulo: 'Práctica 1', categoria: 'practica', imagen: 'imagen_practica.jpg', descripcion: 'Descripción de la práctica 1' },
            { titulo: 'Evento 1', categoria: 'eventos', imagen: 'imagen_evento.jpg', descripcion: 'Descripción del evento 1' },
            // ... más documentos
        ];

        function mostrarDocumentos(documentosMostrar) {
            var listaDocumentos = document.getElementById('lista-documentos');
            listaDocumentos.innerHTML = ''; // Limpiar la lista

            documentosMostrar.forEach(function (documento) {
                var li = document.createElement('li');
                li.classList.add('documento');

                var imagen = document.createElement('img');
                imagen.src = documento.imagen;
                li.appendChild(imagen);

                var contenido = document.createElement('div');

                var titulo = document.createElement('h3');
                titulo.textContent = documento.titulo;
                contenido.appendChild(titulo);

                var descripcion = document.createElement('p');
                descripcion.textContent = documento.descripcion;
                contenido.appendChild(descripcion);

                li.appendChild(contenido);

                listaDocumentos.appendChild(li);
            });
        }

        function filtrarCategoria(categoria) {
            var documentosFiltrados = documentos.filter(function (documento) {
                return documento.categoria === categoria;
            });

            mostrarDocumentos(documentosFiltrados);
        }

        function buscarDocumento() {
            var listaDocumentos = document.getElementById('lista-documentos');
            var filtro = document.getElementById('busqueda').value.toLowerCase();

            var documentosFiltrados = documentos.filter(function (documento) {
                return documento.titulo.toLowerCase().includes(filtro) || documento.descripcion.toLowerCase().includes(filtro);
            });

            mostrarDocumentos(documentosFiltrados);
        }

        // Cargar todos los documentos al cargar la página
        window.onload = function () {
            mostrarDocumentos(documentos);
        };
    </script>
</section>


   <!-- Contact-->
   <section id="contact" class="bg-dark text-light py-4">
         <div class="container">
          <div class="row">
           <div class="col-6">
            <h2 class="h2 text-success border-light logo" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
             <span style="color: yellow;">SEMILLERO SATELITE SOCIAL</span>
             <hr style="width: 20%; margin: 50;">
             <span><img class="fw-light" width="600" src="./assets/uniminuto.png" alt="uniminuto" class="mb-3"></span>
            </h2>
           </div>
           <div class="col-6">
            <ul class="list-unstyled text-light footer-link-list">
             <h2 class="h2 text-light border-bottom pb-3 border-light">info</h2>
             <li>
              <i class="fas fa-map-marker-alt fa-fw"></i>
               GIRARDOT - CUNDINAMARCA
             </li>
             <li>
              <i class="fa fa-phone fa-fw"></i>
              <a class="text-decoration-none" href="tel:+57 3118831832">+57 3118831832</a>
             </li>
             <li>
              <i class="fa fa-envelope fa-fw"></i>
              <a class="text-decoration-none" href="mailto:emasmela@uniminuto.edu">emasmela@uniminuto.edu</a>
             </li>
            </ul>
           </div>
          </div>
         </div>
        </section>

        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-9 text-lg-start"><b>Satélites Sociales - Información de contacto: info@satelites.com | &copy; 2023 AdminJDVA - JFPM - RGM</b></div>
                    <div class="col-lg-3 text-lg-end">
                      <a class="btn btn-dark btn-social mx-3" href="<?php echo $lista_configuraciones[18]['valor'];?>" aria-label="Twitter"><i class="fab fa-twitter"></i></a>
                      <a class="btn btn-dark btn-social mx-3" href="<?php echo $lista_configuraciones[19]['valor'];?>" aria-label="Facebook"><i class="fab fa-facebook-f"></i></a>
                      <a class="btn btn-dark btn-social mx-3" href="<?php echo $lista_configuraciones[20]['valor'];?>" aria-label="LinkedIn"><i class="fab fa-instagram"></i></a>
                      <a class="btn btn-dark btn-social mx-3" href="https://www.youtube.com/@semillerosatelitessociales5011"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>
            
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
       
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
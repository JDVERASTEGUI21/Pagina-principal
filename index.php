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
                <a class="navbar-brand" href="#inicio"><img width="400" src="./assets/img/Logo.png" alt="logo"></a>
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
        
        <!-- Perfil del semillero-->
        <section class="py-2 text-center container">
         <div class="row py-lg-5">
          <!-- Columna izquierda para el texto -->
          <div class="col-lg-5 col-md-2 mx-auto">
           <h1 class="h2">PERFIL DEL SEMILLERO</h1>
           <img class="fw-light" width="160" src="./assets/img/Imagen - logo.png" alt="Logo" class="mb-3">
           <p class="row text-center pt-1">
            El Semillero SATÉLITES SOCIALES - SATSOC, a través del análisis de oportunidades de la información satelital que nos aportará el programa Europeo COPÉRNICUS entre otros programas de manera libre o gratuita, busca cómo la tecnología emergente y aquellas que están en estado estable, apoyen al desarrollo integral y sostenible en zonas agrícolas y de turismo en la región de Alto Magdalena, Tequendama y Sumapaz, en el departamento de Cundinamarca, Colombia. 
            Este semillero está vinculado al grupo de Ingenieros Sin Fronteras de Colombia, que tiene su sede principal en el Parque Científico de Innovación Social (PCIS) de UNIMINUTO - CUNDINAMARCA - GIRARDOT.
           </p>
          </div>

          <!-- Columna derecha para el video de YouTube -->
          <div class="col-lg-6 col-md-2 mx-auto mt-4"> <!-- Agregada la clase mt-4 para añadir espacio en la parte superior -->
           <!-- Inserta aquí el código del video de YouTube -->
           <iframe width="90%" height="315" src="https://www.youtube.com/embed/l3YlTnbV1gA" frameborder="0" allowfullscreen></iframe>
          </div>
         </div>
        </section>

        <main class="bg-dark text-light text-center py-5">
        <h1>SEMILLERO SATELITES SOCIALES</h1>
        <p>Un Espacio para el desarrollo integral y Sostenible.</p>

    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-4">
                <h2>Presentación:</h2>
                <p>El Semillero Satélites Sociales "Un Espacio para el desarrollo integral y Sostenible" es un grupo conformado por estudiantes del programa de Ingeniería de Sistemas, que promueve el desarrollo de la capacidad investigativa y creativa de sus integrantes a través de la búsqueda de usos prácticos y pertinentes de la información que suministran los satélites del programa.</p>
            </div>
            <div class="col-lg-4">
                <h2>General:</h2>
                <p>Apoyar la productividad de las zonas Agrícolas y de Turismo para la región de Alto Magdalena, Tequendama y Sumapaz, en el departamento de Cundinamarca, a partir de la implementación, capacitación y desarrollo de herramientas tecnológicas que facilitarán el análisis de datos satelitales.</p>
            </div>
            <div class="col-lg-4">
                <h2>Específicos:</h2>
                <ul>
                    <li>Generar y ejecutar metodologías de aprendizaje.</li>
                    <li>Participar en diferentes proyectos sociales y científicos.</li>
                    <li>Implementar una herramienta tecnológica libre que facilite y mejore la interpretación de los datos satelitales.</li>
                </ul>
            </div>
        </div>
    </div>
    </main>

    <main>
    <div class="container mt-5 text-center">
      <div class="row">
        <div class="col-lg-6">
            <h2 style="color: #007BFF; font-size: 24px;">MISIÓN:</h2>
            <p style="font-size: 18px;">El Semillero Satélites Sociales "Un Espacio para el desarrollo integral y Sostenible", es un grupo conformado por estudiantes del programa de Ingeniería de Sistemas, que promueve el desarrollo de la capacidad investigativa y creativa de sus integrantes a través de la búsqueda de usos prácticos y pertinentes de la información que suministran los satélites del programa europeo COPÉRNICUS y otros programas satelitales que ofrecen información de manera abierta o gratuita.</p>
        </div>
        <div class="col-lg-6">
            <h2 style="color: #FF5733; font-size: 24px;">VISIÓN:</h2>
            <p style="font-size: 18px;">Para finales del año 2023, ser catalogado como un semillero de investigación de Innovación Social y Productiva, que cuente con el reconocimiento a nivel local y regional en aspectos relacionados al análisis de datos satelitales, conducentes al aporte de soluciones en zonas agrícolas y de turismo para la región de Alto Magdalena, Tequendama y Sumapaz, en el departamento de Cundinamarca, Colombia.</p>
        </div>
    </div>
    </div>
           </main>

  <section class="bg-dark text-light text-center py-5">
    <div class="container mt-5">
      <div class="row">
          <div class="col-lg-10 offset-lg-1">
            <h1>PLAN DE TRABAJO: SEMILLERO DE INVESTIGACIÓN</h1>
            <p>Estimado profesor, favor lea antes de diligenciar el presente formato.</p>
        <p>Para la elaboración del plan de trabajo del semillero se debe tener en cuenta lo siguiente:</p>
        <p>• La coordinación de investigación formativa de la Rectoría Cundinamarca junto con la coordinación de investigaciones de cada CR revisará la viabilidad que tiene el plan de trabajo y si cumple satisfactoriamente se dará el aval para su ejecución. En este momento el profesor deberá firmar su plan de trabajo manifestando que está de acuerdo con su ejecución.</p>
        <p>• El semillero está sujeto a la evaluación total del plan de trabajo, lo que dictamina su continuidad o cierre.</p>
        <p>• El plan estará previsto para dos periodos académicos, sin embargo, se deben definir entregables de cada periodo. El semillero no contará con una partida presupuestal propia del semillero, sin embargo, se evaluará la necesidad de cada semillero para que pueda acceder a recursos por medio de la Dirección de investigaciones.</p>
        <p>Dentro del presente formato se debe diligenciar cuidadosamente el espacio de productos.</p>
        <p>Como complemento se debe diligenciar:</p>
        <p>1. Formato FR-II-IVF-03 Plan estratégico de semilleros de investigación y grupos de estudio. Una vez diligenciado se debe subir a la plataforma SIGIIP.</p>
        <p>2. Plan de trabajo con la información básica del semillero, las actividades que deben coincidir con el formato FR-II-IVF-03 Plan estratégico, estrategia pedagógica y datos de los estudiantes que participan en el semillero.</p>
        <p>Al cerrar el semestre se debe diligenciar el Informe:</p>
        <p>3. FR23AA1 Informe de cumplimiento del plan de formación y desarrollo de semilleros y grupos de estudio.</p>
    
              <div class="mb-4"></div>
          </div>
      </div>
    </div>
  </section>


        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase"><?php echo $lista_configuraciones[4]['valor'];?></h2>
                    <h3 class="section-subheading text-muted"><?php echo $lista_configuraciones[5]['valor'];?></h3>
                </div>
                <div class="row text-center">
                 <?php foreach($lista_servicios as $registros){?>
                    <div class="col-md-4">
                        <span class="fa-stack fa-4x">
                            <i class="fas fa-circle fa-stack-2x text-primary"></i>
                            <i class="fas <?php echo $registros['icono'];?> fa-stack-1x fa-inverse"></i>
                        </span>
                        <h4 class="my-3"><?php echo $registros['titulo'];?></h4>
                        <p class="text-muted"><?php echo $registros['descripcion'];?></p>
                    </div>
                 <?php } ?>

                </div>
            </div>
        </section>
        
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase"><?php echo $lista_configuraciones[6]['valor'];?></h2>
                    <h3 class="section-subheading text-muted"><?php echo $lista_configuraciones[7]['valor'];?></h3>
                </div>
                <div class="row">
                <?php foreach($lista_portafolio as $registros){?>
                    <div class="col-lg-4 col-sm-6 mb-4">
                        <!-- Portfolio item 1-->
                        <div class="portfolio-item">
                            <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal<?php echo $registros['ID'];?>">
                                <div class="portfolio-hover">
                                    <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                </div>
                                <img class="img-fluid" src="assets/img/portfolio/<?php echo $registros['imagen'];?>" alt="..." />
                            </a>
                            <div class="portfolio-caption">
                                <div class="portfolio-caption-heading"><?php echo $registros['titulo'];?></div>
                                <div class="portfolio-caption-subheading text-muted"><?php echo $registros['subtitulo'];?></div>
                            </div>
                        </div>
                    </div>

                  <div class="portfolio-modal modal fade" id="portfolioModal<?php echo $registros['ID'];?>" tabindex="-1" role="dialog" aria-hidden="true">
                   <div class="modal-dialog">
                    <div class="modal-content">
                     <div class="close-modal" data-bs-dismiss="modal"><img src="assets/img/close-icon.svg" alt="Close modal" /></div>
                      <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="modal-body">
                                    <!-- Project details-->
                                    <h2 class="text-uppercase"><?php echo $registros['titulo'];?></h2>
                                    <p class="item-intro text-muted"><?php echo $registros['subtitulo'];?></p>
                                    <img class="img-fluid d-block mx-auto" src="assets/img/portfolio/<?php echo $registros['imagen'];?>" alt="..." />
                                    <p><?php echo $registros['descripcion'];?></p>
                                    <ul class="list-inline">
                                        <li>
                                            <strong>Cliente:</strong>
                                            <?php echo $registros['cliente'];?>
                                        </li>
                                        <li>
                                            <strong>Categoria:</strong>
                                            <?php echo $registros['categoria'];?>
                                        </li>

                                        <li>
                                            <strong>URL:</strong>
                                            <a href="<?php echo $registros['url'];?>"><?php echo $registros['url'];?></a>
                                        </li>

                        
                                    </ul>
                                    <button class="btn btn-primary btn-xl text-uppercase" data-bs-dismiss="modal" type="button">
                                        <i class="fas fa-xmark me-1"></i>
                                        Cerrar
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

                    <?php } ?>
                
                </div>
            </div>
        </section>
        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase"><?php echo $lista_configuraciones[8]['valor'];?></h2>
                    <h3 class="section-subheading text-muted"><?php echo $lista_configuraciones[9]['valor'];?></h3>
                </div>
                <ul class="timeline">
                 <?php 
                 $contador=1;
                 foreach($lista_entradas as $registros){?>
                    
                    <li <?php echo (($contador%2)==0)?'class="timeline-inverted"':""; ?> >
                        <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/<?php echo $registros['imagen'];?>" alt="..." /></div>
                        <div class="timeline-panel">
                            <div class="timeline-heading">
                                <h4><?php echo $registros['fecha'];?></h4>
                                <h4 class="subheading"><?php echo $registros['titulo'];?></h4>
                            </div>
                            <div class="timeline-body"><p class="text-muted"><?php echo $registros['descripcion'];?></p></div>
                        </div>
                    </li>

                    <?php 
                     $contador++;
                    } ?>

                    <li class="timeline-inverted">
                        <div class="timeline-image">
                            <h4>
                            <?php echo $lista_configuraciones[10]['valor'];?>
                            </h4>
                        </div>
                    </li>
                </ul>
            </div>
        </section>

        <section class="page-section  bg-light"">
         <h2 style="text-align: center;">Reconocimiento:</h2>
         <p class="text-center text-muted">Recococimiento por el compromiso y responsabilidad en el trabajo desarrollado.</p>
         <img src="assets/Reconocimiento semillero SATSOC Nov 2021.JPG" alt="reconocimiento" style="display: block; margin: 0 auto; max-width: 100%; height: auto;">
        </section>

        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase"><?php echo $lista_configuraciones[11]['valor'];?></h2>
                    <h3 class="section-subheading text-muted"><?php echo $lista_configuraciones[12]['valor'];?></h3>
                </div>
                <div class="row">
                <?php foreach($lista_equipo as $registros){?>
                    <div class="col-lg-4">
                        <div class="team-member">
                            <img class="mx-auto rounded-circle" src="assets/img/Profesores/<?php echo $registros['imagen'];?>" alt="..." />
                            <h4><?php echo $registros['nombre'];?></h4>
                            <p class="text-muted"><?php echo $registros['puesto'];?></p>
                            <a class="btn btn-dark btn-social mx-2" href="<?php echo $registros['twitter'];?>" aria-label="Parveen Anand Twitter Profile"><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="<?php echo $registros['facebook'];?>" aria-label="Parveen Anand Facebook Profile"><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-dark btn-social mx-2" href="<?php echo $registros['linkedin'];?>" aria-label="Parveen Anand LinkedIn Profile"><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>

                    <?php } ?>
                 </div>
                <div class="row">
                    <div class="col-lg-8 mx-auto text-center"><p class="large text-muted"><?php echo $lista_configuraciones[13]['valor'];?></p></div>
                </div>
            </div>
        </section>

        
        <section class="page-section bg-dark text-light" id="Estudiantes">
         <div class="container">
          <div class="text-center">
            <h2 class="section-heading text-uppercase"><?php echo $lista_configuraciones[14]['valor'];?></h2>
            <h3 class="section-subheading"><?php echo $lista_configuraciones[15]['valor'];?></h3>
          </div>
            
          <div class="row">
            <?php foreach($lista_estudiantes as $registros){?>
            <div class="col-lg-4">
              <div class="team-member">
               <img class="mx-auto rounded-circle" src="assets/img/Estudiantes/<?php echo $registros['Imagen'];?>" alt="imagen"></a>
               <h4 class="mt-3 mb-3" style="color: yellow;"><?php echo $registros['Nombre']; ?></h4>
               <h5 class="text-body-secondary"><?php echo $registros['Programa'];?></h5>
               <p class="text-body-secondary"><?php echo $registros['Semestre'];?></p>
               <p class="text-body-secondary"><?php echo $registros['Descripcion'];?></p>
               <p>Centro regional GIRARDOT</p>
               
            </div>
          </div>
         <?php } ?>
          </div>
         </div>

         </section>

        <!-- Clients-->
        <div class="py-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/microsoft.svg" alt="..." aria-label="Microsoft Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/google.svg" alt="..." aria-label="Google Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/facebook.svg" alt="..." aria-label="Facebook Logo" /></a>
                    </div>
                    <div class="col-md-3 col-sm-6 my-3">
                        <a href="#!"><img class="img-fluid img-brand d-block mx-auto" src="assets/img/logos/ibm.svg" alt="..." aria-label="IBM Logo" /></a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Contact-->
        <section id="contact" class="bg-dark text-light py-4">
         <div class="container">
          <div class="row">
           <div class="col-6">
            <h2 class="h2 text-success border-light logo" style="display: flex; flex-direction: column; align-items: center; text-align: center;">
             <span>SEMILLERO SATELITE SOCIAL</span>
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
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <!-- * *                               SB Forms JS                               * *-->
        <!-- * * Activate your form at https://startbootstrap.com/solution/contact-forms * *-->
        <!-- * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *-->
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>

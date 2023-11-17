-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-11-2023 a las 20:05:23
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `webside`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_configuraciones`
--

CREATE TABLE `tb_configuraciones` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `valor` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_configuraciones`
--

INSERT INTO `tb_configuraciones` (`ID`, `Nombre`, `valor`) VALUES
(1, 'Bienvenida', 'Bienvenido al semillero satélite social'),
(2, 'Bienvenida 2', 'Quienes somos.'),
(3, 'Boton_1', 'Empezar'),
(4, 'link_boton', './admin/index.php'),
(5, 'Titulo_servicios', 'Trabajo a desarrollar'),
(6, 'descipcion_servicios', 'Bienvenidos, el semillero satélite social es un proyecto innovador que busca sembrar las semillas del cambio social a través de la aplicación de tecnología espacial para abordar problemas y desafíos específicos en comunidades locales. '),
(7, 'Titulo_portafolio', 'Portafolio'),
(8, 'descipcion_portafolio', 'Bienvenido al semillero satélite social'),
(9, 'Titulo_about', 'Historia del semillero'),
(10, 'descipcion_about', 'Bienvenido al semillero satélite social'),
(11, 'Final_about', 'Queremos seguir haciendo mas...'),
(12, 'Titulo_teams', 'Nuestros Lideres del semillero'),
(13, 'descipcion_teams', 'Personas que hicieron realidad este semillero'),
(14, 'Descripcion_teams', 'Quienes somos.'),
(15, 'Estudiante titulo', 'NUESTROS ESTUDIANTES 2023'),
(16, 'Estudiantes descripcion', 'En el programa de Ingeniería de Sistemas, contamos con un destacado grupo de líderes cuya pasión y experiencia son fundamentales para guiar a nuestros estudiantes hacia el éxito. Estos líderes son expertos en sus respectivos campos y están comprometidos en brindar una educación de calidad y fomentar el crecimiento de nuestros futuros ingenieros de sistemas.'),
(17, 'Titulo_contacto', 'Quieres contáctanos'),
(18, 'descipcion_contacto', 'Bienvenido al semillero satélite social'),
(19, 'link_tw', 'https://twitter.com/?lang=es'),
(20, 'link_fb', 'https://www.facebook.com/profile.php?id=61553498606038&mibextid=ZbWKwL'),
(21, 'link_lk', 'https://instagram.com/satsoc.crg?igshid=MThpNzh0OXk1cWtndA=='),
(32, 'link youtube', 'https://www.youtube.com/watch?v=l3YlTnbV1gA&t=4s');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_entradas`
--

CREATE TABLE `tb_entradas` (
  `ID` int(11) NOT NULL,
  `fecha` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_entradas`
--

INSERT INTO `tb_entradas` (`ID`, `fecha`, `titulo`, `descripcion`, `imagen`) VALUES
(1, '2019-03-01', 'Grupos de ISFCOL', 'Visita al PCIS, estudiantes del curso de ISFCOL', '1700156470_3.jpg'),
(2, '2019-09-02', 'Creación del grupo', 'Se consolida el grupo de estudio Satélites Sociales.', '1700156591_4.jpg'),
(3, '2020-03-03', 'Inicio de semillero', 'Se crea el semillero satélite sociales, se trabajo en el curso de imágenes satelitales por PCIS.', '1700157027_Herramienta.gif'),
(4, '2020-11-16', 'Proyecto de investigación', 'Se aplica \"Diseño de algoritmos para el cultivo de mangos\"', '1700158310_cultivo.png'),
(5, '2021-10-04', 'Nuevas vinculaciones ', 'Se vinculan al proyecto de agendas regionales, con el trabajo con los fruticultores de mangos de la region.', '1700158399_vincula.png'),
(6, '2022-03-15', 'Eventos', 'Eventos de apropiación social, participación de ponencias ENSIU, ERI y artículos divulgativos', '1700158225_articulo.jpg'),
(7, '2022-11-16', 'Primeras ideas de la pagina', 'Se empezó a trabajar sobre un primer lienzo en la creación de la pagina web con HTML.', '1700158695_visual.png'),
(8, '2023-09-27', 'Creación de la Primera pagina web del semillero', 'Se termino la creación, diseño y estilos de la primera pagina del semillero satélites sociales', '1700158886_pagina.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_equipo`
--

CREATE TABLE `tb_equipo` (
  `ID` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `puesto` varchar(255) NOT NULL,
  `twitter` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `linkedin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_equipo`
--

INSERT INTO `tb_equipo` (`ID`, `imagen`, `nombre`, `puesto`, `twitter`, `facebook`, `linkedin`) VALUES
(1, '1699899733_Imagen1.jpg', 'Jesús David Villalba Góngora ', 'Creador y exlíder del semillero', 'https://twitter.com/?lang=es', 'https://www.facebook.com/', 'https://co.linkedin.com/'),
(2, '1699899016_joven.jpg', 'Juan Jose Caycedo', 'Joven investigador', 'https://twitter.com/?lang=es', 'https://www.facebook.com/', 'https://co.linkedin.com/'),
(3, '1699545333_Imagen.jpg', 'Efrain Masmela Tellez', 'Lider del semillero', 'https://twitter.com/?lang=es efrain', 'https://www.facebook.com/efrain', 'https://co.linkedin.com/efrain');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estudiantes`
--

CREATE TABLE `tb_estudiantes` (
  `ID` int(11) NOT NULL,
  `Nombre` varchar(255) NOT NULL,
  `Programa` varchar(255) NOT NULL,
  `Semestre` varchar(255) NOT NULL,
  `Sexo` varchar(255) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Imagen` varchar(255) NOT NULL,
  `Estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_estudiantes`
--

INSERT INTO `tb_estudiantes` (`ID`, `Nombre`, `Programa`, `Semestre`, `Sexo`, `Descripcion`, `Imagen`, `Estado`) VALUES
(1, 'Josue Ferley Pardo Moreno', 'Ingeniería de sistemas', '7 semestre', 'Masculino', 'Manejo de redes sociales, acompañamiento logístico, experiencia en el manejo de drones y programador.', '1699903598_Imagen3.jpg', 1),
(2, 'Rafael Gonzalez Martinez', 'Ingeniería de sistemas.', '7 semestre', 'Masculino', 'Apoyo logístico, diseñador de póster  y creador de imágenes satelitales con bandas entre otras cosas.', '1699903718_Imagen2.jpg', 1),
(3, 'Luis Carlos Forero Ortiz', 'Ingeniería en sistemas', '10 semestre', 'Masculino', 'Investigar la actividad volcánica del volcán Nevado del Ruiz durante un lapso de 5 años.', '1700077524_Imagen4.jpg', 1),
(4, 'Jose David Verastegui Arcos', 'Ingeniería de sistemas', '7 semestre', 'Masculino', 'Creador de imágenes satelitales y programador.', '1700077572_Imagen1.jpg', 1),
(5, 'Ingrid Yohana Ortegón Quiñones', 'Ingeniería de sistemas', '10 semestre', 'Femenino', 'Desarrollo del trabajo investigativo y exponer problemáticas u otros temas de interés para el mismo.', '1700077724_Imagen5.jpg', 1),
(6, 'Leydi Daniela Isaza Botache', 'Ingeniería de sistemas', '9 semestre', 'Masculino', 'Artículo de investigación sobre la actividad volcánica del Nevado del Ruiz.', '1700154333_Imagen6.png', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_portafolio`
--

CREATE TABLE `tb_portafolio` (
  `ID` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `subtitulo` varchar(255) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `cliente` varchar(255) NOT NULL,
  `categoria` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_portafolio`
--

INSERT INTO `tb_portafolio` (`ID`, `titulo`, `subtitulo`, `imagen`, `descripcion`, `cliente`, `categoria`, `url`) VALUES
(1, 'Ponencias', 'Creación de exposiciones sobre satélites', '1700078415_1700078337_ponencias.jpg', 'Aprenda ingles y complementaria.', 'Estudiantes', 'PONENCIAS', 'https://www.youtube.com/watch?v=SdJ8Lu-cS74'),
(2, 'Artículos divulgativos', 'Noticias e investigación', '1700078626_1700078415_1700078337_ponencias.jpg', 'Articulos', 'Estudiantes', 'Artículos divulgativos', 'https://www.youtube.com/watch?v=A-KNAm9pUkI'),
(3, 'Ponencias', 'Hacemos sitio web', '1700078642_1700078415_1700078337_ponencias.jpg', 'Creación de una pagina web ', 'Estudiantes', 'Creación y programación', 'https://www.youtube.com/watch?v=A-KNAm9pUkI');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_servicios`
--

CREATE TABLE `tb_servicios` (
  `ID` int(11) NOT NULL,
  `icono` varchar(255) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_servicios`
--

INSERT INTO `tb_servicios` (`ID`, `icono`, `titulo`, `descripcion`) VALUES
(1, ' fa-archive', 'Identificación de Problemas Sociales:', 'Trabajamos mediante la colaboración estrecha con PICIS - COPERNICUS, mediante el estudio de imágenes satelitales con expertos en la materia para identificar y comprender a fondo los problemas sociales específicos que enfrenta la región.'),
(2, 'fa-laptop', 'Desarrollo Tecnológico y Diseño Participativo:', 'Realizamos estudios de imágenes satelitales que se combina con las diferentes bandas de colores para realizar los diferentes estudios, enfocados en abordar problemas concretos, mediante la participación activa de la comunidad en el diseño de soluciones.'),
(3, 'fas fa-house-damage', 'Prevención, Capacitación y Empoderamiento Local:', 'Se lleva a cabo una fase crucial de capacitación en la que la comunidad loca sobre los resultados obtenidos, empoderando a la comunidad para utilizar la información en la toma de decisiones locales y la resolución de problemas identificados.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `ID` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`ID`, `imagen`, `usuario`, `pass`, `correo`) VALUES
(1, '1699897041_Imagen1.jpg', 'Jose David Verastegui Arcos', 'Jos2022*', 'jose.verastegui@uniminuto.edu.co'),
(2, '1699896375_Imagen2.jpg', 'Rafael Gonzales Martínez', '123456', 'rafael.gonzalez-m@uniminuto.edu.co'),
(3, '1699896388_Imagen3.jpg', 'Josue Ferley Pardo Moreno', '123456', 'josue.pardo@uniminuto.edu.co');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `tb_configuraciones`
--
ALTER TABLE `tb_configuraciones`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tb_entradas`
--
ALTER TABLE `tb_entradas`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tb_equipo`
--
ALTER TABLE `tb_equipo`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tb_estudiantes`
--
ALTER TABLE `tb_estudiantes`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tb_portafolio`
--
ALTER TABLE `tb_portafolio`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tb_servicios`
--
ALTER TABLE `tb_servicios`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `tb_configuraciones`
--
ALTER TABLE `tb_configuraciones`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `tb_entradas`
--
ALTER TABLE `tb_entradas`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `tb_equipo`
--
ALTER TABLE `tb_equipo`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tb_estudiantes`
--
ALTER TABLE `tb_estudiantes`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tb_portafolio`
--
ALTER TABLE `tb_portafolio`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tb_servicios`
--
ALTER TABLE `tb_servicios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

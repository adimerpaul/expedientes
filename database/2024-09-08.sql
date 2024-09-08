-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-09-2024 a las 01:19:32
-- Versión del servidor: 10.4.17-MariaDB
-- Versión de PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `documentos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id` int(11) NOT NULL,
  `idcategoria` int(11) NOT NULL,
  `idinstitucion` int(11) NOT NULL,
  `motivo` varchar(255) DEFAULT NULL,
  `nombre` varchar(255) NOT NULL,
  `numero` varchar(250) NOT NULL,
  `fecha` date DEFAULT NULL,
  `descripcion` text NOT NULL,
  `miniatura` varchar(255) NOT NULL,
  `tipo` varchar(250) NOT NULL,
  `tamano` varchar(250) NOT NULL,
  `documento` varchar(250) NOT NULL,
  `user_asignado_id` int(11) DEFAULT NULL,
  `archivo_asignado` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id`, `idcategoria`, `idinstitucion`, `motivo`, `nombre`, `numero`, `fecha`, `descripcion`, `miniatura`, `tipo`, `tamano`, `documento`, `user_asignado_id`, `archivo_asignado`) VALUES
(11, 1, 1, 'MOTIVO', 'AAAAA', 'aaa', '2024-09-22', '', '', '', '', 'cleansea2024-08-27.txt', 18, 'cleansea2024-08-27.txt'),
(12, 1, 1, 'motivo', 'actor', '45', '2024-09-21', '', '', 'pdf', '102.98 KB', 'RESPUESTAS DE LA COTIZACIÓN.pdf', 17, '20240825_194100.jpg'),
(13, 1, 1, 'motivo xxx', 'actor xxx', '45 2312', '2024-09-29', 'descripcon xxxx aaaa', '', 'otro', '1.87 KB', 'cleansea2024-08-27.txt', 13, NULL),
(14, 1, 1, 'motivo', 'actores', '343', '2024-09-08', '', '', 'otro', '0.49 KB', 'cleansea2024-08-27.txt', NULL, NULL),
(15, 1, 1, 'motivo', 'actor', '45', '2024-08-31', 'decripcion  xxx yyy zzzzz', '', 'otro', '13.57 KB', 'Estimación del Tiempo de Trabajo.docx', 17, 'RESPUESTAS DE LA COTIZACIÓN.docx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Alergología', ''),
(2, 'Algología', ''),
(3, 'Anestesiología', ''),
(4, 'Angiología', ''),
(5, 'Cardiología', ''),
(6, 'Endocrinología', ''),
(7, 'Estomatología', ''),
(8, 'Farmacología Clínica', ''),
(9, 'Foniatría', ''),
(10, 'Gastroenterología', ''),
(11, 'Genética', ''),
(12, 'Geriatría', ''),
(13, 'Hematología', ''),
(14, 'Hepatología', ''),
(15, 'Infectología', ''),
(16, 'Inmunología', ''),
(17, 'Medicina aeroespacial', ''),
(18, 'Medicina del deporte', ''),
(19, 'Medicina familiar y comunitaria', ''),
(20, 'Medicina física y rehabilitación', ''),
(21, 'Medicina forense', ''),
(22, 'Medicina intensiva', ''),
(23, 'Medicina interna', ''),
(24, 'Medicina nuclear', ''),
(25, 'Medicina paliativa', ''),
(26, 'Medicina preventiva y salud pública', ''),
(27, 'Medicina del trabajo', ''),
(28, 'Nefrología', ''),
(29, 'Neumología', ''),
(30, 'Neurología', ''),
(31, 'Nutriología', ''),
(32, 'Oncología médica', ''),
(33, 'Oncología radioterápica', ''),
(34, 'Pediatría', ''),
(35, 'Psiquiatría', ''),
(36, 'Reumatología', ''),
(37, 'Toxicología', ''),
(38, 'Cirugía cardíaca', ''),
(39, 'Cirugía craneofacial', ''),
(40, 'Cirugía general', ''),
(41, 'Cirugía oral y maxilofacial', ''),
(42, 'Cirugía oncológica', ''),
(43, 'Cirugía ortopédica', ''),
(44, 'Cirugía pediátrica', ''),
(45, 'Cirugía plástica', ''),
(46, 'Cirugía torácica', ''),
(47, 'Cirugía vascular', ''),
(48, 'Coloproctología', ''),
(49, 'Neurocirugía', ''),
(50, 'Dermatología', ''),
(51, 'Ginecología y obstetricia o tocología', ''),
(52, 'Medicina de emergencia', ''),
(53, 'Odontología', ''),
(54, 'Oftalmología', ''),
(55, 'Otorrinolaringología', ''),
(56, 'Traumatología y Ortopedia', ''),
(57, 'Urología', ''),
(58, 'Análisis clínico', ''),
(59, 'Anatomía patológica', ''),
(60, 'Bioquímica clínica', ''),
(61, 'Embriología', ''),
(62, 'Farmacología', ''),
(63, 'Genética médica', ''),
(64, 'Medicina nuclear', ''),
(65, 'Microbiología y parasitología', ''),
(66, 'Neurofisiología clínica', ''),
(67, 'Radiología', ''),
(68, 'Administración en salud', ''),
(69, 'Auditoría médica', ''),
(70, 'Epidemiología', ''),
(71, 'Salud pública', ''),
(72, 'Medicina Legal', ''),
(73, 'Patología', ''),
(74, 'Urgencias', ''),
(75, 'Nefrología Pediátrica', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instituciones`
--

CREATE TABLE `instituciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `instituciones`
--

INSERT INTO `instituciones` (`id`, `nombre`, `descripcion`) VALUES
(1, 'DF NORTE', ''),
(2, 'DF SUR', ''),
(3, 'EDO MEXICO PONIENTE', ''),
(4, 'EDO MEX ORIENTE', ''),
(5, 'JALISCO', ''),
(6, 'NIVEL CENTRAL', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mensajes`
--

CREATE TABLE `mensajes` (
  `id` int(11) NOT NULL,
  `asunto` varchar(250) NOT NULL,
  `descripcion` text NOT NULL,
  `idusuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mensajes`
--

INSERT INTO `mensajes` (`id`, `asunto`, `descripcion`, `idusuario`) VALUES
(4, 'Reclamo de documentos', 'Necesito el documento indicado por favor', 5),
(5, 'NECESITO URGENTE', 'nada', 13);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(255) NOT NULL,
  `usuario` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `usuario`, `password`, `correo`, `rol`) VALUES
(13, 'Raul', 'raul', 'raul', 'raul@gmail.com', 0),
(14, 'JANET ', 'admin', 'admin', 'isajus9@gmail.com', 1),
(15, 'FERNANDO LICONA', 'doctor', 'admin', 'fernando.licona@gmail.com', 0),
(17, 'adimer paul chambi ajata', 'adimer', '123456', 'adimer101@gmail.com', 0),
(18, 'adalid paul chambi huanca', 'adalid', '123456', 'adalid@gmail.com', 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idcategoria` (`idcategoria`),
  ADD KEY `idinstitucion` (`idinstitucion`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `instituciones`
--
ALTER TABLE `instituciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idusuario` (`idusuario`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT de la tabla `instituciones`
--
ALTER TABLE `instituciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `mensajes`
--
ALTER TABLE `mensajes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD CONSTRAINT `archivos_ibfk_2` FOREIGN KEY (`idinstitucion`) REFERENCES `instituciones` (`id`),
  ADD CONSTRAINT `archivos_ibfk_3` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 11-01-2019 a las 05:53:36
-- Versión del servidor: 10.1.35-MariaDB
-- Versión de PHP: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inder`
--

DELIMITER $$
--
-- Funciones
--
CREATE DEFINER=`root`@`localhost` FUNCTION `consecutivo_oficio` () RETURNS INT(11) BEGIN
    DECLARE num INT DEFAULT 0;
    SET num = ( SELECT oficio FROM `oficios` ORDER BY `id` DESC LIMIT 1 );
    RETURN num+1;
END$$

CREATE DEFINER=`root`@`localhost` FUNCTION `ingresar_oficio` (`fecha` DATE, `ano` YEAR(4), `dirigidoA` VARCHAR(50), `asunto` VARCHAR(50), `enviadoPor` VARCHAR(50), `plazoRespuesta` DATE, `idEstado` INT, `idUsuario` INT, `seguimiento` INT) RETURNS INT(11) READS SQL DATA
    DETERMINISTIC
BEGIN
DECLARE num INT;

SET num = ( SELECT oficio FROM oficios ORDER BY id DESC LIMIT 1 ) + 1;

IF num IS NOT NULL THEN
INSERT INTO oficios(fecha, oficio, ano, dirigidoA, asunto, enviadoPor, plazoRespuesta, idEstado, idUsuario, seguimiento) VALUES(fecha, num, ano, dirigidoA, asunto, enviadoPor, plazoRespuesta, idEstado, idUsuario, seguimiento);
RETURN 1;
END IF;
RETURN 0;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `documento` text COLLATE utf8_spanish_ci NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono2` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `observacion` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `documento`, `email`, `telefono`, `telefono2`, `direccion`, `fecha_nacimiento`, `observacion`, `fecha`) VALUES
(1, 'Eduardo Gonzales Flores', '7-0202-1111', 'eduardo@gmail.com', '2764-1111', '8529-1111', 'Río Frío Finca #11 modificado', '1975-02-11', 'para mas detalles me avisa, gracias', '2018-10-14 17:17:27'),
(2, 'Carlos Ramon Perez ', '7-0202-0521', 'carlos@gmail.com', '2764-2566', '8412-8999', 'Rio Frio Finca 11', '1992-11-24', 'Todo bien carlos ramon perez', '2018-07-31 16:56:30'),
(3, 'Andres Marin Montero', '7-0433-0222', 'andres@gmail.com', '2766-5555', '6028-2027', 'Monte Verde junto a tal lado', '1991-03-11', 'todo bien', '2018-07-31 14:53:56'),
(4, 'Mario Madrigal', '7-0202-0422', 'mario@gmail.com', '2766-2222', '8765-4322', 'San Miguel 800mtrs sur de la cruz roja', '1987-07-20', 'Todo en orden solo bueno', '2018-07-31 14:54:48'),
(5, 'Randall Montero', '1-0222-0222', 'randall@gmail.com', '2764-1122', '8512-3444', 'Puerto Viejo Sarapiquí', '1987-02-22', 'Todo en orden', '2018-07-31 14:57:38'),
(6, 'Pedro Perez', '2-0202-0322', 'pedro@gmail.com', '2766-6666', '8534-4343', 'Puerto Viejo Sarapiqui costado supermercado la viña', '1986-02-22', 'Pedro es dueño de la empacadora de palmito en Las Marias ', '2018-08-20 17:58:43'),
(7, 'Fernando Cordoba', '7-0202-0511', 'fernando@gmail.com', '2764-4444', '8622-6644', 'Monte Verde, Sarapiquí.', '1955-12-12', 'Todo en orden si', '2018-08-07 14:10:16'),
(8, 'Isaac Sibaja Rodríguez', '702020511', 'isibaja@outlook.com', '8529-5771', '2764-3702', 'Monte Verde la victoria, Rio frio sarapiqui', '1991-03-11', 'primo karla', '2018-10-23 17:01:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `id` int(11) NOT NULL,
  `estado` text COLLATE utf8_spanish_ci NOT NULL,
  `color` text COLLATE utf8_spanish_ci NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `estados`
--

INSERT INTO `estados` (`id`, `estado`, `color`, `fecha`) VALUES
(1, 'Pendiente', 'Coral', '2018-10-31 20:08:03'),
(2, 'Ejecutado', 'green', '2018-10-17 20:11:22'),
(3, 'En espera', 'yellow', '2018-10-31 20:08:14'),
(6, 'Urgente', 'Darkgreen', '2018-10-17 20:12:09'),
(8, 'En proceso', 'Darkmagenta', '2018-10-17 20:12:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instituto`
--

CREATE TABLE `instituto` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `direccion` text COLLATE utf8_spanish_ci NOT NULL,
  `oficina` text COLLATE utf8_spanish_ci NOT NULL,
  `logo` text COLLATE utf8_spanish_ci NOT NULL,
  `telefono` text COLLATE utf8_spanish_ci NOT NULL,
  `fax` text COLLATE utf8_spanish_ci NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `pie` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `instituto`
--

INSERT INTO `instituto` (`id`, `nombre`, `direccion`, `oficina`, `logo`, `telefono`, `fax`, `email`, `pie`) VALUES
(1, 'Instituto de Desarrollo Rural', 'Región de Desarrollo Huertar Norte', 'Oficina de Desarrollo territorial Horquetas', 'vistas/img/instituto/default.png', '2764-3718', '2764-3718', 'drodriguez@inder.go.cr', 'Construyendo un desarrollo rural equitativo y sostenible');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `labores`
--

CREATE TABLE `labores` (
  `id` int(11) NOT NULL,
  `title` text COLLATE utf8_spanish_ci NOT NULL,
  `descripcion` text COLLATE utf8_spanish_ci NOT NULL,
  `color` text COLLATE utf8_spanish_ci NOT NULL,
  `textColor` text COLLATE utf8_spanish_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `labores`
--

INSERT INTO `labores` (`id`, `title`, `descripcion`, `color`, `textColor`, `start`, `end`) VALUES
(1, 'Revisión Sistema', 'Sistema web', 'yellowgreen', 'white', '2019-01-11 13:00:00', '2019-01-11 14:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oficios`
--

CREATE TABLE `oficios` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `oficio` int(11) NOT NULL,
  `ano` year(4) NOT NULL,
  `dirigidoA` text COLLATE utf8_spanish_ci NOT NULL,
  `asunto` text COLLATE utf8_spanish_ci NOT NULL,
  `enviadoPor` text COLLATE utf8_spanish_ci NOT NULL,
  `plazoRespuesta` date NOT NULL,
  `idEstado` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `seguimiento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `oficios`
--

INSERT INTO `oficios` (`id`, `fecha`, `oficio`, `ano`, `dirigidoA`, `asunto`, `enviadoPor`, `plazoRespuesta`, `idEstado`, `idUsuario`, `seguimiento`) VALUES
(1, '2019-01-10', 1, 2019, 'ano', 'nuevo', 'Isaac Sibaja', '2019-01-31', 8, 1, 1),
(2, '2019-01-10', 2, 2019, 'ofici 2', '2', 'Didier Rodríguez', '2019-01-23', 2, 2, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipotramite`
--

CREATE TABLE `tipotramite` (
  `id` int(11) NOT NULL,
  `tipo` text COLLATE utf8_spanish_ci NOT NULL,
  `respuesta` text COLLATE utf8_spanish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tipotramite`
--

INSERT INTO `tipotramite` (`id`, `tipo`, `respuesta`) VALUES
(1, 'Solicitud de tierras', 'El Inder no brinda tierras.'),
(2, 'Solicitud de ganado', 'Inder brinda 5 cabezas de ganado más picadora de pasto.'),
(3, 'Morosidad Administrativa', 'debe de llenar formulario por el cual no ha podido pagar blabla');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tramites`
--

CREATE TABLE `tramites` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `idCliente` int(11) NOT NULL,
  `asentamiento` text COLLATE utf8_spanish_ci NOT NULL,
  `predio` text COLLATE utf8_spanish_ci NOT NULL,
  `idTipoTramite` int(11) NOT NULL,
  `solicitudRespuesta` int(11) NOT NULL,
  `respuesta` text COLLATE utf8_spanish_ci NOT NULL,
  `observacion` text COLLATE utf8_spanish_ci NOT NULL,
  `idEstado` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `tramites`
--

INSERT INTO `tramites` (`id`, `fecha`, `idCliente`, `asentamiento`, `predio`, `idTipoTramite`, `solicitudRespuesta`, `respuesta`, `observacion`, `idEstado`, `idUsuario`) VALUES
(1, '2018-10-31', 1, 'Horquetas', 'La Victoria', 3, 1, 'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.\r\n\r\nWhy do we use it?\r\nIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).\r\n\r\n\r\nWhere does it come from?\r\nContrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of \"de Finibus Bonorum et Malorum\" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, \"Lorem ipsum dolor sit amet..\", comes from a line in section 1.10.32.\r\n\r\nThe standard chunk of Lorem Ipsum used since the 1500s is reproduced below for those interested. Sections 1.10.32 and 1.10.33 from \"de Finibus Bonorum et Malorum\" by Cicero are also reproduced in their exact original form, accompanied by English versions from the 1914 translation by H. Rackham.', 'Debe dinero al Inder', 1, 2),
(2, '2018-10-31', 2, 'Ticari', 'Centro', 2, 1, 'Había una vez una adorable niña que era querida por todo aquél que la conociera, pero sobre todo por su abuelita, y no quedaba nada que no le hubiera dado a la niña. Una vez le regaló una pequeña caperuza o gorrito de un color rojo, que le quedaba tan bien que ella nunca quería usar otra cosa, así que la empezaron a llamar Caperucita Roja. Un día su madre le dijo: \"Ven, Caperucita Roja, aquí tengo un pastel y una botella de vino, llévaselas en esta canasta a tu abuelita que esta enfermita y débil y esto le ayudará. Vete ahora temprano, antes de que caliente el día, y en el camino, camina tranquila y con cuidado, no te apartes de la ruta, no vayas a caerte y se quiebre la botella y no quede nada para tu abuelita. Y cuando entres a su dormitorio no olvides decirle, \"Buenos días,\" ah, y no andes curioseando por todo el aposento.\"\r\n\r\n\"No te preocupes, haré bien todo,\" dijo Caperucita Roja, y tomó las cosas y se despidió cariñosamente. La abuelita vivía en el bosque, como a un kilómetro de su casa. Y no más había entrado Caperucita Roja en el bosque, siempre dentro del sendero, cuando se encontró con un lobo. Caperucita Roja no sabía que esa criatura pudiera hacer algún daño, y no tuvo ningún temor hacia él. \"Buenos días, Caperucita Roja,\" dijo el lobo. \"Buenos días, amable lobo.\" - \"¿Adonde vas tan temprano, Caperucita Roja?\" - \"A casa de mi abuelita.\" - \"¿Y qué llevas en esa canasta?\" - \"Pastel y vino. Ayer fue día de hornear, así que mi pobre abuelita enferma va a tener algo bueno para fortalecerse.\" - \"¿Y adonde vive tu abuelita, Caperucita Roja?\" - \"Como a medio kilómetro más adentro en el bosque. Su casa está bajo tres grandes robles, al lado de unos avellanos. Seguramente ya los habrás visto,\" contestó inocentemente Caperucita Roja. El lobo se dijo en silencio a sí mismo: \"¡Qué criatura tan tierna! qué buen bocadito - y será más sabroso que esa viejita. Así que debo actuar con delicadeza para obtener a ambas fácilmente.\" Entonces acompañó a Caperucita Roja un pequeño tramo del camino y luego le dijo: \"Mira Caperucita Roja, que lindas flores se ven por allá, ¿por qué no vas y recoges algunas? Y yo creo también que no te has dado cuenta de lo dulce que cantan los pajaritos. Es que vas tan apurada en el camino como si fueras para la escuela, mientras que todo el bosque está lleno de maravillas.\"\r\n\r\nCaperucita Roja levantó sus ojos, y cuando vio los rayos del sol danzando aquí y allá entre los árboles, y vio las bellas flores y el canto de los pájaros, pensó: \"Supongo que podría llevarle unas de estas flores frescas a mi abuelita y que le encantarán. Además, aún es muy temprano y no habrá problema si me atraso un poquito, siempre llegaré a buena hora.\" Y así, ella se salió del camino y se fue a cortar flores. Y cuando cortaba una, veía otra más bonita, y otra y otra, y sin darse cuenta se fue adentrando en el bosque. Mientras tanto el lobo aprovechó el tiempo y corrió directo a la casa de la abuelita y tocó a la puerta. \"¿Quién es?\" preguntó la abuelita. \"Caperucita Roja,\" contestó el lobo. \"Traigo pastel y vino. Ábreme, por favor.\" - \"Mueve la cerradura y abre tú,\" gritó la abuelita, \"estoy muy débil y no me puedo levantar.\" El lobo movió la cerradura, abrió la puerta, y sin decir una palabra más, se fue directo a la cama de la abuelita y de un bocado se la tragó. Y enseguida se puso ropa de ella, se colocó un gorro, se metió en la cama y cerró las cortinas.\r\n\r\nMientras tanto, Caperucita Roja se había quedado colectando flores, y cuando vio que tenía tantas que ya no podía llevar más, se acordó de su abuelita y se puso en camino hacia ella. Cuando llegó, se sorprendió al encontrar la puerta abierta, y al entrar a la casa, sintió tan extraño presentimiento que se dijo para sí misma: \"¡Oh Dios! que incómoda me siento hoy, y otras veces que me ha gustado tanto estar con abuelita.\" Entonces gritó: \"¡Buenos días!,\" pero no hubo respuesta, así que fue al dormitorio y abrió las cortinas. Allí parecía estar la abuelita con su gorro cubriéndole toda la cara, y con una apariencia muy extraña. \"¡!Oh, abuelita!\" dijo, \"qué orejas tan grandes que tienes.\" - \"Es para oírte mejor, mi niña,\" fue la respuesta. \"Pero abuelita, qué ojos tan grandes que tienes.\" - \"Son para verte mejor, querida.\" - \"Pero abuelita, qué brazos tan grandes que tienes.\" - \"Para abrazarte mejor.\" - \"Y qué boca tan grande que tienes.\" - \"Para comerte mejor.\" Y no había terminado de decir lo anterior, cuando de un salto salió de la cama y se tragó también a Caperucita Roja.\r\n\r\nEntonces el lobo decidió hacer una siesta y se volvió a tirar en la cama, y una vez dormido empezó a roncar fuertemente. Un cazador que por casualidad pasaba en ese momento por allí, escuchó los fuertes ronquidos y pensó, ¡Cómo ronca esa viejita! Voy a ver si necesita alguna ayuda. Entonces ingresó al dormitorio, y cuando se acercó a la cama vio al lobo tirado allí. \"¡Así que te encuentro aquí, viejo pecador!\" dijo él.\"¡Hacía tiempo que te buscaba!\" Y ya se disponía a disparar su arma contra él, cuando pensó que el lobo podría haber devorado a la viejita y que aún podría ser salvada, por lo que decidió no disparar. En su lugar tomó unas tijeras y empezó a cortar el vientre del lobo durmiente. En cuanto había hecho dos cortes, vio brillar una gorrita roja, entonces hizo dos cortes más y la pequeña Caperucita Roja salió rapidísimo, gritando: \"¡Qué asustada que estuve, qué oscuro que está ahí dentro del lobo!,\" y enseguida salió también la abuelita, vivita, pero que casi no podía respirar. Rápidamente, Caperucita Roja trajo muchas piedras con las que llenaron el vientre del lobo. Y cuando el lobo despertó, quizo correr e irse lejos, pero las piedras estaban tan pesadas que no soportó el esfuerzo y cayó muerto.\r\n\r\nLas tres personas se sintieron felices. El cazador le quitó la piel al lobo y se la llevó a su casa. La abuelita comió el pastel y bebió el vino que le trajo Caperucita Roja y se reanimó. Pero Caperucita Roja solamente pensó: \"Mientras viva, nunca me retiraré del sendero para internarme en el bosque, cosa que mi madre me había ya prohibido hacer.\"\r\n', 'Solicito ganado', 2, 1),
(3, '2018-11-03', 5, 'La victoria ', 'Monte verde', 2, 1, '¡Qué hermosa estaba la campiña! Había llegado el verano: el trigo estaba amarillo; la avena, verde; la hierba de los prados, cortada ya, quedaba recogida en los pajares, en cuyos tejados se paseaba la cigüeña, con sus largas patas rojas, hablando en egipcio, que era la lengua que le enseñara su madre. Rodeaban los campos y prados grandes bosques, y entre los bosques se escondían lagos profundos. ¡Qué hermosa estaba la campiña! Bañada por el sol levantábase una mansión señorial, rodeada de hondos canales, y desde el muro hasta el agua crecían grandes plantas trepadoras formando una bóveda tan alta que dentro de ella podía estar de pie un niño pequeño, mas por dentro estaba tan enmarañado, que parecía el interior de un bosque. En medio de aquella maleza, una gansa, sentada en el nido, incubaba sus huevos. Estaba ya impaciente, pues ¡tardaban tanto en salir los polluelos, y recibía tan pocas visitas!\r\nLos demás patos preferían nadar por los canales, en vez de entrar a hacerle compañía y charlar un rato.\r\nPor fin empezaron a abrirse los huevos, uno tras otro. «¡Pip, pip!», decían los pequeños; las yemas habían adquirido vida y los patitos asomaban la cabecita por la cáscara rota.\r\n- ¡cuac, cuac! - gritaban con todas sus fuerzas, mirando a todos lados por entre las verdes hojas. La madre los dejaba, pues el verde es bueno para los ojos.\r\n- ¡Qué grande es el mundo! -exclamaron los polluelos, pues ahora tenían mucho más sitio que en el interior del huevo.\r\n- ¿Creéis que todo el mundo es esto? -dijo la madre-. Pues andáis muy equivocados. El mundo se extiende mucho más lejos, hasta el otro lado del jardín, y se mete en el campo del cura, aunque yo nunca he estado allí. ¿Estáis todos? -prosiguió, incorporándose-. Pues no, no los tengo todos; el huevo gordote no se ha abierto aún. ¿Va a tardar mucho? ¡Ya estoy hasta la coronilla de tanto esperar!\r\n- Bueno, ¿qué tal vamos? -preguntó una vieja gansa que venía de visita.', 'BlackBerry', 8, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` text COLLATE utf8_spanish_ci NOT NULL,
  `usuario` text COLLATE utf8_spanish_ci NOT NULL,
  `password` text COLLATE utf8_spanish_ci NOT NULL,
  `email` text COLLATE utf8_spanish_ci NOT NULL,
  `perfil` text COLLATE utf8_spanish_ci NOT NULL,
  `foto` text COLLATE utf8_spanish_ci NOT NULL,
  `estado` int(11) NOT NULL,
  `ultimo_login` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `usuario`, `password`, `email`, `perfil`, `foto`, `estado`, `ultimo_login`) VALUES
(1, 'Isaac Sibaja', 'isaacsibaja', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', 'isibaja@outlook.com', 'Administrador', 'vistas/img/usuarios/isaacsibaja/711.jpg', 1, '2019-01-10 20:17:58'),
(2, 'Didier Rodríguez', 'drodriguez', '$2a$07$asxx54ahjppf45sd87a5auGZEtGHuyZwm.Ur.FJvWLCql3nmsMbXy', '', 'Usuario', 'vistas/img/usuarios/drodriguez/143.png', 1, '2019-01-11 04:03:35');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `instituto`
--
ALTER TABLE `instituto`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `labores`
--
ALTER TABLE `labores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `oficios`
--
ALTER TABLE `oficios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEstado` (`idEstado`);

--
-- Indices de la tabla `tipotramite`
--
ALTER TABLE `tipotramite`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tramites`
--
ALTER TABLE `tramites`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idEstado` (`idEstado`),
  ADD KEY `idUsuario` (`idUsuario`),
  ADD KEY `idSolicitante` (`idCliente`),
  ADD KEY `idTipoTramite` (`idTipoTramite`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `instituto`
--
ALTER TABLE `instituto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `labores`
--
ALTER TABLE `labores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `oficios`
--
ALTER TABLE `oficios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tipotramite`
--
ALTER TABLE `tipotramite`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tramites`
--
ALTER TABLE `tramites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `oficios`
--
ALTER TABLE `oficios`
  ADD CONSTRAINT `oficios_ibfk_1` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `tramites`
--
ALTER TABLE `tramites`
  ADD CONSTRAINT `tramites_ibfk_1` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tramites_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuarios` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tramites_ibfk_3` FOREIGN KEY (`idEstado`) REFERENCES `estados` (`id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `tramites_ibfk_4` FOREIGN KEY (`idTipoTramite`) REFERENCES `tipotramite` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

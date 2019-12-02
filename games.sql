-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-12-2019 a las 00:40:21
-- Versión del servidor: 10.4.8-MariaDB
-- Versión de PHP: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `games`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `desarrolladora`
--

CREATE TABLE `desarrolladora` (
  `idDes` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `Fec_creacion` date NOT NULL,
  `poster` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `desarrolladora`
--

INSERT INTO `desarrolladora` (`idDes`, `nombre`, `Fec_creacion`, `poster`) VALUES
(1, 'From Software', '2019-11-15', ''),
(2, 'Blizzard', '2019-11-01', ''),
(3, 'Platinum Games', '2009-12-02', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `titulo`
--

CREATE TABLE `titulo` (
  `idVid` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `descripcion` text COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `genero` varchar(255) COLLATE utf8mb4_spanish2_ci DEFAULT NULL,
  `img` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fec_Creacion` date NOT NULL,
  `idDes` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `titulo`
--

INSERT INTO `titulo` (`idVid`, `nombre`, `descripcion`, `genero`, `img`, `fec_Creacion`, `idDes`) VALUES
(2, 'Starcraft 2', 'StarCraft II: Legacy of the Void para PC es el capítulo final de StarCraft II, en el que asumimos el control de la última raza, los Protoss. Esta especie alienígena de alta tecnología tendrá que enfrentarse a los Zerg y a los Terran por el control del universo.\r\nTambién conocido como StarCraft 2: Legacy of the Void, StarCraft 2, StarCraft II.', 'Estrategia', 'https://media.vandal.net/m/9604/starcraft-ii-legacy-of-the-void-20151111113556_1.jpg', '2014-11-21', 2),
(3, 'Diablo 3', 'Diablo III es un videojuego de rol de acción, desarrollado por Blizzard Entertainment. Ésta es la continuación de Diablo II y la tercera parte de la serie que fue creada por la compañía estadounidense Blizzard. Su temática es de fantasía oscura y terrorífica.', 'ARPG', 'https://media.vandal.net/m/22025/diablo-iii-reaper-of-souls-201312209255_1.jpg', '2010-11-20', 2),
(5, 'Dark Souls', NULL, NULL, 'https://media.vandal.net/m/13239/201161811023_1.jpg', '2011-02-11', 1),
(6, 'Warcraft 3', NULL, NULL, 'https://media.vandal.net/m/960/warcraft-3-201610722230_1.jpg', '2002-07-05', 2),
(7, 'Dark Souls 2', 'Dark Souls II, sigue la estela del primer título de la saga para ofrecernos altas dosis de acción en este desafiante RPG. Este juego conserva las bases jugables de su antecesor aunque también incorpora novedades como la libertad de exploración, que permitirá al jugador organizar las misiones a su antojo. Se trata de una secuela continuista que parte del primer título y que promete mantener el nivel de dificultad que caracteriza a los juegos de FromSoftware pese a la incorporación de elementos como los viajes rápidos o el aumento de elementos para recuperar salud.\r\nTambién conocido como Dark Souls 2.', NULL, 'https://media.vandal.net/m/20225/201354114627_1.jpg', '2014-04-25', 1),
(8, 'Dark Souls 3', 'Dark Souls 3 es la tercera entrega de la saga Dark Souls para PC, Xbox One y PS4, que combina elementos de los juegos de aventura y acción y tercera persona, con tintes de rol para mejorar a nuestro personaje. El tercer capítulo de la serie de títulos de From Software será el primero en ser desarrollado íntegramente en consolas como Xbox One y PlayStation 4. En esta nueva entrega, visitaremos el oscuro y amplio reino de Lothric, aprenderemos nuevas habilidades vinculadas a las armas que empuñemos y combatiremos contra duras y ásperas criaturas, que en esta ocasión serán más peligrosas y rápidas que nunca.', NULL, 'https://media.vandal.net/m/31456/dark-souls-iii-2016412115126_1.jpg', '2016-04-12', 1),
(9, 'Bloodborne', 'Bloodborne es un juego exclusivo de From Software, diseñado por Hidetaka Miyazaki, creador de Dark Souls y Demon\'s Souls. Como éstos, es un título de acción y rol en el que priman los enfrentamientos contra complicados enemigos que nos pondrán en apuros. La ambientación es entre gótica y apocalíptica, llevándonos a un mundo steampunk con armas de fuego y criaturas fantásticas.', NULL, 'https://media.vandal.net/m/24302/bloodborne-2015412031_1.jpg', '2015-03-25', 1),
(10, 'Overwatch', 'Es la nueva saga de Blizzard esta vez en forma de multijugador online en primera persona ambientado en un mundo futurista. Habrá muchos personajes distintos y cada uno de ellos hará uso de sus propias armas y amplificadores. Destacar que cada uno de ellos cumplirá un rol diferente dentro del equipo, como Defensa, Tanque, Apoyo y Ataque.\r\nTambién conocido como Overwatch Origins.', 'Shooter', 'https://media.vandal.net/m/26638/overwatch-201652410444_1.jpg', '2016-04-24', 2),
(11, 'World of Warcraft', 'World of Warcraft: Juego de rol masivo online de Blizzard, que lleva a los jugadores al mundo de Draenor, hogar de los orcos antes de su destrucción. Garrosh Hellscream vuelve atrás en el tiempo a este reino, y crea una nueva línea temporal. Tendremos que sobrevivir en este nuevo mundo, con nuevos enemigos y posibilidades, entre ellas la posibilidad de crear nuestras propias fortificaciones.\r\nSagas relacionadas:', 'MMORPG', 'https://media.vandal.net/t200/2103/world-of-warcraft-201424125210_1.jpg', '2005-11-02', 2),
(12, 'Diablo 2', 'Diablo II es un videojuego de rol de acción. Fue lanzado para Windows y Mac OS en el año 2000 por Blizzard Entertainment, y fue desarrollado por Blizzard North. Es la secuela directa del exitoso juego de PC de 1996, Diablo. Diablo II fue uno de los juegos más populares del año 2000.​', 'RPG', 'https://media.vandal.net/m/29230/diablo-ii-lord-of-destruction-201982320321611_1.jpg', '2001-06-27', 2),
(13, 'Bayonetta', NULL, 'Acción', 'https://media.vandal.net/m/8886/2010112135534_1.jpg', '2012-12-10', 3),
(14, 'Bayonetta 2', 'Bayonetta 2 para WiiU nos presenta la secuela del primer título de la saga. En exclusiva para la consola de Nintendo, el juego permitirá el juego interactuando con la pantalla táctil del pad de WiiU además de soportar el sistema Off-TV Play. Según Platinum Games, desarrolladores del título, este hack’n’slash aportará una jugabilidad frenética y basada en la originalidad de forma muy fluida aunque el jugador eligirá entre el control clásico o táctil. Además de eso el juego también incorpora una nueva y misteriosa compañera y el modo multijugador.', 'Acción', 'https://media.vandal.net/m/16749/bayonetta-2-20149501142_14.jpg', '2016-12-24', 3),
(15, 'Nier Automata', 'NieR: Automata es un videojuego de acción - rol y aventura en tercera persona, que ha sido producido por Square Enix y desarrollado por Platinum Games para PlayStation 4 y PC.\r\n\r\nEl juego se ambienta en una tierra devastada y mostrará los intensos combates que tienen lugar entre las unidades androide Yorha, creadas por los humanos, contra una serie de seres biomecánicos alienígenas que obligan a la humanidad a abandonar la Tierra y huir hacia la luna. El diseño de los personajes corre a cabo del creativo japonés Akihiko Yoshida, conocido por haber participado regularmente en las entregas de Final Fantasy.', 'Acción', 'https://media.vandal.net/m/31670/nier-automata-201739151954_1.jpg', '2017-12-13', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsu` int(11) NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `apellidos` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `pass` varchar(32) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fec_nacimiento` date DEFAULT NULL,
  `foto` varchar(255) COLLATE utf8mb4_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idUsu`, `email`, `nombre`, `apellidos`, `pass`, `fec_nacimiento`, `foto`) VALUES
(17, '', '', '', '', NULL, ''),
(20, 'pepe@pepe.com', 'pepe', 'pepe', '926e27eecdbc7a18858b3798ba99bddd', NULL, ''),
(21, 'pepi@pepe.com', 'pepi', 'pepi', 'dd07de8561395a7c37f8fcc1752d45e1', '0222-02-22', ''),
(30, 'prueba@gmail.com', 'pepi', 'pepi', '044b1085f2a5e087eef130d434f0dd8a', '1111-11-11', ''),
(37, 'blanco@hotmail.com', 'tete', 'tete', '926e27eecdbc7a18858b3798ba99bddd', '1999-12-12', ''),
(38, 'ladron_deguante_blanco@hotmail.com', 'ale', 'ale', 'f7a3803365a55b197a3b43bc64aacc13', '1999-03-31', '');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `desarrolladora`
--
ALTER TABLE `desarrolladora`
  ADD PRIMARY KEY (`idDes`);

--
-- Indices de la tabla `titulo`
--
ALTER TABLE `titulo`
  ADD PRIMARY KEY (`idVid`),
  ADD KEY `fk_desarrolladora` (`idDes`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsu`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `desarrolladora`
--
ALTER TABLE `desarrolladora`
  MODIFY `idDes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `titulo`
--
ALTER TABLE `titulo`
  MODIFY `idVid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `titulo`
--
ALTER TABLE `titulo`
  ADD CONSTRAINT `fk_desarrolladora` FOREIGN KEY (`idDes`) REFERENCES `desarrolladora` (`idDes`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;

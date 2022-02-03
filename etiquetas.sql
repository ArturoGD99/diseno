/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE TABLE `cat_etiquetas` (
  `id_CAT_ETIQUETA` int(11) NOT NULL AUTO_INCREMENT,
  `nombre_cli` varchar(40) NOT NULL,
  `nmarca` varchar(40) NOT NULL,
  `etiq_camp` varchar(50) NOT NULL,
  `tipo` varchar(30) NOT NULL,
  `padre` int(11) NOT NULL,
  `hijo` int(11) NOT NULL,
  `identificador` int(11) NOT NULL,
  `status` int(1) NOT NULL,
  PRIMARY KEY (`id_CAT_ETIQUETA`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4;

CREATE TABLE `etiquetas` (
  `id_etiqueta` int(11) NOT NULL AUTO_INCREMENT,
  `id_ficha` int(11) NOT NULL,
  `id_CAT_ETIQUETA` int(11) NOT NULL,
  `campo1` varchar(50) DEFAULT NULL,
  `campo2` varchar(50) DEFAULT NULL,
  `campo3` varchar(50) DEFAULT NULL,
  `campo4` varchar(50) DEFAULT NULL,
  `campo5` varchar(50) DEFAULT NULL,
  `campo6` varchar(50) DEFAULT NULL,
  `campo7` varchar(50) DEFAULT NULL,
  `campo8` varchar(50) DEFAULT NULL,
  `campo9` varchar(50) DEFAULT NULL,
  `campo10` varchar(50) DEFAULT NULL,
  `campo11` varchar(50) DEFAULT NULL,
  `campo12` varchar(50) DEFAULT NULL,
  `campo13` varchar(50) DEFAULT NULL,
  `campo14` varchar(50) DEFAULT NULL,
  `campo15` varchar(50) DEFAULT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`id_etiqueta`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4;

INSERT INTO `cat_etiquetas` (`id_CAT_ETIQUETA`, `nombre_cli`, `nmarca`, `etiq_camp`, `tipo`, `padre`, `hijo`, `identificador`, `status`) VALUES
(1, 'WALLMART', 'ILUSION', 'ETIQ1', 'Monarch', 1, 0, 1, 1);
INSERT INTO `cat_etiquetas` (`id_CAT_ETIQUETA`, `nombre_cli`, `nmarca`, `etiq_camp`, `tipo`, `padre`, `hijo`, `identificador`, `status`) VALUES
(2, 'WALLMART', 'ILUSION', 'CAMPO1', 'Monarch', 0, 1, 1, 1);
INSERT INTO `cat_etiquetas` (`id_CAT_ETIQUETA`, `nombre_cli`, `nmarca`, `etiq_camp`, `tipo`, `padre`, `hijo`, `identificador`, `status`) VALUES
(3, 'WALLMART', 'ILUSION', 'CAMPO2', 'Monarch', 0, 1, 1, 1);
INSERT INTO `cat_etiquetas` (`id_CAT_ETIQUETA`, `nombre_cli`, `nmarca`, `etiq_camp`, `tipo`, `padre`, `hijo`, `identificador`, `status`) VALUES
(4, 'WALLMART', 'ILUSION', 'CAMPO3', 'Monarch', 0, 1, 1, 1),
(5, 'WALLMART', 'ILUSION', 'ETIQ2', 'Precio', 1, 0, 5, 1),
(6, 'WALLMART', 'ILUSION', 'CAMPO1', 'Precio', 0, 1, 5, 1),
(7, 'WALLMART', 'ILUSION', 'CAMPO2', 'Precio', 0, 1, 5, 1),
(8, 'WALLMART', 'ILUSION', 'CAMPO3', 'Precio', 0, 1, 5, 1);

INSERT INTO `etiquetas` (`id_etiqueta`, `id_ficha`, `id_CAT_ETIQUETA`, `campo1`, `campo2`, `campo3`, `campo4`, `campo5`, `campo6`, `campo7`, `campo8`, `campo9`, `campo10`, `campo11`, `campo12`, `campo13`, `campo14`, `campo15`, `status`) VALUES
(1, 252, 1, 'CAMPO1', 'CAMPO2', 'CAMPO3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);
INSERT INTO `etiquetas` (`id_etiqueta`, `id_ficha`, `id_CAT_ETIQUETA`, `campo1`, `campo2`, `campo3`, `campo4`, `campo5`, `campo6`, `campo7`, `campo8`, `campo9`, `campo10`, `campo11`, `campo12`, `campo13`, `campo14`, `campo15`, `status`) VALUES
(2, 252, 1, 'pr1', 'pr1', 'pr1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);
INSERT INTO `etiquetas` (`id_etiqueta`, `id_ficha`, `id_CAT_ETIQUETA`, `campo1`, `campo2`, `campo3`, `campo4`, `campo5`, `campo6`, `campo7`, `campo8`, `campo9`, `campo10`, `campo11`, `campo12`, `campo13`, `campo14`, `campo15`, `status`) VALUES
(3, 252, 1, 'pr2', 'pr2', 'pr2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);
INSERT INTO `etiquetas` (`id_etiqueta`, `id_ficha`, `id_CAT_ETIQUETA`, `campo1`, `campo2`, `campo3`, `campo4`, `campo5`, `campo6`, `campo7`, `campo8`, `campo9`, `campo10`, `campo11`, `campo12`, `campo13`, `campo14`, `campo15`, `status`) VALUES
(4, 252, 1, 'pr3', 'pr3', 'pr3', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0);


/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
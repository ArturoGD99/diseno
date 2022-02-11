CREATE TABLE CAT_ETIQUETAS(
ID_CAT_ETIQUETA int not null primary key auto_increment,
ID_CLIENTE int not null,
ID_MARCA int not null,
NOMBRE varchar(50) not null,
PADRE int not null,
HIJO int not null,
IDENTIFICADOR int not null,
STATUS int(1) not null);

INSERT INTO `cat_etiquetas` (`id_CAT_ETIQUETA`, `id_cliente`, `id_marca`, `NOMBRE`, `padre`, `hijo`, `identificador`, `status`) VALUES
(1, 19, 42, 'ETIQMona19', 1, 0, 0, 1);

INSERT INTO `cat_etiquetas` (`id_CAT_ETIQUETA`, `id_cliente`, `id_marca`, `NOMBRE`, `padre`, `hijo`, `identificador`, `status`) VALUES
(2, 19, 42, 'Codigo Int', 0, 1, 1, 1);

INSERT INTO `cat_etiquetas` (`id_CAT_ETIQUETA`, `id_cliente`, `id_marca`, `NOMBRE`, `padre`, `hijo`, `identificador`, `status`) VALUES
(3, 19, 42, 'Cero', 0, 1, 1, 1);

INSERT INTO `cat_etiquetas` (`id_CAT_ETIQUETA`, `id_cliente`, `id_marca`, `NOMBRE`, `padre`, `hijo`, `identificador`, `status`) VALUES
(4, 19, 42, 'Modelo', 0, 1, 1, 1);

INSERT INTO `cat_etiquetas` (`id_CAT_ETIQUETA`, `id_cliente`, `id_marca`, `NOMBRE`, `padre`, `hijo`, `identificador`, `status`) VALUES
(5, 19, 42, 'Codigos', 0, 1, 1, 1);

INSERT INTO `cat_etiquetas` (`id_CAT_ETIQUETA`, `id_cliente`, `id_marca`, `NOMBRE`, `padre`, `hijo`, `identificador`, `status`) VALUES
(6, 19, 42, 'Composicion 1', 0, 1, 1, 1);

INSERT INTO `cat_etiquetas` (`id_CAT_ETIQUETA`, `id_cliente`, `id_marca`, `NOMBRE`, `padre`, `hijo`, `identificador`, `status`) VALUES
(7, 19, 42, 'Composicion2', 0, 1, 1, 1);

INSERT INTO `cat_etiquetas` (`id_CAT_ETIQUETA`, `id_cliente`, `id_marca`, `NOMBRE`, `padre`, `hijo`, `identificador`, `status`) VALUES
(8, 19, 42, 'Composicion 3', 0, 1, 1, 1);

INSERT INTO `cat_etiquetas` (`id_CAT_ETIQUETA`, `id_cliente`, `id_marca`, `NOMBRE`, `padre`, `hijo`, `identificador`, `status`) VALUES
(9, 19, 42, 'Composicion 4', 0, 1, 1, 1);

INSERT INTO `cat_etiquetas` (`id_CAT_ETIQUETA`, `id_cliente`, `id_marca`, `NOMBRE`, `padre`, `hijo`, `identificador`, `status`) VALUES
(10, 19, 42, 'Tallas', 0, 1, 1, 1);

INSERT INTO `cat_etiquetas` (`id_CAT_ETIQUETA`, `id_cliente`, `id_marca`, `NOMBRE`, `padre`, `hijo`, `identificador`, `status`) VALUES
(11, 19, 42, 'Cantidad', 0, 1, 1, 1);

INSERT INTO `cat_etiquetas` (`id_CAT_ETIQUETA`, `id_cliente`, `id_marca`, `NOMBRE`, `padre`, `hijo`, `identificador`, `status`) VALUES
(13, 19, 42, 'EtiqPrec19', 1, 0, 0, 1);

INSERT INTO `cat_etiquetas` (`id_CAT_ETIQUETA`, `id_cliente`, `id_marca`, `NOMBRE`, `padre`, `hijo`, `identificador`, `status`) VALUES
(14, 19, 42, 'Cero', 0, 1, 12, 1);

INSERT INTO `cat_etiquetas` (`id_CAT_ETIQUETA`, `id_cliente`, `id_marca`, `NOMBRE`, `padre`, `hijo`, `identificador`, `status`) VALUES
(15, 19, 42, 'Model', 0, 1, 12, 1);

INSERT INTO `cat_etiquetas` (`id_CAT_ETIQUETA`, `id_cliente`, `id_marca`, `NOMBRE`, `padre`, `hijo`, `identificador`, `status`) VALUES
(16, 19, 42, 'Codigos', 0, 1, 12, 1);

INSERT INTO `cat_etiquetas` (`id_CAT_ETIQUETA`, `id_cliente`, `id_marca`, `NOMBRE`, `padre`, `hijo`, `identificador`, `status`) VALUES
(17, 19, 42, 'Descripcion', 0, 1, 12, 1);

INSERT INTO `cat_etiquetas` (`id_CAT_ETIQUETA`, `id_cliente`, `id_marca`, `NOMBRE`, `padre`, `hijo`, `identificador`, `status`) VALUES
(18, 19, 42, 'Seccion', 0, 1, 12, 1);

INSERT INTO `cat_etiquetas` (`id_CAT_ETIQUETA`, `id_cliente`, `id_marca`, `NOMBRE`, `padre`, `hijo`, `identificador`, `status`) VALUES
(19, 19, 42, 'Semana', 0, 1, 12, 1);

INSERT INTO `cat_etiquetas` (`id_CAT_ETIQUETA`, `id_cliente`, `id_marca`, `NOMBRE`, `padre`, `hijo`, `identificador`, `status`) VALUES
(20, 19, 42, 'Mes', 0, 1, 12, 1);

INSERT INTO `cat_etiquetas` (`id_CAT_ETIQUETA`, `id_cliente`, `id_marca`, `NOMBRE`, `padre`, `hijo`, `identificador`, `status`) VALUES
(21, 19, 42, 'Precio', 0, 1, 12, 1);

INSERT INTO `cat_etiquetas` (`id_CAT_ETIQUETA`, `id_cliente`, `id_marca`, `NOMBRE`, `padre`, `hijo`, `identificador`, `status`) VALUES
(22, 19, 42, 'Tallas', 0, 1, 12, 1);

INSERT INTO `cat_etiquetas` (`id_CAT_ETIQUETA`, `id_cliente`, `id_marca`, `NOMBRE`, `padre`, `hijo`, `identificador`, `status`) VALUES
(23, 19, 42, 'Cantidad', 0, 1, 12, 1);

CREATE TABLE ETIQUETAS(
ID_ETIQUETA int not null primary key auto_increment,
ID_FICHA int not null,
ID_CAT_ETIQUETA int not null,
CAMPO1 varchar(50),
CAMPO2 varchar(50),
CAMPO3 varchar(50),
CAMPO4 varchar(50),
CAMPO5 varchar(50),
CAMPO6 varchar(50),
CAMPO7 varchar(50),
CAMPO8 varchar(50),
CAMPO9 varchar(50),
CAMPO10 varchar(50),
CAMPO11 varchar(50),
CAMPO12 varchar(50),
CAMPO13 varchar(50),
CAMPO14 varchar(50),
CAMPO15 varchar(50),
STATUS int not null);

INSERT INTO `etiquetas` (`ID_ETIQUETA`, `ID_FECHA`, `ID_CAT_ETIQUETA`, `campo1`, `campo2`, `campo3`, `campo4`, `campo5`, `campo6`, `campo7`, `campo8`, `campo9`, `campo10`) VALUES
(1, 5, 1, 'Codigo Int', 'Cero', 'Modelo', 'Códigos', 'Composicion1', 'Composicion2', 'Composicion3', 'Composicion4', 'Tallas', 'Cantidad');

INSERT INTO `etiquetas` (`id_etiqueta`, `id_ficha`, `id_CAT_ETIQUETA`, `campo1`, `campo3`, `campo4`, `campo6`, `campo7`, `campo9`, `campo10`) VALUES
(2, 5, 1, 'G021A11334', '4022', '750638852341', 'BASE', '100 % poliéster', 'CH', '6');

INSERT INTO `etiquetas` (`id_etiqueta`, `id_ficha`, `id_CAT_ETIQUETA`, `campo1`, `campo3`, `campo4`, `campo6`, `campo7`, `campo9`, `campo10`) VALUES
(3, 5, 1, 'G021A11334', '4022', '750638852341', 'BASE', '100 % poliéste', 'M', '6');

INSERT INTO `etiquetas` (`id_etiqueta`, `id_ficha`, `id_CAT_ETIQUETA`, `campo1`, `campo3`, `campo4`, `campo6`, `campo7`, `campo9`, `campo10`) VALUES
(4, 5, 1, 'G021A11334', '4022', '750638852341', 'BASE', '100 % poliéste', 'G', '6');

INSERT INTO `etiquetas` (`id_etiqueta`, `id_ficha`, `id_CAT_ETIQUETA`, `campo1`, `campo3`, `campo4`, `campo6`, `campo7`, `campo9`, `campo10`) VALUES
(5, 5, 1, 'G021A11334', '4022', '750638852341', 'BASE', '100 % poliéste', 'EG', '6');

INSERT INTO `etiquetas` (`id_etiqueta`, `id_ficha`, `id_CAT_ETIQUETA`, `campo1`, `campo2`, `campo3`, `campo4`, `campo5`, `campo6`, `campo7`, `campo8`, `campo9`, `campo10`) VALUES
(6, 5, 12, 'Cero', 'Model', 'Codigos', 'Descripcion', 'Seccion', 'Semana', 'Mes', 'Precio', 'Tallas', 'Cantidad');

INSERT INTO `etiquetas` (`id_etiqueta`, `id_ficha`, `id_CAT_ETIQUETA`, `campo2`, `campo3`, `campo4`, `campo5`, `campo6`, `campo7`, `campo8`, `campo9`, `campo10`) VALUES
(7, 5, 12, '1750', '750024331750', 'PLAYERA', '33', '36', '10-2018', '118.00', '12', '6');

INSERT INTO `etiquetas` (`id_etiqueta`, `id_ficha`, `id_CAT_ETIQUETA`, `campo2`, `campo3`, `campo4`, `campo5`, `campo6`, `campo7`, `campo8`, `campo9`, `campo10`) VALUES
(8, 5, 12, '1750', '750024331750', 'PLAYERA', '33', '36', '10-2018', '118.00', '14', '6');

INSERT INTO `etiquetas` (`id_etiqueta`, `id_ficha`, `id_CAT_ETIQUETA`, `campo2`, `campo3`, `campo4`, `campo5`, `campo6`, `campo7`, `campo8`, `campo9`, `campo10`) VALUES
(9, 5, 12, '1750', '750024331750', 'PLAYERA', '33', '36', '10-2018', '118.00', '16', '6');

INSERT INTO `etiquetas` (`id_etiqueta`, `id_ficha`, `id_CAT_ETIQUETA`, `campo2`, `campo3`, `campo4`, `campo5`, `campo6`, `campo7`, `campo8`, `campo9`, `campo10`) VALUES
(10, 5, 12, '1750', '750024331750', 'PLAYERA', '33', '36', '10-2018', '118.00', '16X', '6');
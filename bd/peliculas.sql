CREATE DATABASE IF NOT EXISTS peliculas;

USE `peliculas`;

SET foreign_key_checks = 0;

DROP TABLE IF EXISTS `actor`;

CREATE TABLE `actor` (
  `idActor` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) DEFAULT NULL,
  `nacionalidad` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`idActor`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

INSERT INTO `actor` VALUES (1,"George Clooney","USA"),
(2,"Christian Bale","BritanicoEstadounide"),
(3,"Edward John David Redmayne","inglaterra"),
(4,"Margot Robbie","australiana"),
(5,"Michael Keaton","USA"),
(6,"Ben Affleck","USA"),
(7,"Henry Cavill","britanico"),
(8,"Gal Gadot","Israel"),
(9,"Jason Momoa","USA"),
(10,"Vin Diesel","USA"),
(11,"Mark Ruffalo","USA"),
(12,"Robert Downey Jr.","USA"),
(13,"Robert Downey Jr.","USA"),
(14,"Hugh Jackman","Australia"),
(15,"Will Smith","USA"),
(16,"Johnny Depp","USA"),
(17,"Will Smith","USA"),
(18,"Chris Pratt","USA"),
(19,"Christian Bale","Reino Unido");


DROP TABLE IF EXISTS `director`;

CREATE TABLE `director` (
  `idDirector` int(11) NOT NULL AUTO_INCREMENT,
  `nombreDirector` varchar(30) DEFAULT NULL,
  `fechaNacimiento` date DEFAULT NULL,
  `pais` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`idDirector`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4;

INSERT INTO `director` VALUES (1,"Joel Schumacher","1939-08-29","USA"),
(2,"Christopher Nolan","1970-07-30","BritanicoEstadounidense"),
(3,"David Yates","1963-11-30","inglaterrra"),
(4,"David Ayer","1968-01-18","USA"),
(5,"Tim Burton","1958-08-25","USA"),
(6,"Zack Snyder","1966-03-01","USA"),
(7,"Zack Snyder","1966-03-01","USA"),
(8,"Patty Jenkins","1971-06-23","USA"),
(9,"James Wan","1979-02-27","USA"),
(10,"Justin Lin","1973-07-17","USA"),
(11,"Louis Leterrier","1973-06-17","Francia"),
(12,"Joss Whedon","1964-06-23","USA"),
(13,"Anthony Russo","1970-02-03","USA"),
(14,"Tom Hooper","1972-10-05","londres"),
(15,"Barry Sonnenfeld","1953-04-01","USA"),
(16,"Gore Verbinski","1964-03-16","USA"),
(17,"Peter Berg","1964-03-11","USA"),
(18,"James Gunn","1966-08-05","USA"),
(19,"Christopher Nolan","1970-07-30","londes");


DROP TABLE IF EXISTS `pelicula`;

CREATE TABLE `pelicula` (
  `idPelicula` int(11) NOT NULL AUTO_INCREMENT,
  `nombrePelicula` varchar(150) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `nacionalidad` varchar(30) DEFAULT NULL,
  `idioma` varchar(15) DEFAULT NULL,
  `ColorPelicula` varchar(20) DEFAULT NULL,
  `Clasificacion` varchar(30) DEFAULT NULL,
  `sinopsis` text DEFAULT NULL,
  `estatus` int(1) NOT NULL,
  PRIMARY KEY (`idPelicula`)
) ENGINE=InnoDB AUTO_INCREMENT=27 DEFAULT CHARSET=utf8mb4;

INSERT INTO `pelicula` VALUES (1,"Lego Batman 2","0000-00-00","USA","Ingles","color","PG-13","Batichica se une a los cruzados impedir que Señor Frio  terrible venganza\t\t\t\t\t",1),
(3,"animales fantasticos","0000-00-00","usa","ingles","color","PG-13","En algún lugar de Europa, unos Aurores se encuentran a la caza de alguien",1),
(4,"suicide squad","0000-00-00","usa","ingles","color","PG-13","Floyd Lawton entrena con un saco de boxeo hasta que el capitán Griggs lo interrumpe para traerle comida",1),
(5,"Batman return","0000-00-00","USA","ingles","color","PG-13","El súper héroe de la capa negra se enfrenta Ciudad Gótica de los malévolos planes del Pingüino.",1),
(6,"la liga de la justicia","0000-00-00","USA,","ingles","color","PG-13","Gracias a su renovada fe en la humanidad e inspirado por el acto de altruísmo de Superman,",1),
(7,"Batman y superman","0000-00-00","USA","ingles","color","PG-13","Batman se enfrenta a Superman, temeroso de que su afán de poder termine nublando",1),
(8,"La mujer maravilla 2","0000-00-00","Francia","frances","b/n","PG-18","Diana, hija de dioses y princesa de las amazonas, nunca ha salido de su isla. \t\t\t\t\t",1),
(9,"Aquaman","0000-00-00","USA","Ingles","color","PG-13","Aquaman debe recuperar el legendario Tridente de Atlan para salvar a la ciudad subacuática de Atlantis",1),
(12,"Avengers: era de ultrón","0000-00-00","USA","Ingles","color","PG-13","El director de la Agencia SHIELD decide reclutar a un equipo para salvar al mundo",1),
(13,"Infinity war","0000-00-00","USA","Ingles","Color","PG-13","Los superhéroes se alían para vencer al poderoso Thanos, el peor enemigo al que se han enfrentado",1),
(14,"los miserables","0000-00-00","Francia","Frances","Color","Pg-13","Después de 19 años como prisionero, Jean Valjean es liberado por Javert,",1),
(15,"Hombres de negro","0000-00-00","USA","Ingles","color","PG-13","Un policía se une a una organización secreta del gobierno actividad extraterrestre en la Tierra.",1),
(16,"Piratas del Caribe La maldició","0000-00-00","USA","Ingles","color","PG-13","Un herrero y un extraño pirata se unen para rescatar a una dama secuestrada",1),
(17,"hancock","0000-00-00","Italiana","ingles","color","PG-13","Un desaliñado superhéroe llamado Hancock (Will Smith) protege a los ciudadanos de Los Ángeles,",1),
(18,"Guardianes de la galaxia","0000-00-00","USA","ingles","color","PG-13","Un aventurero espacial se convierte en la presa de unos cazadores de tesoros",0),
(19,"Batman: el caballero de la noc","0000-00-00","USA","INGLES","COLOR","PG-13","Batman tiene que mantener el equilibrio entre el heroísmo y el vigilantismo",0),
(21,"Spiderman 3: far from home","0000-00-00","Inglaterra","Inglés","Color","B15","Tom holland creará el multiverso y luchará contra los 3 venom.\t\t\t\t",1),
(22,"Toy story 4: woody dice adiós","0000-00-00","USA","Inglés","Color","A13","Woody dejará a sus amigos por un viejo amor del pasado. Vive una aventura extraordinaria.\t\t",1),
(23,545,"0000-00-00",4554,"vdd3","33w23",4554,"bfdfdfvfvd",1),
(24,"Las locuras del emperador","0000-00-00","USA","Español","Color","A10","Cuzco es una llama que habla.",1),
(25,"vbbv","2021-10-12","vcvc","vc","vc","vc","vvc",1),
(26,"Navidad 2021","0000-00-00","Mexico","Español","Color","A10","La navidad más esperada llega a los cines",1);


SET foreign_key_checks = 1;

CREATE TABLE `anunciante` (
 `codigo` int(4) NOT NULL AUTO_INCREMENT,
 `nome` varchar(30) NOT NULL,
 `cpf` varchar(15) NOT NULL,
 `email` varchar(50) DEFAULT NULL,
 `senhaHash` varchar(100) DEFAULT NULL,
 `telefone` varchar(20) DEFAULT NULL,
 PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1; 

CREATE TABLE `anuncio` (
 `codigo` int(4) NOT NULL AUTO_INCREMENT,
 `titulo` varchar(30) NOT NULL,
 `descr` varchar(100) NOT NULL,
 `preco` decimal(10,2) NOT NULL,
 `dataHora` datetime NOT NULL,
 `cep` varchar(10) NOT NULL,
 `bairro` varchar(30) NOT NULL,
 `cidade` varchar(30) NOT NULL,
 `estado` varchar(30) NOT NULL,
 `codCategoria` int(4) NOT NULL,
 `codAnunciante` int(4) NOT NULL,
 PRIMARY KEY (`codigo`),
 KEY `codCategoria` (`codCategoria`),
 KEY `codAnunciante` (`codAnunciante`),
 CONSTRAINT `anuncio_ibfk_1` FOREIGN KEY (`codCategoria`) REFERENCES `categoria` (`codigo`),
 CONSTRAINT `anuncio_ibfk_2` FOREIGN KEY (`codAnunciante`) REFERENCES `anunciante` (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=latin1;

CREATE TABLE `categoria` (
 `codigo` int(4) NOT NULL AUTO_INCREMENT,
 `nome` varchar(50) NOT NULL,
 `descr` varchar(100) DEFAULT NULL,
 PRIMARY KEY (`codigo`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;


CREATE TABLE `enderecoAjax` (
 `cep` varchar(10) NOT NULL,
 `bairro` varchar(50) NOT NULL,
 `cidade` varchar(50) NOT NULL,
 `estado` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `foto` (
 `codAnuncio` int(4) NOT NULL,
 `nomeArqFoto` varchar(30) NOT NULL,
 KEY `codAnuncio` (`codAnuncio`),
 CONSTRAINT `foto_ibfk_1` FOREIGN KEY (`codAnuncio`) REFERENCES `anuncio` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


CREATE TABLE `interesse` (
 `codigo` int(4) NOT NULL AUTO_INCREMENT,
 `mensagem` varchar(100) NOT NULL,
 `dataHora` datetime NOT NULL,
 `contato` varchar(30) NOT NULL,
 `codAnuncio` int(4) DEFAULT NULL,
 PRIMARY KEY (`codigo`),
 KEY `codAnuncio` (`codAnuncio`),
 CONSTRAINT `interesse_ibfk_1` FOREIGN KEY (`codAnuncio`) REFERENCES `anuncio` (`codigo`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
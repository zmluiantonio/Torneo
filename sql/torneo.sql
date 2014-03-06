CREATE DATABASE torneo;
USE torneo;

CREATE TABLE empresa(
  empresa_id INT AUTO_INCREMENT,
  nombre VARCHAR(1000),
  telefono VARCHAR(15),
  pais VARCHAR(100),
  direccion VARCHAR(1000),
  descripcion VARCHAR(1000),
  rfc VARCHAR(1000),
  usr VARCHAR(20),
  pasw VARCHAR(10),
  file MEDIUMBLOB,
  PRIMARY KEY(empresa_id)
)ENGINE=MyISAM DEFAULT CHARSET = latin1;




CREATE TABLE competidor(
  proveedor_id INT AUTO_INCREMENT,
  nombre VARCHAR(100),
  pais VARCHAR(100),
  email VARCHAR(100),
  cta_bancaria VARCHAR(100),
  paypal VARCHAR(100),
  RFC VARCHAR(100),
  direccion VARCHAR(1000),
  usr VARCHAR(20),
  pasw VARCHAR(10),
  file MEDIUMBLOB,
  PRIMARY KEY(proveedor_id)
)ENGINE=MyISAM DEFAULT CHARSET = latin1;



CREATE TABLE alta(
  torneo_id INT AUTO_INCREMENT,
  empresa_id INT,
  necesidad VARCHAR(1000),
  oferta float(100,2),
  statuspay VARCHAR (10),
  orden_date_inicio DATE,
  orden_date_fin DATE,
  PRIMARY KEY(torneo_id)
)ENGINE=MyISAM DEFAULT CHARSET = latin1;



CREATE TABLE orden(
  id INT AUTO_INCREMENT,
  torneo_id INT ,
  proveedor_id INT,
  empresa_id INT,
  status VARCHAR(100),
  fecha DATE,
  referencia VARCHAR(1000),
  PRIMARY KEY(id)
)ENGINE=MyISAM DEFAULT CHARSET = latin1;




CREATE TABLE calificacion(
  id INT AUTO_INCREMENT,
  proveedor_id INT,
  empresa_id INT,
  calificacion INT,
  descripcion VARCHAR(1000),
  PRIMARY KEY(id)
)ENGINE=MyISAM DEFAULT CHARSET = latin1;


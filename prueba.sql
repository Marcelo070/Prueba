create database if not exists dbprueba2; -- verificar si no exite, en caso sea asi, se crea la base de datos

use dbprueba ;
CREATE TABLE GALPON (
	IDGALPON INT AUTO_INCREMENT PRIMARY KEY,
	CANTGALLINAS INT not null,
    CANTGALLOS INT not null,
    IDCOMIDA int references COMIDA,
    -- FALTARIA PARAMETROS(TABLA)
    IDRAZA int not null,
    TRABAJADOR CHAR(50)
);
CREATE TABLE RESPONSABLE(
	codResponsable char(10) primary key,
    IDGALPON int references GALPON,
    nombre char(50),
    apellido char(50)

);
CREATE TABLE COMIDA(
	IDCOMIDA int not null auto_increment primary key,
    IDGALPON int references GALPON,
    CODALIMENTO char(50) references ALIMENTO,
    HORARIO time 
);
-- INSERT INTO COMIDA VALUES(null, "" , "");

CREATE TABLE ALIMENTO( -- MAESTRO 
	CODALIMENTO CHAR(5) primary KEY,
    NOMBRE CHAR(50) NOT NULL,
    SUPLEMENTO CHAR(50)
);

CREATE TABLE IDENTIFICADOR(
	IDIDENTIFICADOR INT AUTO_INCREMENT PRIMARY KEY,
    IDRAZA int not null references TIPOANIMAL,
    GENERO CHAR(10) check(GENERO = "HEMBRA" OR GENERO = "MACHO"),
    IDGALPON INT references GALPON,
    IDVACUNA INT
);
alter TABLE IDENTIFICADOR auto_increment = 10;
create table INCIDENCIA_VETERINARIA (
	idIncidencia int not null primary key auto_increment,
    IDIDENTIFICADOR int references IDENTIFICADOR,
    diagnostico char(255)

);
create table VACUNAS(
	idVacuna char(20) not null primary key,
    marca char(50),
    tipo char(50)
);


CREATE TABLE TIPOANIMAL( -- MAESTRO
	IDRAZA INT auto_increment primary KEY,
    NOMBRERAZA CHAR(50),
    TIEMPOVIDA CHAR(50),
    TIEMPOCRECIMIENTO CHAR(50),
    ALIMENTACION CHAR(50),
    PESOIDEALKG INT 
);
CREATE TABLE HUEVO ( -- MAESTRO
	CODHUEVO INT NOT NULL primary KEY auto_increment,
    IDRAZA int references TIPOANIMAL,
    PESOIDEAL INT NOT NULL,
    PESOPROBLEMA INT
);

create table MONITOREO_PESO(
	IDGALPON INT REFERENCES GALPON,
    periodo char(20),
    primerPesaje date,
    bajoPeso int not null,
    sobrePeso int not null
);


-- REQUISITOS A CONSIDERAR PARA EL GALPON
create table PARAMETROS(
	codParametro char(10) primary key auto_increment,
    temperatura int not null,
    comederos int not null,
    bebederos int not null,
    ipCamara int references CAMARAS
    -- faltaria agregar, camas, nidos
);

create table CAMARAS(
	ipCamara int not null primary key auto_increment,
    marca char(50) not null,
    modelo char(50) not null

);


-- EXTTRACCION DE HUEVOS PARA LA VENTA
create table EXTRACCION(
	IDGALPON INT references GALPON,
    cantidad int not null,
    perdidas int not null,
    fecha_extraccion date
);












CREATE TABLE Alumno (
    IdAlumno int NOT NULL,
    Nombre varchar(30),
    PrimerApellido varchar(30),
    SegundoApellido varchar(30),
    Email varchar(30),
    PRIMARY KEY (IdAlumno)
);

CREATE TABLE DireccionTipo (
    IdDireccionTipo int NOT NULL,
    CodigoTipoDireccion varchar(1) NOT NULL,
    TextoTipoDireccion varchar(20) NOT NULL,
    PRIMARY KEY (IdDireccionTipo)
);

CREATE TABLE Direccion (
    IdDireccion int NOT NULL,
    IdDireccionTipo int NOT NULL,
    IdAlumno int NOT NULL,
    TextoDireccion varchar(255),
    PRIMARY KEY (IdDireccion),
    FOREIGN KEY (IdDireccionTipo) REFERENCES DireccionTipo(IdDireccionTipo),
    FOREIGN KEY (IdAlumno) REFERENCES Alumno(IdAlumno)
);




























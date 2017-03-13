create database dbpersona;
use dbpersona;

create table tpersona
(
idPersona int auto_increment not null,
nombre varchar(70) not null,
apellido varchar(70) not null,
correoElectronico varchar(700) not null,
contrasenia text not null,
fechaNacimiento datetime not null,
estatura float not null,
fechaRegistro datetime not null,
fechaModificacion datetime not null,
primary key(idPersona)
);

create table toperador
(
idOperador int auto_increment not null,
nombre varchar(70) not null,
fechaRegistro datetime not null,
fechaModificacion datetime not null,
primary key(idOperador)
);

create table ttelefono
(
idTelefono int auto_increment not null,
idPersona int not null,
idOperador int not null,
numero varchar(20) not null,
fechaRegistro datetime not null,
fechaModificacion datetime not null,
foreign key(idPersona) references tpersona(idPersona)
on delete cascade on update cascade,
foreign key(idOperador) references toperador(idOperador)
on delete cascade on update cascade,
primary key(idTelefono)
);
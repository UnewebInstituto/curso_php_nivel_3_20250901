-- CREACIÓN DE LA BASE DE DATOS
create database bd_carrito_nelson;

-- CONEXIÓN A LA BASE DE DATOS
use bd_carrito_nelson;

-- DEFINICIÓN DE TABLAS
create table agregar_carritos(
    session_id varchar(26),
    producto_id integer
);


create table usuarios(
    id integer auto_increment,
    cedula varchar(10),
    nombre_apellido varchar(100),
    correo_electronico varchar(100),
    clave varchar(32),
    tipo_usuario varchar(20),
    primary key(id),
    unique(cedula),
    unique(correo_electronico)
);

create table productos(
    id integer auto_increment,
    nombre_producto varchar(100),
    descripcion text,
    nombre_archivo text,
    precio decimal(13,2),
    existencia integer,
    primary key(id)
);

create table compras(
    usuario_id integer,
    producto_id integer,
    cantidad integer unsigned,
    fecha_hora datetime,
    index(usuario_id),
    index(producto_id),
    foreign key(usuario_id) references usuarios(id),
    foreign key(producto_id) references productos(id)
);

-- CREACIÓN DEL USUARIO ADMINISTRADOR
INSERT INTO usuarios(
    cedula,
    nombre_apellido,
    correo_electronico,
    clave, 
    tipo_usuario
)values
('V12345678', 'Nelson Rivas', 'nelson@sunai.gob.ve', md5('V12345678'), 'administrador');

SELECT usuarios.nombre_apellido,
       sum(compras.cantidad) as cantidad,
       sum(compras.cantidad * productos.precio) as total,
       compras.fecha_hora
       from usuarios, productos, compras
       where compras.usuario_id = usuarios.id and 
             compras.producto_id = productos.id
       group by compras.fecha_hora;

-- con alias

SELECT A.nombre_apellido,
       sum(C.cantidad) as cantidad,
       sum(C.cantidad * B.precio) as total,
       C.fecha_hora
       from usuarios as A, productos as B, compras as C
       where C.usuario_id = A.id and 
             C.producto_id = B.id
       group by C.fecha_hora;

-- crear una vista del query anterior
create view reporte_de_ventas as
SELECT A.nombre_apellido,
       sum(C.cantidad) as cantidad,
       sum(C.cantidad * B.precio) as total,
       C.fecha_hora
       from usuarios as A, productos as B, compras as C
       where C.usuario_id = A.id and 
             C.producto_id = B.id
       group by C.fecha_hora;



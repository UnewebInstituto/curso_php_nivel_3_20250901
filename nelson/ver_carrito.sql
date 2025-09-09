-- 1ra. Forma
SELECT A.id,
       A.nombre_producto,
       A.descripcion,
       A.nombre_archivo as foto,
       A.precio,
       A.existencia as cantidad
       from productos as A, agregar_carritos as B
       where B.producto_id = A.id and 
             B.session_id = 'r35e60l4fn8gcqnbp8da5a2m2i'
       group by B.producto_id;
            
-- 2da. Forma inner join
SELECT A.id,
       A.nombre_producto,
       A.descripcion,
       A.nombre_archivo as foto,
       A.precio,
       A.existencia as cantidad
       from productos as A
       inner join agregar_carritos as b
       on B.producto_id = A.id and 
          B.session_id = 'r35e60l4fn8gcqnbp8da5a2m2i'
          group by B.producto_id;



             
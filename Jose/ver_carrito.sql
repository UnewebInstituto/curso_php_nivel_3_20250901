SELECT A.id,
       A.nombre_producto,
       A.descripcion,
       A.nombre_archivo as foto,
       A.precio,
       A.existencia as cantidad
       from productos as A, agregar_carritos as B
       where B.producto_id = A.id and 
             B.session_id = '" . $session_id . "'
       group by B.producto_id,
<?php
    include './header.php';
    include './conexion.php';
    if ($_SESSION['activo']){
        $session_id = session_id();
        $sql = "SELECT A.id,
        A.nombre_producto,
        A.descripcion,
        A.nombre_archivo as foto,
        A.precio,
        A.existencia as cantidad
        from productos as A, agregar_carritos as B
        where B.producto_id = A.id and 
                B.session_id = '" . $session_id . "'
        group by B.producto_id";
        try {
            $resultado = mysqli_query($enlace, $sql);
            $cantidad = mysqli_num_rows($resultado);
            if ($cantidad > 0){
                echo "<a href='/curso_php_nivel_3_20250901/henry/'>Volver</a>";
                echo "<form action='./validar.php' method='post'>";
                echo "<table class='table table-hover table-bordered'>";
                echo "
                <theader>
                    <tr>
                        <th>Nombre</th>
                        <th>Imagen</th>
                        <th>Cantidad</th>
                        <th>Precio</th>
                        <th>Acción</th>
                    </tr>
                </theader>";
                echo "<tbody>";
                    while($data = mysqli_fetch_array($resultado)){
                        echo "<tr>";
                        echo "<td>" . $data['nombre_producto'] . "</td>";
                        echo "<td><img src='" . $data['foto'] . "'></td>";
                        echo "<td><input type='number' min='1' name='cantidad[]' multiple required></td>";
                        echo "<td>" . $data['precio'] . "</td>";
                        echo "<td><a class='btn btn-warning' href='./validar.php?id=5&producto_id=". $data['id'] . "'>Borrar</a></td>";
                        echo "</tr>";
                        // Valores ocultos que deben viajar para generar la orden de compra
                        echo "<input type='hidden' name='producto_id[]' multiple value = '$data[id]'>";
                        echo "<input type='hidden' name='nombre_producto[]' multiple value = '$data[nombre_producto]'>";
                        echo "<input type='hidden' name='precio[]' multiple value = '$data[precio]'>";
                    }
                echo "</tbody>";
                echo "</table>";
                echo "<button type='submit' class='btn btn-success'>Enviar</button>";
                echo "<input type='hidden' name='id' value='6'>";
                echo "</form>";
            }else{
                $mensaje = 'Carrito de compras se encuentra vacío.';
                $severidad = 2;
                setcookie('mensaje',$mensaje,time()+30);
                setcookie('severidad',$severidad,time()+30);
                header('location:/curso_php_nivel_3_20250901/henry/');
            }
        } catch (\Throwable $th) {
            $mensaje = $th->getmessage();
            $severidad = 4;
            setcookie('mensaje',$mensaje,time()+30);
            setcookie('severidad',$severidad,time()+30);
        }
    }else{
        $mensaje = 'Debe ingresar al sistema para ver el carrito de compras.';
        $severidad = 2;
        setcookie('mensaje',$mensaje,time()+30);
        setcookie('severidad',$severidad,time()+30);
        header('location:/curso_php_nivel_3_20250901/henry/');
    }
?>
<?php
    include './header.php';
    include './conexion.php';
    $sql = "SELECT * from productos";
    try {
        $resultado = mysqli_query($enlace, $sql);
        $cantidad = mysqli_num_rows($resultado);
        if ($cantidad > 0){
            // $a contador de filas, $b contador de columnas
            $a=1;$b=1;
            while ($data = mysqli_fetch_array($resultado)){
                $matriz_id[$a][$b] = $data['id'];
                $matriz_nombre_producto[$a][$b] = $data['nombre_producto'];
                $matriz_descripcion[$a][$b] = $data['descripcion'];
                $matriz_nombre_archivo[$a][$b] = $data['nombre_archivo'];
                $matriz_precio[$a][$b] = $data['precio'];
                $matriz_existencia[$a][$b] = $data['existencia'];
                $b++;
                if ($b == 4){
                    $a++; // Incrementa fila
                    $b=1; // Inicializa columna
                }
            }
            /*
            echo var_dump($matriz_id);
            echo "<hr>";
            echo var_dump($matriz_nombre_producto);
            echo "<hr>";
            echo var_dump($matriz_descripcion);
            echo "<hr>";
            
            echo var_dump($matriz_nombre_archivo);
            echo "<hr>";
            
            echo var_dump($matriz_precio);
            echo "<hr>";
            echo var_dump($matriz_existencia);
            echo "<hr>";
            */
            if ($cantidad >=3 ){
                $condicion = 3;
            }else{
                $condicion = $cantidad;
            }
            echo "<table class='table table-bordered table-hover'>";
            // $a número de filas
            for ($i=1; $i <= $a ; $i++) { 
                echo "<tr>";
                for ($j=1; $j <= $condicion ; $j++) { 
                    if (!empty($matriz_id[$i][$j])){
                        echo "<td>";
                        echo "<b>Nombre: </b>" . $matriz_nombre_producto[$i][$j] . "<br>";
                        echo "<b>Precio: </b>" . $matriz_precio[$i][$j] . "<br>";
                        echo "<b>Existencia: </b>" . $matriz_existencia[$i][$j] . " Unidad(es)<br>";
                        echo "<b>Descripción: </b>" . $matriz_descripcion[$i][$j] . "<br>";
                        echo "<b>Imagen: </b><img src='" . $matriz_nombre_archivo[$i][$j] . "'><br>";
                        // id = 4: Operación agregar al carrito de compras
                        echo "<a href='./validar.php?id=4&producto_id=" . $matriz_id[$i][$j] . "'>Agregar al carrito</a>";
                        echo "</td>";
                        
                    }
                }
                echo "<tr>";
            }
            echo "</table>";

        }else{
            $mensaje = "Catalogo no disponible";
            $severidad = 2;
            setcookie('mensaje',$mensaje,time()+30);
            setcookie('severidad',$severidad,time()+30);
        }
    } catch (\Throwable $th) {
        $mensaje = $th->getmessage();
        $severidad = 4;
        setcookie('mensaje',$mensaje,time()+30);
        setcookie('severidad',$severidad,time()+30);
    }
?>
<!-- /////////////////////////////////////////////// -->
<?php
    // Opción disponible sólo para el usuario administrador
    if ($_SESSION['tipo_usuario'] == 'ADMINISTRADOR') {
?>
        <a href="./menu.php">Menú</a><br>
<?php
    }
?>
<!-- /////////////////////////////////////////////// -->
<?php
    // Opción disponible si y sólo se añadió productos
    // al carrito de compras
    if($_SESSION['ver_carrito']) {
?>
        <a href="./ver_carrito.php">Ver carrito de compras</a><br>
<?php
    }
?>
<!-- /////////////////////////////////////////////// -->
<a href="./login.php">Ingresar al Sistema</a><br>
<?php
    include './footer.php';
?>
<?php
    session_start();
    error_reporting(0);
    include './conexion.php';
    switch ($_REQUEST['id']) {
        case '1':
            # Validación del usuario
            $sql = "SELECT * from usuarios where correo_electronico = '$_REQUEST[correo_electronico]'";
            try {
                $resultado = mysqli_query($enlace, $sql);
                $cantidad = mysqli_num_rows($resultado);
                if ($cantidad > 0){
                    $datos = mysqli_fetch_array($resultado);
                    if (md5($_REQUEST['password']) ==  $datos['clave']){
                        $_SESSION['usuario_id'] = $datos['id'];
                        $_SESSION['cedula'] = $datos['cedula'];
                        $_SESSION['nombre_apellido'] = $datos['nombre_apellido'];
                        ;
                        $_SESSION['tipo_usuario'] = $datos['tipo_usuario'];
                        if ($datos['tipo_usuario']=='administrador'){
                            #El mensaje durará 30 segundos
                            $mensaje = 'Bienvenido Administrador del Sistema';
                            $severidad = 1;
                            setcookie('mensaje',$mensaje,time()+30);
                            setcookie('severidad',$severidad,time()+30);
                            header('location:menu.php');
                        }else{
                            $mensaje = 'Bienvenido Usuario Visitante';
                            $severidad = 1;
                            setcookie('mensaje',$mensaje,time()+30);
                            setcookie('severidad',$severidad,time()+30);
                            header('location:login.php');
                        }
                    }else{
                        $mensaje = "Clave no valida";
                        $severidad = 2;
                        setcookie('mensaje',$mensaje,time()+30);
                        setcookie('severidad',$severidad,time()+30);
                        header('location:login.php');
                    }
                }else{
                    $mensaje = "Usuario no registrado";
                    $severidad = 3;
                    setcookie('mensaje',$mensaje,time()+30);
                    setcookie('severidad',$severidad,time()+30);
                    header('location:login.php');
                }
            } catch (\Throwable $th) {
                //throw $th;
                $mensaje = $th->getmessage();
                $severidad = 4;
                setcookie('mensaje',$mensaje,time()+30);
                setcookie('severidad',$severidad,time()+30);
                header('location:login.php');
            }
            break;
        case '2':
            # Registrar nuevo usuario
            $cedula = $_REQUEST['documento'] . $_REQUEST['cedula'];
            $sql = "INSERT into usuarios(cedula, nombre_apellido, correo_electronico, clave, tipo_usuario) values ('$cedula','$_REQUEST[nombre_apellido]','$_REQUEST[correo_electronico]',md5('$_REQUEST[clave]'),'VISITANTE')";
            try {
                $resultado = mysqli_query($enlace, $sql);
                $mensaje = 'Usuario visitante registrado con éxito.';
                $severidad = 1;
                setcookie('mensaje',$mensaje,time()+30);
                setcookie('severidad',$severidad,time()+30);
            } catch (\Throwable $th) {
                if (mysqli_errno($enlace) == 1062){
                    $mensaje = "Usuario ya registrado. Verifique Cédula de identidad o Correo electrónico.";
                }else{
                    $mensaje = $th->getmessage();
                }
                $severidad = 4;
                setcookie('mensaje',$mensaje,time()+30);
                setcookie('severidad',$severidad,time()+30);
            }
            header('location:login.php');
            break;
        case '3':
            /*
            SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'bd_carrito_henry' AND  TABLE_NAME = 'productos';
            # Registrar productos
            echo var_dump($_FILES['archivo']);
            echo "<hr>";
            echo var_dump(getimagesize($_FILES['archivo']['tmp_name']));
            echo "<hr>";
            echo var_dump($_REQUEST['nombre_producto']);
            echo "<hr>";
            echo var_dump($_REQUEST['precio']);
            echo "<hr>";
            echo var_dump($_REQUEST['cantidad']);
            echo "<hr>";
            echo var_dump($_REQUEST['descripcion']);
            echo "<hr>";
            */
            $archivo_imagen = $_FILES['archivo']['tmp_name'];
            $detalle_imagen = getimagesize($archivo_imagen);
            // Sólo se permiten archivos *.jpg/*.jfif y *.png
            if ($detalle_imagen[2] == 2 || $detalle_imagen[2] == 3){
                /*
                    Obtener el nombre de archivo con el cual se guardará la imagen
                */
                $sql_imagen = "SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'bd_carrito_henry' AND TABLE_NAME = 'productos'";
                $resultado_imagen = mysqli_query($enlace, $sql_imagen);
                $nuevo_nombre_imagen = mysqli_fetch_array($resultado_imagen);
                $ruta_imagen = "./productos/";
                $extension = ".jpg";
                if ($detalle_imagen[2] == 3){
                    $extension = ".png";
                }
                $nombre_archivo = $ruta_imagen . $nuevo_nombre_imagen[0] . $extension;
                $sql = "INSERT INTO productos(nombre_producto,descripcion,nombre_archivo,precio,existencia) values ('$_REQUEST[nombre_producto]','$_REQUEST[descripcion]','$nombre_archivo','$_REQUEST[precio]', '$_REQUEST[cantidad]')";
                try {
                    $resultado_producto = mysqli_query($enlace, $sql);
                    move_uploaded_file($archivo_imagen, $nombre_archivo);
                    $mensaje = 'Producto se registró con éxito';
                    $severidad = 1;
                    setcookie('mensaje',$mensaje,time()+30);
                    setcookie('severidad',$severidad,time()+30);
                } catch (\Throwable $th) {
                    $mensaje = $th->getmessage();
                    $severidad = 4;
                    setcookie('mensaje',$mensaje,time()+30);
                    setcookie('severidad',$severidad,time()+30);
                }
            }else{
                $mensaje = "Sólo se admiten archivos de formato .jpg o .png";
                $severidad = 2;
                setcookie('mensaje',$mensaje,time()+30);
                setcookie('severidad',$severidad,time()+30);
            }
            header('location:menu.php');
            break;
        case '4':
            # Registrar en la tabla Agregar Carritos
            $session_id = session_id();
            $sql = "INSERT into agregar_carritos(session_id, producto_id) values ('$session_id', '$_REQUEST[producto_id]')";
            try {
                $resultado = mysqli_query($enlace, $sql);
                $_SESSION['ver_carrito'] = true;
                $mensaje = 'Producto fué añadido al carrito de compras con éxito';
                $severidad = 1;
                setcookie('mensaje',$mensaje,time()+30);
                setcookie('severidad',$severidad,time()+30);
            } catch (\Throwable $th) {
                $mensaje = $th->getmessage();
                $severidad = 4;
                setcookie('mensaje',$mensaje,time()+30);
                setcookie('severidad',$severidad,time()+30);
            }
            // Retornar al index
            header('location:/curso_php_nivel_3_20250901/nelson/');
            break;
        case '5':
            # Borrar del carrito de compras
            $session_id = session_id();
            $sql = "DELETE from agregar_carritos WHERE session_id = '$session_id' AND producto_id = '$_REQUEST[producto_id]'";
            try {
                $resultado = mysqli_query($enlace, $sql);
            } catch (\Throwable $th) {
                $mensaje = $th->getmessage();
                $severidad = 4;
                setcookie('mensaje',$mensaje,time()+30);
                setcookie('severidad',$severidad,time()+30);
            }
            header('location:./ver_carrito.php');
            break;
        case '6':
            # Procesar orden de compra
            include './header.php';
            echo "<h6 class='text-center'>Por favor antes de aceptar la compra</h6>";
            echo "<h6 class='text-center'>revise el listado de artículos</h6>";
            echo "<table class='table table-hover table-bordered'>";
            echo "
            <thead>
                <tr>
                    <th>Cantidad</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Total</th>
                </tr>
            </thead>";
            echo "<tbody>";
            /*
            foreach ($_REQUEST['producto_id'] as $key => $value) {
                echo $key . ',' . $value . "<br>";
            }
            */
            $producto = 0;
            $sumatoria = 0;
            for ($i=0; $i < count($_REQUEST['producto_id']) ; $i++) { 
                echo "<tr>";
                //echo "<td>" . $_REQUEST['producto_id'][$i] . "</td>";
                echo "<td class='text-end'>" . $_REQUEST['cantidad'][$i] . "</td>";
                echo "<td>" . $_REQUEST['nombre_producto'][$i] . "</td>";
                echo "<td class='text-end'>" . $_REQUEST['precio'][$i] . "</td>";
                $producto = $_REQUEST['cantidad'][$i] * $_REQUEST['precio'][$i];
                echo "<td class='text-end'>" . number_format($producto,2,',','.') . "</td>";
                $sumatoria += $producto;
                echo "</tr>";
            }
            /*
            echo var_dump($_REQUEST['cantidad']);
            echo var_dump($_REQUEST['precio']);
            echo var_dump($_REQUEST['nombre_producto']);
            echo var_dump($_REQUEST['producto_id']);
            */
            echo "<tr>";
                echo "<td class='text-end' colspan='3'><b>Total:</b></td>";
                echo "<td class='text-end'>". number_format($sumatoria,2,',','.') . "</td>";
            echo "</tr>";
            echo "</tbody>";
            echo "</table>";
            echo "<button type='submit' class='btn btn-success'>Comprar</button>";
            echo "<a href=''>Volver al Inicio</a>";
            echo "<a href=''>Volver al Carrito</a>";
            include './footer.php';
            break;
        default:
            # code...
            break;
    }


?>
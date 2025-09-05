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
                        if ($datos['tipo_usuario']=='ADMINISTRADOR'){
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
            if ($detalle_imagen[2] == 2 || $detalle_imagen[2] == 3){
                /*
                    Obtener el nombre de archivo con el cual se guardará la imagen
                */
                $sql_imagen = "SELECT AUTO_INCREMENT FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_SCHEMA = 'bd_carrito_navileth' AND TABLE_NAME = 'productos'";
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
        default:
            # code...
            break;
    }


?>
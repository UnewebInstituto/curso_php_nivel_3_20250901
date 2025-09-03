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
                        if ($datos['tipo_usuario']=='Administrador'){
                            #El mensaje durará 5 minutos
                            $mensaje = 'Bienvenido Administrador del Sistema';
                            $severidad = 1;
                            setcookie('mensaje',$mensaje,time()+300);
                            setcookie('severidad',$severidad,time()+300);
                            header('location:menu.php');
                        }else{
                            $mensaje = 'Bienvenido Usuario Visitante';
                            $severidad = 1;
                            setcookie('mensaje',$mensaje,time()+300);
                            setcookie('severidad',$severidad,time()+300);
                            header('location:login.php');
                        }
                    }else{
                        $mensaje = "Clave no valida";
                        $severidad = 2;
                        setcookie('mensaje',$mensaje,time()+300);
                        setcookie('severidad',$severidad,time()+300);
                        header('location:login.php');
                    }
                }else{
                    $mensaje = "Usuario no registrado";
                    $severidad = 3;
                    setcookie('mensaje',$mensaje,time()+300);
                    setcookie('severidad',$severidad,time()+300);
                    header('location:login.php');
                }
            } catch (\Throwable $th) {
                //throw $th;
                $mensaje = $th->getmessage();
                $severidad = 4;
                setcookie('mensaje',$mensaje,time()+300);
                setcookie('severidad',$severidad,time()+300);
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
                setcookie('mensaje',$mensaje,time()+300);
                setcookie('severidad',$severidad,time()+300);
            } catch (\Throwable $th) {
                if (mysqli_errno($enlace) == 1062){
                    $mensaje = "Usuario ya registrado. Verifique Cédula de identidad o Correo electrónico.";
                }else{
                    $mensaje = $th->getmessage();
                }
                $severidad = 4;
                setcookie('mensaje',$mensaje,time()+300);
                setcookie('severidad',$severidad,time()+300);
            }
            header('location:login.php');
            break;
        default:
            # code...
            break;
    }


?>
<?php
    if (!isset($_SESSION['usuarioDAW207AplicacionFinal'])) {
        $_SESSION['paginaEnCurso'] = 'login';
        header('Location: index.php');
        exit();
    }
    
    if (isset($_REQUEST['volver'])) {
        $_SESSION['paginaEnCurso'] = 'inicioPrivado';
        header('Location: index.php');
        exit();
    }
    
    if (isset($_REQUEST['modificar'])) {
        print_r($_FILES);
        $formularioValido = true;
        
        $mensajesError['descUsuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descUsuario'], 255, 1, 1);
        if (isset($_FILES['imagenUsuario'])){
            $mensajesError['imagenUsuario'] = validacionFormularios::validarNombreArchivo($_FILES['imagenUsuario']['name'], ['jpg', 'png']);
        }
        
        foreach ($mensajesError as $valor) {
            if (!empty($valor)) {
                $formularioValido = false;
                break;
            }
        }
        
        if ($formularioValido) {
            $_SESSION['usuarioDAW207AplicacionFinal'] = UsuarioPDO::modificarUsuario($_SESSION['usuarioDAW207AplicacionFinal'], $_REQUEST['descUsuario'], addslashes(file_get_contents($_FILES['imagenUsuario']['tmp_name'])));

            $_SESSION['paginaEnCurso'] = 'inicioPrivado';
            header('Location: index.php');
            exit();
        }
    }
    
    $datosUsuario = $_SESSION['usuarioDAW207AplicacionFinal']->getArrayDatos();
    
    require_once $view['layout'];
?>
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
        $formularioValido = true;
        
        $contrasenaAnteriorCifrada = hash('sha256', $_SESSION['usuarioDAW207AplicacionFinal']->getCodUsuario().$_REQUEST['passwordAnterior']);
        
        $mensajesError['passwordAnterior'] = ($contrasenaAnteriorCifrada != $_SESSION['usuarioDAW207AplicacionFinal']->getPassword())? 'Contraseña anterior incorrecta' : '';
        $mensajesError['passwordNueva'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['passwordNueva'], 255, 1, 1) . (($contrasenaAnteriorCifrada == hash('sha256', $_SESSION['usuarioDAW207AplicacionFinal']->getCodUsuario().$_REQUEST['passwordNueva']))? 'La contraseña nueva no puede ser igual que la antigua' : '');
        
        foreach ($mensajesError as $valor) {
            if (!empty($valor)) {
                $formularioValido = false;
                break;
            }
        }
        
        if ($formularioValido) {
            $_SESSION['usuarioDAW207AplicacionFinal'] = UsuarioPDO::cambiarPassword($_SESSION['usuarioDAW207AplicacionFinal'], $_REQUEST['passwordNueva']);

            $_SESSION['paginaEnCurso'] = 'miCuenta';
            header('Location: index.php');
            exit();
        }
    }
    
    require_once $view['layout'];
?>
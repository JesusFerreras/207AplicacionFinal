<?php
    if (!isset($_SESSION['usuarioDAW207AplicacionFinal'])) {
        $_SESSION['paginaEnCurso'] = 'login';
        header('Location: index.php');
        exit();
    }
    
    if (isset($_REQUEST['volver'])) {
        $_SESSION['paginaEnCurso'] = 'miCuenta';
        header('Location: index.php');
        exit();
    }
    
    if (isset($_REQUEST['eliminarUsuario'])) {
        UsuarioPDO::borrarUsuario($_SESSION['usuarioDAW207AplicacionFinal']->getCodUsuario());

        session_destroy();
        $_SESSION['paginaEnCurso'] = 'mtoUsuarios';
        header('Location: index.php');
        exit();
    }

    $datosUsuario = $_SESSION['usuarioDAW207AplicacionFinal']->getArrayDatos();
    
    require_once $view['layout'];
?>
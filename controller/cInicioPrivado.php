<?php
    if (!isset($_SESSION['usuarioDAW207AplicacionFinal'])) {
        $_SESSION['paginaEnCurso'] = 'login';
        header('Location: index.php');
        exit();
    }
    
    if (isset($_REQUEST['miCuenta_x']) && isset($_REQUEST['miCuenta_y'])) {
        $_SESSION['paginaEnCurso'] = 'miCuenta';
        header('Location: index.php');
        exit();
    }
    
    if (isset($_REQUEST['mtoDepartamentos'])) {
        $_SESSION['paginaEnCurso'] = 'mtoDepartamentos';
        header('Location: index.php');
        exit();
    }
    
    if (isset($_REQUEST['mtoUsuarios'])) {
        $_SESSION['paginaEnCurso'] = 'mtoUsuarios';
        header('Location: index.php');
        exit();
    }
    
    if (isset($_REQUEST['rest'])) {
        $_SESSION['paginaEnCurso'] = 'rest';
        header('Location: index.php');
        exit();
    }
    
    if (isset($_REQUEST['cerrarSesion'])) {
        session_destroy();
        $_SESSION['paginaEnCurso'] = 'inicioPublico';
        header('Location: index.php');
        exit();
    }
    
    if (isset($_REQUEST['error'])) {
        DBPDO::ejecutarConsulta('a');
    }
    
    if (isset($_REQUEST['detalle'])) {
        $_SESSION['paginaEnCurso'] = 'detalle';
        header('Location: index.php');
        exit();
    }
    
    $datosUsuario = $_SESSION['usuarioDAW207AplicacionFinal']->getArrayDatos();
    
    require_once $view['layout'];
?>
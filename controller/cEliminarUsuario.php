<?php
    if (!isset($_SESSION['usuarioDAW207AplicacionFinal']) || $_SESSION['usuarioDAW207AplicacionFinal']->getPerfil() != 'administrador') {
        $_SESSION['paginaEnCurso'] = 'login';
        header('Location: index.php');
        exit();
    }
    
    if (isset($_REQUEST['volver'])) {
        unset($_SESSION['codUsuarioEnCurso']);
        $_SESSION['paginaEnCurso'] = 'mtoUsuarios';
        header('Location: index.php');
        exit();
    }
    
    if (isset($_REQUEST['eliminarUsuario'])) {
        UsuarioPDO::borrarUsuario($_SESSION['codUsuarioEnCurso']);

        unset($_SESSION['codUsuarioEnCurso']);
        $_SESSION['paginaEnCurso'] = 'mtoUsuarios';
        header('Location: index.php');
        exit();
    }

    $datosUsuario = UsuarioPDO::buscarUsuarioPorCod($_SESSION['codUsuarioEnCurso'])->getArrayDatos();
    
    require_once $view['layout'];
?>
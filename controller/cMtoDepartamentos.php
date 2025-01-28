<?php
    if (isset($_REQUEST['altaDepartamento'])) {
        $_SESSION['paginaEnCurso'] = 'wip';
        header('Location: index.php');
        exit();
    }
    
    if (isset($_REQUEST['consultarModificarDepartamento'])) {
        $_SESSION['paginaEnCurso'] = 'wip';
        header('Location: index.php');
        exit();
    }
    
    if (isset($_REQUEST['eliminarDepartamento'])) {
        $_SESSION['paginaEnCurso'] = 'wip';
        header('Location: index.php');
        exit();
    }
    
    if (isset($_REQUEST['bajaDepartamento'])) {
        $_SESSION['paginaEnCurso'] = 'wip';
        header('Location: index.php');
        exit();
    }
    
    if (isset($_REQUEST['rehabilitarDepartamento'])) {
        $_SESSION['paginaEnCurso'] = 'wip';
        header('Location: index.php');
        exit();
    }
    
    if (isset($_REQUEST['exportarDepartamentos'])) {
        $_SESSION['paginaEnCurso'] = 'wip';
        header('Location: index.php');
        exit();
    }
    
    if (isset($_REQUEST['importarDepartamentos'])) {
        $_SESSION['paginaEnCurso'] = 'wip';
        header('Location: index.php');
        exit();
    }
    
    require_once $view['layout'];
?>
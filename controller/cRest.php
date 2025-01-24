<?php
    if (isset($_REQUEST['volver'])) {
        $_SESSION['paginaEnCurso'] = 'inicioPrivado';
        header('Location: index.php');
        exit();
    }
    
    if (!isset($_SESSION['fechaNasa'])) {
        $_SESSION['fechaNasa'] = (new DateTime('now'))->format('Y-m-d');
    } else {
        if (isset($_REQUEST['fechaNasa'])) {
            $_SESSION['fechaNasa'] = $_REQUEST['fechaNasa'];
        }
    }
    
    $datosFoto = (REST::apiNasa($_SESSION['fechaNasa']))->getArrayDatos();
    
    require_once $view['layout'];
?>
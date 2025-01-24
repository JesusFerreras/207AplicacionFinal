<?php
    if (isset($_REQUEST['volver'])) {
        $_SESSION['paginaEnCurso'] = $_SESSION['error']->getPaginaSiguiente();
        unset($_SESSION['error']);
        header('Location: index.php');
        exit();
    }
    
    $datosError = $_SESSION['error']->getArrayDatos();
    
    require_once $view['layout'];
?>
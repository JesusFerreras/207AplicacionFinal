<?php
    $erroresTiempo = null;

    if (isset($_REQUEST['volver'])) {
        $_SESSION['paginaEnCurso'] = 'inicioPrivado';
        header('Location: index.php');
        exit();
    }
    
    if (!isset($_SESSION['fechaNasa'])) {
        $_SESSION['fechaNasa'] = (new DateTime('now'))->format('Y-m-d');
    } else {
        if (isset($_REQUEST['fechaNasa']) && (new DateTime('now') >= new DateTime($_REQUEST['fechaNasa']))) {
            $_SESSION['fechaNasa'] = $_REQUEST['fechaNasa'];
        }
    }
    
    if (isset($_REQUEST['pedirTiempo'])) {
        $erroresTiempo['latitud'] = validacionFormularios::comprobarFloat($_REQUEST['latitud'], 90, -90, 1);
        $erroresTiempo['longitud'] = validacionFormularios::comprobarFloat($_REQUEST['longitud'], 180, -180, 1);
        
        if (empty($erroresTiempo['latitud']) && empty($erroresTiempo['longitud'])) {
            $datosTiempo = (REST::apiMeteosource($_REQUEST['latitud'], $_REQUEST['longitud']))->getArrayDatos();
        }
    }
    
    $datosFoto = (REST::apiNasa($_SESSION['fechaNasa']))->getArrayDatos();
    
    require_once $view['layout'];
?>
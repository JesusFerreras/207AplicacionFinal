<?php
    if (isset($_REQUEST['volver'])) {
        $_SESSION['paginaEnCurso'] = 'mtoDepartamentos';
        header('Location: index.php');
        exit();
    }

    $datosDepartamento = $_SESSION['departamentoEnCurso']->getArrayDatos();
    
    require_once $view['layout'];
?>
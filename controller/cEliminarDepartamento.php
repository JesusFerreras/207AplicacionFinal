<?php
    if (!isset($_SESSION['usuarioDAW207AplicacionFinal'])) {
        $_SESSION['paginaEnCurso'] = 'login';
        header('Location: index.php');
        exit();
    }
    
    if (isset($_REQUEST['volver'])) {
        unset($_SESSION['codDepartamentoEnCurso']);
        $_SESSION['paginaEnCurso'] = 'mtoDepartamentos';
        header('Location: index.php');
        exit();
    }
    
    if (isset($_REQUEST['eliminarDepartamento'])) {
        DepartamentoPDO::bajaFisicaDepartamento($_SESSION['codDepartamentoEnCurso']);

        unset($_SESSION['codDepartamentoEnCurso']);
        $_SESSION['paginaEnCurso'] = 'mtoDepartamentos';
        header('Location: index.php');
        exit();
    }

    $datosDepartamento = DepartamentoPDO::buscarDepartamentoPorCod($_SESSION['codDepartamentoEnCurso'])->getArrayDatos();
    
    require_once $view['layout'];
?>
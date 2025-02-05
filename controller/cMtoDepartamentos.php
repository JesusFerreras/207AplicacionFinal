<?php
    $clavesRequest = array_keys($_REQUEST);
    
    if ($resultado = preg_grep('/^modificar[A-Z]{3}$/', $clavesRequest)) {
        $_SESSION['departamentoEnCurso'] = DepartamentoPDO::buscaDepartamentoPorCod(substr($resultado[0], -3));
        $_SESSION['paginaEnCurso'] = 'consultarModificarDepartamento';
        header('Location: index.php');
        exit();
    }
    
    if ($resultado = preg_grep('/^baja[A-Z]{3}$/', $clavesRequest)) {
        DepartamentoPDO::bajaLogicaDepartamento(substr($resultado[0], -3));
        header('Location: index.php');
        exit();
    }
    
    if ($resultado = preg_grep('/^rehabilitar[A-Z]{3}$/', $clavesRequest)) {
        DepartamentoPDO::rehabilitaDepartamento(substr($resultado[0], -3));
        header('Location: index.php');
        exit();
    }

    if (isset($_REQUEST['volver'])) {
        $_SESSION['paginaEnCurso'] = 'inicioPrivado';
        header('Location: index.php');
        exit();
    }
    
    if (isset($_REQUEST['altaDepartamento'])) {
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
    
    $datosDepartamentos = [];
    $departamentos = DepartamentoPDO::buscaDepartamentosPorDesc(isset($_REQUEST['descDepartamento'])? $_REQUEST['descDepartamento'] : '');
    foreach ($departamentos as $valor) {
        array_push($datosDepartamentos, $valor->getArrayDatos());
    }
    
    require_once $view['layout'];
?>
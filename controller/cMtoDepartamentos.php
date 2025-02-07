<?php
    $clavesRequest = array_keys($_REQUEST);
    
    if ($resultado = preg_grep('/^modificar[A-Z]{3}$/', $clavesRequest)) {
        $_SESSION['codDepartamentoEnCurso'] = substr($resultado[0], -3);
        $_SESSION['paginaEnCurso'] = 'consultarModificarDepartamento';
        header('Location: index.php');
        exit();
    }
    
    if ($resultado = preg_grep('/^eliminar[A-Z]{3}$/', $clavesRequest)) {
        $_SESSION['codDepartamentoEnCurso'] = substr($resultado[0], -3);
        $_SESSION['paginaEnCurso'] = 'eliminarDepartamento';
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
        $_SESSION['paginaEnCurso'] = 'altaDepartamento';
        header('Location: index.php');
        exit();
    }
    
    if (isset($_REQUEST['exportarDepartamentos'])) {
        $datosDepartamentosJson = [];
        $departamentosJson = DepartamentoPDO::buscaDepartamentosPorDesc('');
        foreach ($departamentosJson as $valor) {
            array_push($datosDepartamentosJson, $valor->getArrayDatos());
        }
        if ($json = json_encode($datosDepartamentosJson, JSON_PRETTY_PRINT)) {
            $fichero = 'tmp/departamentos207_' . date_format(new DateTime('now'), 'Ymd') . '.json';
            file_put_contents($fichero, $json);
            
            
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($fichero).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($fichero));
            readfile($fichero);
            unlink($fichero);
            exit();
        }
    }
    
    if (isset($_REQUEST['importarDepartamentos'])) {
        $_SESSION['paginaEnCurso'] = 'wip';
        header('Location: index.php');
        exit();
    }
    
    if (isset($_REQUEST['buscarDepartamento'])) {
        $_SESSION['descDepartamento'] = $_REQUEST['descDepartamento'];
    }
    
    $datosDepartamentos = [];
    $departamentos = DepartamentoPDO::buscaDepartamentosPorDesc(isset($_REQUEST['descDepartamento'])? $_REQUEST['descDepartamento'] : (isset($_SESSION['descDepartamento'])? $_SESSION['descDepartamento'] : ''));
    foreach ($departamentos as $valor) {
        array_push($datosDepartamentos, $valor->getArrayDatos());
    }
    
    require_once $view['layout'];
?>
<?php
    if (!isset($_SESSION['usuarioDAW207AplicacionFinal'])) {
        $_SESSION['paginaEnCurso'] = 'login';
        header('Location: index.php');
        exit();
    }
    
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
        DepartamentoPDO::rehabilitarDepartamento(substr($resultado[0], -3));
        header('Location: index.php');
        exit();
    }

    if (isset($_REQUEST['volver'])) {
        $_SESSION['paginaEnCurso'] = 'inicioPrivado';
        unset($_SESSION['descDepartamento']);
        unset($_SESSION['estadoDepartamento']);
        unset($_SESSION['numPagina']);
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
        $departamentosJson = DepartamentoPDO::buscarDepartamentosPorDesc('');
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
        switch ($_REQUEST['estadoDepartamento']) {
            case 'estadoBaja':
                $_SESSION['estadoDepartamento'] = 0;
            break;
            case 'estadoAlta':
                $_SESSION['estadoDepartamento'] = 1;
            break;
            default:
                $_SESSION['estadoDepartamento'] = 2;
            break;
        }
        unset($_SESSION['numPagina']);
    }
    
    
    if (!isset($_SESSION['numPagina'])) {
        $_SESSION['numPagina'] = 0;
    }
    
    if (!isset($_SESSION['estadoDepartamento'])) {
        $_SESSION['estadoDepartamento'] = 1;
    }
    
    if (!isset($_SESSION['descDepartamento'])) {
        $_SESSION['descDepartamento'] = '';
    }
    
    $numMaxRegistros = 5;
    $numPaginas = ceil(DepartamentoPDO::numDepartamentos($_SESSION['descDepartamento'], $_SESSION['estadoDepartamento']) / $numMaxRegistros);
    
    
    if (isset($_REQUEST['paginaPrimera'])) {
        $_SESSION['numPagina'] = 0;
    }
    
    if (isset($_REQUEST['paginaAnterior'])) {
        $_SESSION['numPagina'] = max(0, $_SESSION['numPagina']-1);
    }
    
    if (isset($_REQUEST['paginaSiguiente'])) {
        $_SESSION['numPagina'] = min($numPaginas-1, $_SESSION['numPagina']+1);
    }
    
    if (isset($_REQUEST['paginaUltima'])) {
        $_SESSION['numPagina'] = $numPaginas-1;
    }
    $datosDepartamentos = [];
    $departamentos = DepartamentoPDO::buscarDepartamentosPorDescYEstado($_SESSION['descDepartamento'], $_SESSION['estadoDepartamento'], $numMaxRegistros, $_SESSION['numPagina']*$numMaxRegistros);
    
    foreach ($departamentos as $valor) {
        array_push($datosDepartamentos, $valor->getArrayDatos());
    }
    
    require_once $view['layout'];
?>
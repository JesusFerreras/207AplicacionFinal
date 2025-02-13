<?php
    if (!isset($_SESSION['usuarioDAW207AplicacionFinal']) || $_SESSION['usuarioDAW207AplicacionFinal']->getPerfil() != 'administrador') {
        $_SESSION['paginaEnCurso'] = 'login';
        header('Location: index.php');
        exit();
    }
    
    $clavesRequest = array_keys($_REQUEST);
    
    if ($resultado = preg_grep('/^modificar/', $clavesRequest)) {
        $_SESSION['codUsuarioEnCurso'] = str_replace('modificar', '', $resultado[0]);
        $_SESSION['paginaEnCurso'] = 'consultarModificarUsuario';
        header('Location: index.php');
        exit();
    }
    
    if ($resultado = preg_grep('/^eliminar/', $clavesRequest)) {
        $_SESSION['codUsuarioEnCurso'] = str_replace('eliminar', '', $resultado[0]);
        $_SESSION['paginaEnCurso'] = 'eliminarUsuario';
        header('Location: index.php');
        exit();
    }

    if (isset($_REQUEST['volver'])) {
        $_SESSION['paginaEnCurso'] = 'inicioPrivado';
        unset($_SESSION['descUsuario']);
        unset($_SESSION['numPagina']);
        header('Location: index.php');
        exit();
    }
    
    if (isset($_REQUEST['buscarUsuario'])) {
        $_SESSION['descUsuario'] = $_REQUEST['descUsuario'];
    }
    
    
    if (!isset($_SESSION['numPagina'])) {
        $_SESSION['numPagina'] = 0;
    }
    
    if (!isset($_SESSION['descUsuario'])) {
        $_SESSION['descUsuario'] = '';
    }
    
    $numMaxRegistros = 5;
    $numPaginas = ceil(UsuarioPDO::numUsuarios($_SESSION['descUsuario']) / $numMaxRegistros);
    
    
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
    $datosUsuarios = [];
    $usuarios = UsuarioPDO::buscarUsuariosPorDesc($_SESSION['descUsuario'], $numMaxRegistros, $_SESSION['numPagina']*$numMaxRegistros);
    
    foreach ($usuarios as $valor) {
        array_push($datosUsuarios, $valor->getArrayDatos());
    }
    
    require_once $view['layout'];
?>
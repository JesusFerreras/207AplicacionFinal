<?php
    $opcionesPerfil = ['administrador', 'usuario'];
    $usuarioEnCurso = UsuarioPDO::buscarUsuarioPorCod($_SESSION['codUsuarioEnCurso']);

    if (!isset($_SESSION['usuarioDAW207AplicacionFinal']) || $_SESSION['usuarioDAW207AplicacionFinal']->getPerfil() != 'administrador') {
        $_SESSION['paginaEnCurso'] = 'login';
        header('Location: index.php');
        exit();
    }
    
    if (isset($_REQUEST['volver'])) {
        $_SESSION['paginaEnCurso'] = 'mtoUsuarios';
        header('Location: index.php');
        exit();
    }
    
    if (isset($_REQUEST['modificar'])) {
        $formularioValido = true;
        
        $mensajesError['descUsuario'] = validacionFormularios::comprobarAlfaNumerico($_REQUEST['descUsuario'], 255, 1, 1);
        $mensajesError['perfil'] = validacionFormularios::validarElementoEnLista($_REQUEST['perfil'], $opcionesPerfil);
        if (is_uploaded_file($_FILES['imagenUsuario']['tmp_name'])){
            $mensajesError['imagenUsuario'] = validacionFormularios::validarNombreArchivo($_FILES['imagenUsuario']['name'], ['jpg', 'png']);
        }
        
        foreach ($mensajesError as $valor) {
            if (!empty($valor)) {
                $formularioValido = false;
                break;
            }
        }
        
        if ($formularioValido) {
            UsuarioPDO::modificarUsuario($usuarioEnCurso, $_REQUEST['descUsuario'], (is_uploaded_file($_FILES['imagenUsuario']['tmp_name'])? addslashes(file_get_contents($_FILES['imagenUsuario']['tmp_name'])) : null), $_REQUEST['perfil']);

            $_SESSION['paginaEnCurso'] = 'mtoUsuarios';
            header('Location: index.php');
            exit();
        }
    }
    
    $datosUsuario = $usuarioEnCurso->getArrayDatos();
    
    require_once $view['layout'];
?>
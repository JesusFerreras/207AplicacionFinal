<?php
    if (isset($_SESSION['usuarioDAW207AplicacionFinal'])) {
        $_SESSION['paginaEnCurso'] = 'inicioPrivado';
        header('Location: index.php');
        exit();
    }
    
    if (isset($_REQUEST['volver'])) {
        $_SESSION['paginaEnCurso'] = 'inicioPublico';
        header('Location: index.php');
        exit();
    }
    
    if (isset($_REQUEST['registro'])) {
        $formularioValido = true;
        
        $mensajesError = [
            'codUsuario' => validacionFormularios::comprobarAlfaNumerico($_REQUEST['codUsuario'], 255, 1, 1) . UsuarioPDO::validarCodNoExiste($_REQUEST['codUsuario'])? '' : 'El usuario ya existe',
            'descUsuario' => validacionFormularios::comprobarAlfaNumerico($_REQUEST['descUsuario'], 255, 1, 1),
            'password' => validacionFormularios::comprobarAlfaNumerico($_REQUEST['descUsuario'], 255, 1, 1)
        ];
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
            $usuario = UsuarioPDO::altaUsuario($_REQUEST['codUsuario'], $_REQUEST['password'], $_REQUEST['descUsuario'], (is_uploaded_file($_FILES['imagenUsuario']['tmp_name'])? addslashes(file_get_contents($_FILES['imagenUsuario']['tmp_name'])) : null));

            if ($usuario instanceof Usuario) {
                $usuario = UsuarioPDO::registrarUltimaConexion($usuario);

                $_SESSION['usuarioDAW207AplicacionFinal'] = $usuario;
                $_SESSION['paginaEnCurso'] = 'inicioPrivado';

                header('Location: index.php');
                exit();
            }
        }
    }
    
    require_once $view['layout'];
?>
<?php
    if (isset($_REQUEST['volver'])) {
        $_SESSION['paginaEnCurso'] = 'mtoDepartamentos';
        header('Location: index.php');
        exit();
    }
    
    if (isset($_REQUEST['altaDepartamento'])) {
        $formularioValido = true;
        
        $mensajesError = [
            'codDepartamento' => ((preg_match('/^[A-Z]{3}$/', $_REQUEST['codDepartamento']) == 0)? 'El código debe ser 3 letras mayúsculas' : '') . (DepartamentoPDO::validaCodNoExiste($_REQUEST['codDepartamento'])? '' : 'El código ya existe'),
            'descDepartamento' => validacionFormularios::comprobarAlfaNumerico($_REQUEST['descDepartamento'], 255, 1, 1),
            'volumenDeNegocio' => validacionFormularios::comprobarFloat($_REQUEST['volumenDeNegocio'], PHP_FLOAT_MAX, 0, 1)
        ];
        
        foreach ($mensajesError as $valor) {
            if (!empty($valor)) {
                $formularioValido = false;
                break;
            }
        }
        
        if ($formularioValido) {
            DepartamentoPDO::altaDepartamento($_REQUEST['codDepartamento'], $_REQUEST['descDepartamento'], $_REQUEST['volumenDeNegocio']);

            $_SESSION['paginaEnCurso'] = 'mtoDepartamentos';
            header('Location: index.php');
            exit();
        }
    }
    
    require_once $view['layout'];
?>
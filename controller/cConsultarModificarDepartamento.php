<?php
    if (isset($_REQUEST['volver'])) {
        $_SESSION['paginaEnCurso'] = 'mtoDepartamentos';
        header('Location: index.php');
        exit();
    }
    
    if (isset($_REQUEST['modificar'])) {
        $formularioValido = true;
        
        $mensajesError = [
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
            $departamento = DepartamentoPDO::modificaDepartamento($_SESSION['departamentoEnCurso']->getCodDepartamento(), $_REQUEST['descDepartamento'], $_REQUEST['volumenDeNegocio']);

            $_SESSION['paginaEnCurso'] = 'mtoDepartamentos';
            header('Location: index.php');
            exit();
        }
    }

    $datosDepartamento = $_SESSION['departamentoEnCurso']->getArrayDatos();
    
    require_once $view['layout'];
?>
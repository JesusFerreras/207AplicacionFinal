<?php
    if (isset($_REQUEST['volver'])) {
        unset($_SESSION['codDepartamentoEnCurso']);
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
            $departamento = DepartamentoPDO::modificaDepartamento($_SESSION['codDepartamentoEnCurso'], $_REQUEST['descDepartamento'], $_REQUEST['volumenDeNegocio']);

            unset($_SESSION['codDepartamentoEnCurso']);
            $_SESSION['paginaEnCurso'] = 'mtoDepartamentos';
            header('Location: index.php');
            exit();
        }
    }

    $datosDepartamento = DepartamentoPDO::buscaDepartamentoPorCod($_SESSION['codDepartamentoEnCurso'])->getArrayDatos();
    
    require_once $view['layout'];
?>
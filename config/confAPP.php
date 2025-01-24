<?php
    foreach (scandir('model') as $fichero) {
        if ($fichero != '.' && $fichero != '..') {
            require_once 'model/'.$fichero;
        }
    }
    
    foreach (scandir('view') as $fichero) {
        if ($fichero != '.' && $fichero != '..') {
            $clave = substr($fichero, 0, 1) == 'v'? lcfirst(substr($fichero, 1, strrpos($fichero, '.')-1)) : substr($fichero, 0, strrpos($fichero, '.'));
            $view[$clave] = 'view/'.$fichero;
        }
    }
    
    foreach (scandir('controller') as $fichero) {
        if ($fichero != '.' && $fichero != '..') {
            $controller[lcfirst(substr($fichero, 1, strrpos($fichero, '.')-1))] = 'controller/'.$fichero;
        }
    }
    
    require_once 'core/231018libreriaValidacion.php';
?>
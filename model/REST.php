<?php
    class REST {
        const apikeyNASA = 'G0efsc0nhZCxCJUliziDhKh5tUhrWKbHbPfB9oTa';

        public static function apiNasa($fecha) {
            try {
                $respuesta = file_get_contents("https://api.nasa.gov/planetary/apod?api_key=" . self::apikeyNASA . "&date=$fecha");

                $archivo = json_decode($respuesta, true);

                if (!is_null($archivo)) {
                    return new FotoNasa($archivo['url'], $archivo['title'], $archivo['explanation']);
                } else {
                    return null;
                }
            } catch (Exception $ex) {
                $_SESSION['error'] = new ErrorApp($ex->getCode(), $ex->getMessage(), $ex->getFile(), $ex->getLine(), 'inicioPrivado');
                $_SESSION['paginaEnCurso'] = 'error';

                header('Location:index.php');
                exit();
            }
        }
    }
?>
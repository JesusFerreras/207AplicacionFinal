<?php
    class REST {
        const apikeyNASA = 'G0efsc0nhZCxCJUliziDhKh5tUhrWKbHbPfB9oTa';
        const apikeyMeteosource = '8bf1d752b5msha306d71de345c17p1e95e0jsn7ceac53ed12f';

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
                $_SESSION['error'] = new ErrorApp($ex->getCode(), $ex->getMessage(), $ex->getFile(), $ex->getLine(), $_SESSION['paginaEnCurso']);
                $_SESSION['paginaEnCurso'] = 'error';
                unset($_SESSION['fechaNasa']);

                header('Location:index.php');
                exit();
            }
        }
        
        public static function apiMeteosource($lat, $lon) {
            try {
                $contexto = stream_context_create([
                    "http" => [
                        "method" => "GET",
                        "header" => "X-RapidAPI-Key: ". self::apikeyMeteosource . "\n" .
                                     'X-RapidAPI-Host: ai-weather-by-meteosource.p.rapidapi.com'. "\n"
                    ]
                ]);

                $respuesta = file_get_contents("https://ai-weather-by-meteosource.p.rapidapi.com/daily?lat=$lat&lon=$lon&timezone=auto&language=es&units=metric", false, $contexto);

                $archivo = json_decode($respuesta, true);

                if (!is_null($archivo)) {
                    return new DatosTiempo(
                        $archivo['daily']['data'][0]['summary'],
                        $archivo['daily']['data'][0]['temperature'],
                        $archivo['daily']['data'][0]['wind']['speed'],
                        $archivo['daily']['data'][0]['wind']['dir'],
                        $archivo['daily']['data'][0]['cloud_cover'],
                        $archivo['daily']['data'][0]['humidity']
                    );
                } else {
                    return null;
                }
            } catch (Exception $ex) {
                $_SESSION['error'] = new ErrorApp($ex->getCode(), $ex->getMessage(), $ex->getFile(), $ex->getLine(), $_SESSION['paginaEnCurso']);
                $_SESSION['paginaEnCurso'] = 'error';
                unset($_SESSION['ubicacionTiempo']);

                header('Location:index.php');
                exit();
            }
        }
    }
?>
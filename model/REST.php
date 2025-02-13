<?php
    /**
     * Clase REST
     * 
     * Clase a través de la cual se acceden a las APIs
     * 
     * @author  Jesús Ferreras
     * 
     * @category 
     */
    class REST {
        /** @var  string  apikeyNasa  Clave para acceder a la API de la NASA */
        private const apikeyNASA = 'G0efsc0nhZCxCJUliziDhKh5tUhrWKbHbPfB9oTa';
        
        /** @var  string  apikeyMeteosource  Clave para acceder a la API de Meteosource */
        private const apikeyMeteosource = '8bf1d752b5msha306d71de345c17p1e95e0jsn7ceac53ed12f';

        
        /**
         * Función apiNasa
         * 
         * Función que se conecta a la API de la foto del día de la NASA con la fecha introducida y la devuelve como objeto
         * 
         * @param  string  $fecha  Fecha en formato 'Y-m-d'
         * 
         * @return  FotoNasa  Un objeto FotoNasa o null en caso de fallo
         */
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
                $_SESSION['error'] = new AppError($ex->getCode(), $ex->getMessage(), $ex->getFile(), $ex->getLine(), $_SESSION['paginaEnCurso']);
                $_SESSION['paginaEnCurso'] = 'error';
                unset($_SESSION['fechaNasa']);

                header('Location:index.php');
                exit();
            }
        }
        
        /**
         * Función apiMeteosource
         * 
         * Función que se conecta a la API del tiempo de Meteosource con la latitud y longitud introducidas y lo devuelve como objeto
         * 
         * @param  float  $lat  Latitud de la ubicación
         * @param  float  $lon  Longitud de la ubicación
         * 
         * @return  DatosTiempo  Un objeto DatosTiempo o null en caso de fallo
         */
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
                $_SESSION['error'] = new AppError($ex->getCode(), $ex->getMessage(), $ex->getFile(), $ex->getLine(), $_SESSION['paginaEnCurso']);
                $_SESSION['paginaEnCurso'] = 'error';
                unset($_SESSION['ubicacionTiempo']);

                header('Location:index.php');
                exit();
            }
        }
    }
?>
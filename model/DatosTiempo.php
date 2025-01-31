<?php
    /**
     * Clase DatosTiempo
     * 
     * Clase que representa una previsión del tiempo y sus datos
     * 
     * @author  Jesús Ferreras
     * 
     * @category 
     */
    class DatosTiempo {
        /** @var    $  Resumen del tiempo */
        private $tiempo;
        
        /** @var    $   */
        private $temperatura;
        
        /** @var    $  Velocidad del viento */
        private $velViento;
        
        /** @var    $  Dirección del viento */
        private $dirViento;
        
        /** @var    $   */
        private $nubosidad;
        
        /** @var    $   */
        private $humedad;
        
        
        /**
         * Función constructora
         * 
         * Construye un nuevo objeto de la clase  a partir de los datos introducidos
         * 
         * @param    $  Resumen del tiempo
         * @param    $  del tiempo
         * @param    $  Velocidad del viento
         * @param    $  Dirección del viento
         * @param    $  del tiempo
         * @param    $  del tiempo
         */
        public function __construct($tiempo, $temperatura, $velViento, $dirViento, $nubosidad, $humedad) {
            $this->tiempo = $tiempo;
            $this->temperatura = $temperatura;
            $this->velViento = $velViento;
            $this->dirViento = $dirViento;
            $this->nubosidad = $nubosidad;
            $this->humedad = $humedad;
        }
        
        /**
         * Función get
         * 
         * Devuelve l Resumen del tiempo
         * 
         * @return    Resumen del tiempo
         */
        public function getTiempo() {
            return $this->tiempo;
        }

        /**
         * Función get
         * 
         * Devuelve l  del
         * 
         * @return    del
         */
        public function getTemperatura() {
            return $this->temperatura;
        }

        /**
         * Función get
         * 
         * Devuelve l  Velocidad del viento
         * 
         * @return    Velocidad del viento
         */
        public function getVelViento() {
            return $this->velViento;
        }

        /**
         * Función get
         * 
         * Devuelve l  Dirección del viento
         * 
         * @return    Dirección del viento
         */
        public function getDirViento() {
            return $this->dirViento;
        }

        /**
         * Función get
         * 
         * Devuelve l  del
         * 
         * @return    del
         */
        public function getNubosidad() {
            return $this->nubosidad;
        }

        /**
         * Función get
         * 
         * Devuelve l  del
         * 
         * @return    del
         */
        public function getHumedad() {
            return $this->humedad;
        }

        /**
         * Función set
         * 
         * Sustituye Resumen del tiempo por l indicad
         * 
         * @param    $  Resumen del tiempo
         */
        public function setTiempo($tiempo): void {
            $this->tiempo = $tiempo;
        }

        /**
         * Función set
         * 
         * Sustituye  de  por l indicad
         * 
         * @param    $  
         */
        public function setTemperatura($temperatura): void {
            $this->temperatura = $temperatura;
        }

        /**
         * Función set
         * 
         * Sustituye Velocidad del viento por l indicad
         * 
         * @param    $  Velocidad del viento
         */
        public function setVelViento($velViento): void {
            $this->velViento = $velViento;
        }

        /**
         * Función set
         * 
         * Sustituye Dirección del viento por l indicad
         * 
         * @param    $  Dirección del viento
         */
        public function setDirViento($dirViento): void {
            $this->dirViento = $dirViento;
        }

        /**
         * Función set
         * 
         * Sustituye  de  por l indicad
         * 
         * @param    $  
         */
        public function setNubosidad($nubosidad): void {
            $this->nubosidad = $nubosidad;
        }

        /**
         * Función set
         * 
         * Sustituye  de  por l indicad
         * 
         * @param    $  
         */
        public function setHumedad($humedad): void {
            $this->humedad = $humedad;
        }

        /**
         * Función getArrayDatos
         * 
         * Devuelve un array asociativo con cada uno de los atributos del error
         * 
         * @return  mixed[]  Datos del error
         */
        public function getArrayDatos() {
            return [
                'tiempo' => $this->tiempo,
                'temperatura' => $this->temperatura,
                'velViento' => $this->velViento,
                'dirViento' => $this->dirViento,
                'nubosidad' => $this->nubosidad,
                'humedad' => $this->humedad
            ];
        }
    }
?>
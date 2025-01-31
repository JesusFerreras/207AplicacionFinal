<?php
    /**
     * Clase FotoNasa
     * 
     * Clase que representa una foto de la NASA y sus datos
     * 
     * @author  Jesús Ferreras
     * 
     * @category 
     */
    class FotoNasa {
        /** @var  string  $url  Url de la foto */
        private $url;
        
        /** @var  string  $titulo  Título de la foto */
        private $titulo;
        
        /** @var  string  $descripcion  Descripción de la foto */
        private $descripcion;
        
        
        /**
         * Función constructora
         * 
         * Construye un nuevo objeto de la clase  a partir de los datos introducidos
         * 
         * @param  string  $url          Url de la foto
         * @param  string  $titulo       Título de la foto
         * @param  string  $descripcion  Descripción de la foto
         */
        public function __construct($url, $titulo, $descripcion) {
            $this->url = $url;
            $this->titulo = $titulo;
            $this->descripcion = $descripcion;
        }
        
        /**
         * Función getUrl
         * 
         * Devuelve la url de la foto
         * 
         * @return  string  Url de la foto
         */
        public function getUrl() {
            return $this->url;
        }

        /**
         * Función getTítulo
         * 
         * Devuelve la título de la foto
         * 
         * @return  string  Título de la foto
         */
        public function getTitulo() {
            return $this->titulo;
        }
        
        /**
         * Función getDescripción
         * 
         * Devuelve la descripción de la foto
         * 
         * @return  string  Descripción de la foto
         */
        public function getDescripcion() {
            return $this->descripcion;
        }

        /**
         * Función setUrl
         * 
         * Sustituye la url de la foto por la indicada
         * 
         * @param  string  $url  Url de la foto
         */
        public function setUrl($url): void {
            $this->url = $url;
        }

        /**
         * Función setTitulo
         * 
         * Sustituye el título de la foto por el indicado
         * 
         * @param  string  $titulo  Título de la foto
         */
        public function setTitulo($titulo): void {
            $this->titulo = $titulo;
        }
        
        /**
         * Función setDescripción
         * 
         * Sustituye la descripción de la foto por la indicada
         * 
         * @param  string  $descripcion  Descripción de la foto
         */
        public function setDescripcion($descripcion): void {
            $this->descripcion = $descripcion;
        }

        /**
         * Función getArrayDatos
         * 
         * Devuelve un array asociativo con cada uno de los atributos de la foto
         * 
         * @return  mixed[]  Datos de la foto
         */
        public function getArrayDatos() {
            return [
                'url' => $this->url,
                'titulo' => $this->titulo,
                'descripcion' => $this->descripcion
            ];
        }
    }
?>
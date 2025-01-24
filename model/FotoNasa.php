<?php
    class FotoNasa {
        private $url;
        private $titulo;
        private $descripcion;
        
        public function __construct($url, $titulo, $descripcion) {
            $this->url = $url;
            $this->titulo = $titulo;
            $this->descripcion = $descripcion;
        }
        
        public function getUrl() {
            return $this->url;
        }

        public function getTitulo() {
            return $this->titulo;
        }
        
        public function getDescripcion() {
            return $this->descripcion;
        }

        public function setUrl($url): void {
            $this->url = $url;
        }

        public function setTitulo($titulo): void {
            $this->titulo = $titulo;
        }
        
        public function setDescripcion($descripcion): void {
            $this->descripcion = $descripcion;
        }

        public function getArrayDatos() {
            return [
                'url' => $this->url,
                'titulo' => $this->titulo,
                'descripcion' => $this->descripcion
            ];
        }
    }
?>
<?php
    /**
     * Clase Departamento
     * 
     * Clase que representa un departamento y sus datos
     * 
     * @author  Jesús Ferreras
     * 
     * @category 
     */
    class Departamento {
        /** @var  string  $codDepartamento  Código del departamento */
        private $codDepartamento;
        
        /** @var  string  $descDepartamento  Descripción del departamento */
        private $descDepartamento;
        
        /** @var  DateTime  $fechaCreacionDepartamento  Fecha de creación del departamento */
        private $fechaCreacionDepartamento;
        
        /** @var  float  $volumenDeNegocio  Volumen de negocio del departamento */
        private $volumenDeNegocio;
        
        /** @var  DateTime  $fechaBajaDepartamento  Fecha de baja del departamento */
        private $fechaBajaDepartamento;
        
        
        /**
         * Función constructora
         * 
         * Construye un nuevo objeto de la clase Departamento a partir de los datos introducidos
         * 
         * @param  string    $codDepartamento            Código del departamento
         * @param  string    $descDepartamento           Descripción del departamento
         * @param  DateTime  $fechaCreacionDepartamento  Fecha de creación del departamento
         * @param  float     $volumenDeNegocio           Volúmen de negocio del departamento
         * @param  DateTime  $fechaBajaDepartamento      Fecha de baja del departamento
         */
        public function __construct($codDepartamento, $descDepartamento, $fechaCreacionDepartamento, $volumenDeNegocio, $fechaBajaDepartamento) {
            $this->codDepartamento = $codDepartamento;
            $this->descDepartamento = $descDepartamento;
            $this->fechaCreacionDepartamento = $fechaCreacionDepartamento;
            $this->volumenDeNegocio = $volumenDeNegocio;
            $this->fechaBajaDepartamento = $fechaBajaDepartamento;
        }
        
        /**
         * Función getCodDepartamento
         * 
         * Devuelve el código del departamento
         * 
         * @return  string  Código del departamento
         */
        public function getCodDepartamento() {
            return $this->codDepartamento;
        }

        /**
         * Función getDescDepartamento
         * 
         * Devuelve la descripción del departamento
         * 
         * @return  string  Decripción del departamento
         */
        public function getDescDepartamento() {
            return $this->descDepartamento;
        }

        /**
         * Función getFechaCreacionDepartamento
         * 
         * Devuelve la fecha de creación del departamento
         * 
         * @return  DateTime  Fecha de creación del departamento
         */
        public function getFechaCreacionDepartamento() {
            return $this->fechaCreacionDepartamento;
        }

        /**
         * Función getVolumenDeNegocio
         * 
         * Devuelve el volumen de negocio del departamento
         * 
         * @return  float  Volumen de negocio del departamento
         */
        public function getVolumenDeNegocio() {
            return $this->volumenDeNegocio;
        }

        /**
         * Función getFechaBajaDepartamento
         * 
         * Devuelve la fecha de baja del departamento
         * 
         * @return  DateTime  Fecha de baja del departamento
         */
        public function getFechaBajaDepartamento() {
            return $this->fechaBajaDepartamento;
        }

        /**
         * Función setCodDepartamento
         * 
         * Sustituye el código del departamento por el indicado
         * 
         * @param  string  $codDepartamento  Código del departamento
         */
        public function setCodDepartamento($codDepartamento): void {
            $this->codDepartamento = $codDepartamento;
        }

        /**
         * Función setDescDepartamento
         * 
         * Sustituye la descripción del departamento por la indicada
         * 
         * @param  string  $descDepartamento  Descripción del departamento
         */
        public function setDescDepartamento($descDepartamento): void {
            $this->descDepartamento = $descDepartamento;
        }

        /**
         * Función setDepartamento
         * 
         * Sustituye la fecha de creación del departamento por la indicada
         * 
         * @param  DateTime  $fechaCreacionDepartamento  Fecha de creación del departamento
         */
        public function setFechaCreacionDepartamento($fechaCreacionDepartamento): void {
            $this->fechaCreacionDepartamento = $fechaCreacionDepartamento;
        }

        /**
         * Función setVolumenDeNegocio
         * 
         * Sustituye el volumen de negocio del departamento por el indicado
         * 
         * @param  float  $volumenDeNegocio  Volumen de negocio del departamento
         */
        public function setVolumenDeNegocio($volumenDeNegocio): void {
            $this->volumenDeNegocio = $volumenDeNegocio;
        }

        /**
         * Función setFechaBajaDepartamento
         * 
         * Sustituye la fecha de baja del departamento por la indicada
         * 
         * @param  DateTime  $fechaBajaDepartamento  Fecha de baja del departamento
         */
        public function setFechaBajaDepartamento($fechaBajaDepartamento): void {
            $this->fechaBajaDepartamento = $fechaBajaDepartamento;
        }
        
        /**
         * Función getArrayDatos
         * 
         * Devuelve un array asociativo con cada uno de los atributos del departamento
         * 
         * @return  mixed[]  Datos del departamento
         */
        public function getArrayDatos() {
            return [
                'codDepartamento' => $this->codDepartamento,
                'descDepartamento' => $this->descDepartamento,
                'fechaCreacionDepartamento' => $this->fechaCreacionDepartamento,
                'volumenDeNegocio' => $this->volumenDeNegocio,
                'fechaBajaDepartamento' => $this->fechaBajaDepartamento
            ];
        }
    }
?>
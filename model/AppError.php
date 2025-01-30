<?php
    /**
     * Clase AppError
     * 
     * Clase que representa un error y sus datos
     * 
     * @author  Jesús Ferreras
     * 
     * @category 
     */
    class AppError {
        /** @var  string  $codError  Código del error */
        private $codError;
        
        /** @var  string  $descError  Descripción del error */
        private $descError;
        
        /** @var  string  $archivoError  Archivo en el que ha ocurrido el error */
        private $archivoError;
        
        /** @var  int  $lineaError  Línea en la que ha ocurrido el error */
        private $lineaError;
        
        /** @var  string  $paginaSiguiente  Página a la que hay que volver */
        private $paginaSiguiente;
        
        /**
         * Función constructora
         * 
         * Construye un nuevo objeto de la clase AppError a partir de los datos introducidos
         * 
         * @param  string  $codError         Código del error
         * @param  string  $descError        Descripción del error
         * @param  string  $archivoError     Archivo en el que ha ocurrido el error
         * @param  int     $lineaError       Línea en la que ha ocurrido el error
         * @param  string  $paginaSiguiente  Página a la que hay que volver
         */
        public function __construct($codError, $descError, $archivoError, $lineaError, $paginaSiguiente) {
            $this->codError = $codError;
            $this->descError = $descError;
            $this->archivoError = $archivoError;
            $this->lineaError = $lineaError;
            $this->paginaSiguiente = $paginaSiguiente;
        }
        
        /**
         * Función getCodError
         * 
         * Devuelve el código del error
         * 
         * @return  string  Código del error
         */
        public function getCodError() {
            return $this->codError;
        }

        /**
         * Función getDescError
         * 
         * Devuelve la descripción del error
         * 
         * @return  string  Descripción del error
         */
        public function getDescError() {
            return $this->descError;
        }

        /**
         * Función getArchivoError
         * 
         * Devuelve el archivo en el que ha ocurrido el error
         * 
         * @return  string  Archivo en el que ha ocurrido el error
         */
        public function getArchivoError() {
            return $this->archivoError;
        }

        /**
         * Función getLineaError
         * 
         * Devuelve la línea en la que ha ocurrido el error
         * 
         * @return  int  Línea en la que ha ocurrido el error
         */
        public function getLineaError() {
            return $this->lineaError;
        }

        /**
         * Función getPaginaSiguiente
         * 
         * Devuelve la página a la que hay que volver
         * 
         * @return  string  Página a la que hay que volver
         */
        public function getPaginaSiguiente() {
            return $this->paginaSiguiente;
        }

        /**
         * Función setCodError
         * 
         * Sustituye el código del error por el indicado
         * 
         * @param  string  $codError  Código del error
         */
        public function setCodError($codError): void {
            $this->codError = $codError;
        }

        /**
         * Función setDescError
         * 
         * Sustituye la descripción del error por la indicada
         * 
         * @param  string  $descError  Descripción del error
         */
        public function setDescError($descError): void {
            $this->descError = $descError;
        }

        /**
         * Función setArchivoError
         * 
         * Sustituye el archivo en el que ha ocurrido el error por el indicado
         * 
         * @param  string  $archivoError  Archivo en el que ha ocurrido el error
         */
        public function setArchivoError($archivoError): void {
            $this->archivoError = $archivoError;
        }

        /**
         * Función setLineaError
         * 
         * Sustituye la línea en la que ha ocurrido el error por la indicada
         * 
         * @param  int  $lineaError  Línea en la que ha ocurrido el error
         */
        public function setLineaError($lineaError): void {
            $this->lineaError = $lineaError;
        }

        /**
         * Función setPaginaSiguiente
         * 
         * Sustituye la página a la que hay que volver por l indicad
         * 
         * @param  string  $paginaSiguiente  Página a la que hay que volver
         */
        public function setPaginaSiguiente($paginaSiguiente): void {
            $this->paginaSiguiente = $paginaSiguiente;
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
                'codError' => $this->codError,
                'descError' => $this->descError,
                'archivoError' => $this->archivoError,
                'lineaError' => $this->lineaError,
                'paginaSiguiente' => $this->paginaSiguiente
            ];
        }
    }
?>
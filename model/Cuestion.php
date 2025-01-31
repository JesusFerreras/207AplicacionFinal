<?php
    /**
     * Clase
     * 
     * 
     * 
     * @author  Jesús Ferreras
     * 
     * @category 
     */
    class Cuestion {
        /** @var    $   */
        private $codCuestion;
        
        /** @var    $   */
        private $descCuestion;
        
        /** @var    $   */
        private $numOrden;
        
        /** @var    $   */
        private $tipoRespuesta;
        
        /** @var    $   */
        private $listaOpinionesCuestion;
        
        
        /**
         * Función constructora
         * 
         * Construye un nuevo objeto de la clase  a partir de los datos introducidos
         * 
         * @param    $  del
         * @param    $  del
         * @param    $  del
         * @param    $  del
         * @param    $  del
         * @param    $  del
         * @param    $  del
         * @param    $  del
         */
        public function __construct($codCuestion, $descCuestion, $numOrden, $tipoRespuesta, $listaOpinionesCuestion) {
            $this->codCuestion = $codCuestion;
            $this->descCuestion = $descCuestion;
            $this->numOrden = $numOrden;
            $this->tipoRespuesta = $tipoRespuesta;
            $this->listaOpinionesCuestion = $listaOpinionesCuestion;
        }
        
        /**
         * Función get
         * 
         * Devuelve l  del
         * 
         * @return    del
         */
        public function getCodCuestion() {
            return $this->codCuestion;
        }

        /**
         * Función get
         * 
         * Devuelve l  del
         * 
         * @return    del
         */
        public function getDescCuestion() {
            return $this->descCuestion;
        }

        /**
         * Función get
         * 
         * Devuelve l  del
         * 
         * @return    del
         */
        public function getNumOrden() {
            return $this->numOrden;
        }

        /**
         * Función get
         * 
         * Devuelve l  del
         * 
         * @return    del
         */
        public function getTipoRespuesta() {
            return $this->tipoRespuesta;
        }

        /**
         * Función get
         * 
         * Devuelve l  del
         * 
         * @return    del
         */
        public function getListaOpinionesCuestion() {
            return $this->listaOpinionesCuestion;
        }

        /**
         * Función set
         * 
         * Sustituye  de  por l indicad
         * 
         * @param    $  
         */
        public function setCodCuestion($codCuestion): void {
            $this->codCuestion = $codCuestion;
        }

        /**
         * Función set
         * 
         * Sustituye  de  por l indicad
         * 
         * @param    $  
         */
        public function setDescCuestion($descCuestion): void {
            $this->descCuestion = $descCuestion;
        }

        /**
         * Función set
         * 
         * Sustituye  de  por l indicad
         * 
         * @param    $  
         */
        public function setNumOrden($numOrden): void {
            $this->numOrden = $numOrden;
        }

        /**
         * Función set
         * 
         * Sustituye  de  por l indicad
         * 
         * @param    $  
         */
        public function setTipoRespuesta($tipoRespuesta): void {
            $this->tipoRespuesta = $tipoRespuesta;
        }

        /**
         * Función set
         * 
         * Sustituye  de  por l indicad
         * 
         * @param    $  
         */
        public function setListaOpinionesCuestion($listaOpinionesCuestion): void {
            $this->listaOpinionesCuestion = $listaOpinionesCuestion;
        }
    }
?>
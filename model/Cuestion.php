<?php
    class Cuestion {
        private $codCuestion;
        private $descCuestion;
        private $numOrden;
        private $tipoRespuesta;
        private $listaOpinionesCuestion;
        
        public function __construct($codCuestion, $descCuestion, $numOrden, $tipoRespuesta, $listaOpinionesCuestion) {
            $this->codCuestion = $codCuestion;
            $this->descCuestion = $descCuestion;
            $this->numOrden = $numOrden;
            $this->tipoRespuesta = $tipoRespuesta;
            $this->listaOpinionesCuestion = $listaOpinionesCuestion;
        }
        
        public function getCodCuestion() {
            return $this->codCuestion;
        }

        public function getDescCuestion() {
            return $this->descCuestion;
        }

        public function getNumOrden() {
            return $this->numOrden;
        }

        public function getTipoRespuesta() {
            return $this->tipoRespuesta;
        }

        public function getListaOpinionesCuestion() {
            return $this->listaOpinionesCuestion;
        }

        public function setCodCuestion($codCuestion): void {
            $this->codCuestion = $codCuestion;
        }

        public function setDescCuestion($descCuestion): void {
            $this->descCuestion = $descCuestion;
        }

        public function setNumOrden($numOrden): void {
            $this->numOrden = $numOrden;
        }

        public function setTipoRespuesta($tipoRespuesta): void {
            $this->tipoRespuesta = $tipoRespuesta;
        }

        public function setListaOpinionesCuestion($listaOpinionesCuestion): void {
            $this->listaOpinionesCuestion = $listaOpinionesCuestion;
        }
    }
?>
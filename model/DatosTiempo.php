<?php
    class DatosTiempo {
        private $tiempo;
        private $temperatura;
        private $velViento;
        private $dirViento;
        private $nubosidad;
        private $humedad;
        
        public function __construct($tiempo, $temperatura, $velViento, $dirViento, $nubosidad, $humedad) {
            $this->tiempo = $tiempo;
            $this->temperatura = $temperatura;
            $this->velViento = $velViento;
            $this->dirViento = $dirViento;
            $this->nubosidad = $nubosidad;
            $this->humedad = $humedad;
        }
        
        public function getTiempo() {
            return $this->tiempo;
        }

        public function getTemperatura() {
            return $this->temperatura;
        }

        public function getVelViento() {
            return $this->velViento;
        }

        public function getDirViento() {
            return $this->dirViento;
        }

        public function getNubosidad() {
            return $this->nubosidad;
        }

        public function getHumedad() {
            return $this->humedad;
        }

        public function setTiempo($tiempo): void {
            $this->tiempo = $tiempo;
        }

        public function setTemperatura($temperatura): void {
            $this->temperatura = $temperatura;
        }

        public function setVelViento($velViento): void {
            $this->velViento = $velViento;
        }

        public function setDirViento($dirViento): void {
            $this->dirViento = $dirViento;
        }

        public function setNubosidad($nubosidad): void {
            $this->nubosidad = $nubosidad;
        }

        public function setHumedad($humedad): void {
            $this->humedad = $humedad;
        }

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
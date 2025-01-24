<?php
    interface DB {
        
        public static function ejecutarConsulta($sentenciaSQL, $parametros);
    }
?>
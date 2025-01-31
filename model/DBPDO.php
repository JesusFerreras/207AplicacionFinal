<?php
    /**
     * Clase BDPDO
     * 
     * Clase que conecta a una base de datos para realizar consultas
     * 
     * @author  Jesús Ferreras
     * 
     * @category 
     */
    class DBPDO implements DB {
        
        /**
         * Función ejecutarConsulta
         * 
         * Función que ejecuta una sentencia SQL y devuelve el resultado
         * 
         * @param  string   $sentenciaSQL   Cadena de texto a ejecutar como 
         * @param  mixed[]  $parametros     Opcional. Array asociativo tal que cada clave sea el nombre de uno
         *                                  de los marcadores de $sentenciaSQL y el número de datos
         *                                  sea igual al número de marcadores
         * 
         * @return  PDOStatement  Un objeto PDOStatement ya ejecutado
         */
        #[\Override]
        public static function ejecutarConsulta($sentenciaSQL, $parametros = null) {
            try {
                $DB = new PDO(DSN, USUARIO, PASSWORD);

                $stmt = $DB->prepare($sentenciaSQL);
                
                $stmt->execute($parametros);

                return $stmt;
            } catch (PDOException $ex) {
                $_SESSION['error'] = new AppError($ex->getCode(), $ex->getMessage(), $ex->getFile(), $ex->getLine(), $_SESSION['paginaEnCurso']);
                $_SESSION['paginaEnCurso'] = 'error';
                
                unset($DB);
                
                header('Location: index.php');
                exit();
            } finally {
                unset($DB);
            }
        }
    }
?>
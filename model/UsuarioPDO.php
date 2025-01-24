<?php
    class UsuarioPDO implements UsuarioDB {
        
        /**
         * Función 
         * 
         * 
         * 
         * @param  string  $codUsuario  Código del usuario
         * @param  string  $password    Contraseña del usuario
         * 
         * @return  Usuario  Usuario
         */
        #[\Override]
        public static function validarUsuario($codUsuario, $password) {
            $seleccion = <<<FIN
                select * from T01_Usuario
                    where T01_CodUsuario = :codUsuario
                    and T01_Password = sha2(:contrasena, 256)
                ;
            FIN;
            
            $parametros = [
                ':codUsuario' => $codUsuario,
                ':contrasena' => $codUsuario.$password
            ];
            
            $consulta = DBPDO::ejecutarConsulta($seleccion, $parametros);
            
            if($consulta->rowCount() > 0) {
                $datos = $consulta->fetchObject();
                
                return new Usuario(
                    $datos->T01_CodUsuario,
                    $datos->T01_Password,
                    $datos->T01_DescUsuario,
                    $datos->T01_NumConexiones,
                    new DateTime($datos->T01_FechaHoraUltimaConexion),
                    null,
                    $datos->T01_Perfil,
                    $datos->T01_ImagenUsuario,
                    null
                );
            } else {
                return false;
            }
        }
        
        /**
         * Función 
         * 
         * 
         * 
         * @param
         * 
         * @return  Usuario  Usuario actualizado
         */
        public static function registrarUltimaConexion($usuario) {
            $usuario->setFechaHoraUltimaConexionAnterior($usuario->getFechaHoraUltimaConexion());
            $usuario->setFechaHoraUltimaConexion(new DateTime('now'));
            $usuario->setNumConexiones($usuario->getNumConexiones() + 1);
            
            DBPDO::ejecutarConsulta(<<<FIN
                update T01_Usuario
                    set T01_NumConexiones = T01_NumConexiones+1,
                    T01_FechaHoraUltimaConexion = now()
                    where T01_CodUsuario = '{$usuario->getCodUsuario()}'
                ;
            FIN);
                    
            return $usuario;
        }
        
        /**
         * Función 
         * 
         * 
         * 
         * @param
         * 
         * @return
         */
        public static function buscarUsuarioPorCod() {

        }
        
        /**
         * Función altaUsuario
         * 
         * 
         * 
         * @param  string  $codUsuario     Código del usuario
         * @param  string  $password       Contraseña del usuario
         * @param  string  $descUsuario    Descripción del usuario
         * @param          $imagenUsuario  Imágen del usuario
         * 
         * @return
         */
        public static function altaUsuario($codUsuario, $password, $descUsuario, $imagenUsuario = null) {
            $insercion = <<<FIN
                insert into T01_Usuario(T01_CodUsuario, T01_Password, T01_DescUsuario, T01_ImagenUsuario) values
                    (:codUsuario, sha2(:contrasena, 256), :descUsuario, :imagenUsuario)
                ;
            FIN;
            
            $parametros = [
                'codUsuario' => $codUsuario,
                'contrasena' => $codUsuario.$password,
                'descUsuario' => $descUsuario,
                'imagenUsuario' => $imagenUsuario
            ];
            
            $seleccion = <<<FIN
                select * from T01_Usuario
                    where T01_CodUsuario = '$codUsuario'
                ;
            FIN;
            
            DBPDO::ejecutarConsulta($insercion, $parametros);
            
            $datos = DBPDO::ejecutarConsulta($seleccion)->fetchObject();
            
            return new Usuario(
                $datos->T01_CodUsuario,
                $datos->T01_Password,
                $datos->T01_DescUsuario,
                $datos->T01_NumConexiones,
                new DateTime($datos->T01_FechaHoraUltimaConexion),
                null,
                $datos->T01_Perfil,
                $datos->T01_ImagenUsuario,
                null
            );
        }
        
        /**
         * Función 
         * 
         * 
         * 
         * @param
         * 
         * @return
         */
        public static function validarCodNoExiste($codUsuario) {
            return (
                DBPDO::ejecutarConsulta(<<<FIN
                    select T01_CodUsuario from T01_Usuario
                        where T01_CodUsuario = '$codUsuario'
                    ;
                FIN)->rowCount() == 0
            );
        }
        
        /**
         * Función 
         * 
         * 
         * 
         * @param
         * 
         * @return
         */
        public static function modificarUsuario() {

        }
        
        /**
         * Función 
         * 
         * 
         * 
         * @param
         * 
         * @return
         */
        public static function cambiarPassword() {

        }
        
        /**
         * Función 
         * 
         * 
         * 
         * @param
         * 
         * @return
         */
        public static function borrarUsuario() {

        }
        
        /**
         * Función 
         * 
         * 
         * 
         * @param
         * 
         * @return
         */
        public static function buscaUsuariosPorDesc() {

        }
        
        /**
         * Función 
         * 
         * 
         * 
         * @param
         * 
         * @return
         */
        public static function creaOpinion() {

        }
        
        /**
         * Función 
         * 
         * 
         * 
         * @param
         * 
         * @return
         */
        public static function modificaOpinion() {

        }
        
        /**
         * Función 
         * 
         * 
         * 
         * @param
         * 
         * @return
         */
        public static function borraOpinion() {

        }
        
        /**
         * Función 
         * 
         * 
         * 
         * @param
         * 
         * @return
         */
        public static function buscarOpinionesUsuario(){
            
        }
    }
?>
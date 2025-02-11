<?php
    /**
     * Clase
     * 
     * Clase a través de la cual se realizan las consultas a la base de datos en lo que respecta a los usuarios
     * 
     * @author  Jesús Ferreras
     * 
     * @category 
     */
    class UsuarioPDO implements UsuarioDB {
        
        /**
         * Función validarUsuario
         * 
         * Función que comprueba que el código y la contraseña sin cifrar corresponde a un usuario existente
         * 
         * @param  string  $codUsuario  Código del usuario
         * @param  string  $password    Contraseña sin cifrar del usuario
         * 
         * @return  Usuario  Usuario con el código y la contraseña indicados, false si no existe
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
         * Función registrarUltimaConexion
         * 
         * Función que actualiza el usuario para indicar que se ha conectado
         * 
         * @param  Usuario  $usuario  Usuario a actualizar
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
         * Función buscarUsuarioPorCod
         * 
         * Función que busca un usuario por su código y lo devuelve
         * 
         * @param  string  $codUsuario  Código del usuario a buscar
         * 
         * @return  Usuario  Usuario con el código indicado, false si no existe
         */
        public static function buscarUsuarioPorCod($codUsuario) {
            $seleccion = <<<FIN
                select * from T01_Usuario
                    where T01_CodUsuario = '$codUsuario'
                ;
            FIN;
            
            $consulta = DBPDO::ejecutarConsulta($seleccion);
            
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
         * Función altaUsuario
         * 
         * Función que crea un usuario, lo da de alta y lo devuelve
         * 
         * @param  string  $codUsuario     Código del usuario
         * @param  string  $password       Contraseña del usuario
         * @param  string  $descUsuario    Descripción del usuario
         * @param          $imagenUsuario  Opcional, imagen del usuario
         * 
         * @return  Usuario  Usuario ya dado de alta
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
         * Función validaCodNoExiste
         * 
         * Función que comprueba si existe un usuario con el código indicado
         * 
         * @param  string  $codUsuario  Código a comprobar
         * 
         * @return  bool  True si el código no existe, false en caso contrario
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
         * Función modificarUsuario
         * 
         * Función que modifica la descripción e imagen del usuario indicado
         * 
         * @param  Usuario  $usuario        Usuario a modificar
         * @param  string   $descUsuario    Nueva descripción del usuario
         * @param           $imagenUsuario  Opcional, nueva imagen del usuario
         * 
         * @return  Usuario  Usuario ya modificado
         */
        public static function modificarUsuario($usuario, $descUsuario, $imagenUsuario = null) {
            $usuario->setDescUsuario($descUsuario);
            if (!is_null($imagenUsuario)) {
                $usuario->setImagenUsuario($imagenUsuario);
                
                $actualizacion = <<<FIN
                    update T01_Usuario
                        set T01_DescUsuario = :descUsuario,
                        T01_ImagenUsuario = :imagenUsuario
                        where T01_CodUsuario = :codUsuario
                    ;
                FIN;
                
                $parametros = [
                    'codUsuario' => $usuario->getCodUsuario(),
                    'descUsuario' => $descUsuario,
                    'imagenUsuario' => $imagenUsuario
                ];
            } else {
                $actualizacion = <<<FIN
                    update T01_Usuario
                        set T01_DescUsuario = :descUsuario,
                        where T01_CodUsuario = :codUsuario
                    ;
                FIN;
                
                $parametros = [
                    'codUsuario' => $usuario->getCodUsuario(),
                    'descUsuario' => $descUsuario
                ];
            }
            
            DBPDO::ejecutarConsulta($actualizacion, $parametros);
                    
            return $usuario;
        }
        
        /**
         * Función 
         * 
         * Función que 
         * 
         * @param    $  
         * 
         * @return
         */
        public static function cambiarPassword() {

        }
        
        /**
         * Función 
         * 
         * Función que 
         * 
         * @param    $  
         * 
         * @return
         */
        public static function borrarUsuario() {

        }
        
        /**
         * Función 
         * 
         * Función que 
         * 
         * @param    $  
         * 
         * @return
         */
        public static function buscarUsuariosPorDesc() {

        }
        
        /**
         * Función 
         * 
         * Función que 
         * 
         * @param    $  
         * 
         * @return
         */
        public static function crearOpinion() {

        }
        
        /**
         * Función 
         * 
         * Función que 
         * 
         * @param    $  
         * 
         * @return
         */
        public static function modificarOpinion() {

        }
        
        /**
         * Función 
         * 
         * Función que 
         * 
         * @param    $  
         * 
         * @return
         */
        public static function borrarOpinion() {

        }
        
        /**
         * Función 
         * 
         * Función que 
         * 
         * @param    $  
         * 
         * @return
         */
        public static function buscarOpinionesUsuario(){
            
        }
    }
?>
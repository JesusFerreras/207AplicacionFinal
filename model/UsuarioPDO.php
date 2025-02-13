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
         * @param  string  $imagenUsuario  Imagen del usuario
         * 
         * @return  Usuario  Usuario ya dado de alta
         */
        public static function altaUsuario($codUsuario, $password, $descUsuario, $imagenUsuario) {
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
         * @param  string   $imagenUsuario  Nueva imagen del usuario
         * @param  string   $perfil         Opcional, nuevo perfil del usuario ('administrador' o 'usuario')
         * 
         * @return  Usuario  Usuario ya modificado
         */
        public static function modificarUsuario($usuario, $descUsuario, $imagenUsuario, $perfil = null) {
            $usuario->setDescUsuario($descUsuario);
            
            $actualizacion = 'update T01_Usuario set T01_DescUsuario = :descUsuario';
            
            $parametros = [
                'codUsuario' => $usuario->getCodUsuario(),
                'descUsuario' => $descUsuario
            ];
            
            if (!is_null($imagenUsuario)) {
                $usuario->setImagenUsuario($imagenUsuario);
                
                $actualizacion .= ', T01_ImagenUsuario = :imagenUsuario';
                
                $parametros['imagenUsuario'] = $imagenUsuario;
            }
            if (!is_null($perfil)) {
                $usuario->setPerfil($perfil);
                
                $actualizacion .= ', T01_Perfil = :perfil';
                
                $parametros['perfil'] = $perfil;
            }
            
            $actualizacion .= ' where T01_CodUsuario = :codUsuario';
            
            DBPDO::ejecutarConsulta($actualizacion, $parametros);
                    
            return $usuario;
        }
        
        /**
         * Función cambiarPassword
         * 
         * Función que modifica la contraseña del usuario por un cifrado de la indicada
         * 
         * @param  Usuario  $usuario   Usuario cuya contraseña se va a modificar
         * @param  string   $password  Contraseña sin cifrar
         * 
         * @return  Usuario  Usuario ya modificado
         */
        public static function cambiarPassword($usuario, $password) {
            $usuario->setPassword(hash('sha256', $password . $usuario->getCodUsuario()));
            
            $actualizacion = <<<FIN
                update T01_Usuario
                    set T01_Password = sha2(:contrasena, 256)
                    where T01_CodUsuario = :codUsuario
                ;
            FIN;
            
            $parametros = [
                ':codUsuario' => $usuario->getCodUsuario(),
                ':contrasena' => $usuario->getCodUsuario() . $password
            ];
                    
            DBPDO::ejecutarConsulta($actualizacion, $parametros);
                    
            return $usuario;
        }
        
        /**
         * Función borrarUsuario
         * 
         * Función que elimina el usuario indicado
         * 
         * @param  string  $codUsuario  Codigo del usuario a borrar
         */
        public static function borrarUsuario($codUsuario) {
            $borrado = <<<FIN
                delete from T01_Usuario
                    where T01_CodUsuario = '$codUsuario'
                ;
            FIN;
            
            DBPDO::ejecutarConsulta($borrado);
        }
        
        /**
         * Función buscarUsuariosPorDesc
         * 
         * Función que busca los usuarios cuya descripción contenga la cadena indicada y los devuelve como array numérico
         * 
         * @param  string  $descUsuario  Descripción completa o no de los usuarios a buscar
         * @param  int     $limit        Número de registros que se devuelven
         * @param  int     $offset       Posición a partir de la cual se empiezan a contar los registros
         * 
         * @return  Usuario[]  Array numérico con los usuarios encontrados
         */
        public static function buscarUsuariosPorDesc($descUsuario, $limit, $offset) {
            $seleccion = <<<FIN
                select * from T01_Usuario
                    where T01_DescUsuario like '%$descUsuario%'
                    limit $limit offset $offset
                ;
            FIN;
            
            $consulta = DBPDO::ejecutarConsulta($seleccion);
            
            $usuarios = [];
            
            while ($datos = $consulta->fetchObject()) {
                array_push($usuarios, new Usuario(
                    $datos->T01_CodUsuario,
                    $datos->T01_Password,
                    $datos->T01_DescUsuario,
                    $datos->T01_NumConexiones,
                    new DateTime($datos->T01_FechaHoraUltimaConexion),
                    null,
                    $datos->T01_Perfil,
                    $datos->T01_ImagenUsuario,
                    null
                ));
            }
            
            return $usuarios;
        }
        
        /**
         * Función numUsuarios
         * 
         * Función que devuelve el número de usuarios cuya descripción contenga la cadena indicada
         * 
         * @param  string  $descUsuario  Descripción completa o no de los usuarios a buscar
         * 
         * @return  int  Número de usuarios con las características indicadas
         */
        public static function numUsuarios($descUsuario) {
            $seleccion = <<<FIN
                select count(*) from T01_Usuario
                    where T01_DescUsuario like '%$descUsuario%'
                ;
            FIN;
            
            return DBPDO::ejecutarConsulta($seleccion)->fetch()[0];
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
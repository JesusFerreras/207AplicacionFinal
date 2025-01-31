<?php
    /**
     * Clase Usuario
     * 
     * Clase que representa un usuario y sus datos
     * 
     * @author  Jesús Ferreras
     * 
     * @category 
     */
    class Usuario {
        /** @var  string  $codUsuario  Código del usuario */
        private $codUsuario;
        
        /** @var  string  $password  Contraseña del usuario */
        private $password;
        
        /** @var  string  $descUsuario  Descripción del usuario */
        private $descUsuario;
        
        /** @var  int  $numConexiones  Número de veces que se ha conectado el usuario */
        private $numConexiones;
        
        /** @var  DateTime  $fechaHoraUltimaConexion  Fecha y hora a la que se ha conecta el usuario */
        private $fechaHoraUltimaConexion;
        
        /** @var  DateTime  $fechaHoraUltimaConexionAnterior  Fecha y hora a la que se conectó el usuario la vez anterior */
        private $fechaHoraUltimaConexionAnterior;
        
        /** @var  string  $perfil  Perfil del usuario, puede ser 'administrador' o 'usuario' */
        private $perfil;
        
        /** @var    $imagenUsuario  Imagen del usuario */
        private $imagenUsuario;
        
        /** @var    $listaOpinionesUsuario  Lista con las opiniones del usuario */
        private $listaOpinionesUsuario;
        
        
        /**
         * Función constructora
         * 
         * Construye un nuevo objeto de la clase Usuario a partir de los datos introducidos
         * 
         * @param  string    $codUsuario                       Código del usuario
         * @param  string    $password                         Contraseña del usuario
         * @param  string    $descUsuario                      Descripción del usuario
         * @param  int       $numConexiones                    Número de conexiones del usuario
         * @param  DateTime  $fechaHoraUltimaConexion          Fecha y hora a la que se ha conectado el usuario
         * @param  DateTime  $fechaHoraUltimaConexionAnterior  Fecha y hora a la que se conectó el usuario la vez anterior
         * @param  string    $perfil                           Perfil del usuario
         * @param            $imagenUsuario                    Imagen del usuario
         * @param            $listaOpinionesUsuario            Lista de opiniones del usuario
         */
        public function __construct($codUsuario, $password, $descUsuario, $numConexiones, $fechaHoraUltimaConexion, $fechaHoraUltimaConexionAnterior, $perfil, $imagenUsuario, $listaOpinionesUsuario) {
            $this->codUsuario = $codUsuario;
            $this->password = $password;
            $this->descUsuario = $descUsuario;
            $this->numConexiones = $numConexiones;
            $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
            $this->fechaHoraUltimaConexionAnterior = $fechaHoraUltimaConexionAnterior;
            $this->perfil = $perfil;
            $this->imagenUsuario = $imagenUsuario;
            $this->listaOpinionesUsuario = $listaOpinionesUsuario;
        }
        
        /**
         * Función getCodUsuario
         * 
         * Devuelve el código del usuario
         * 
         * @return  string  Código del usuario
         */
        public function getCodUsuario() {
            return $this->codUsuario;
        }

        /**
         * Función getPassword
         * 
         * Devuelve la contraseña del usuario
         * 
         * @return  string  Contraseña del usuario
         */
        public function getPassword() {
            return $this->password;
        }

        /**
         * Función getDescUsuario
         * 
         * Devuelve la descripción del usuario
         * 
         * @return  string  Descripción del usuario
         */
        public function getDescUsuario() {
            return $this->descUsuario;
        }

        /**
         * Función getNumConexiones
         * 
         * Devuelve el número de conexiones del usuario
         * 
         * @return  int  Número de conexiones del usuario
         */
        public function getNumConexiones() {
            return $this->numConexiones;
        }

        /**
         * Función getFechaHoraUltimaConexion
         * 
         * Devuelve la fecha y hora a la que se ha conectado el usuario
         * 
         * @return  DateTime  Fecha y hora de la conexión
         */
        public function getFechaHoraUltimaConexion() {
            return $this->fechaHoraUltimaConexion;
        }

        /**
         * Función getFechaHoraUltimaConexionAnterior
         * 
         * Devuelve la fecha y hora a la que se conectó el usuario la vez anterior
         * 
         * @return  DateTime  Fecha y hora de la conexión anterior
         */
        public function getFechaHoraUltimaConexionAnterior() {
            return $this->fechaHoraUltimaConexionAnterior;
        }

        /**
         * Función getPerfilUsuario
         * 
         * Devuelve el perfil del usuario
         * 
         * @return  string  Perfil del usuario
         */
        public function getPerfil() {
            return $this->perfil;
        }

        /**
         * Función getImagenUsuario
         * 
         * Devuelve la imagen del usuario
         * 
         * @return    Imagen del usuario
         */
        public function getImagenUsuario() {
            return $this->imagenUsuario;
        }
        
        /**
         * Función getListaOpinionesUsuario
         * 
         * Devuelve la lista de opiniones del usuario
         * 
         * @return    Lista de opiniones del usuario
         */
        public function getListaOpinionesUsuario() {
            return $this->listaOpinionesUsuario;
        }
        
        /**
         * Función setCodUsuario
         * 
         * Sustituye el código del usuario por el indicado
         * 
         * @param  string  $codUsuario  Código del usuario
         */
        public function setCodUsuario($codUsuario): void {
            $this->codUsuario = $codUsuario;
        }

        /**
         * Función setPassword
         * 
         * Sustituye la contraseña del usuario por la indicada
         * 
         * @param  string  $password  Contraseña del usuario
         */
        public function setPassword($password): void {
            $this->password = $password;
        }

        /**
         * Función setDescUsuario
         * 
         * Sustituye la descripción del usuario por la indicada
         * 
         * @param  string  $descUsuario  Descripción del usuario
         */
        public function setDescUsuario($descUsuario): void {
            $this->descUsuario = $descUsuario;
        }

        /**
         * Función setNumConexiones
         * 
         * Sustituye el número de conexiones del usuario por el indicado
         * 
         * @param  int  $numConexiones  Número de conexiones del usuario
         */
        public function setNumConexiones($numConexiones): void {
            $this->numConexiones = $numConexiones;
        }

        /**
         * Función setFechaHoraUltimaConexion
         * 
         * Sustituye la fecha y hora a la que se conectó el usuario por las indicadas
         * 
         * @param  DateTime  $fechaHoraUltimaConexion  Fecha y hora de la conexión
         */
        public function setFechaHoraUltimaConexion($fechaHoraUltimaConexion): void {
            $this->fechaHoraUltimaConexion = $fechaHoraUltimaConexion;
        }

        /**
         * Función setFechaHoraUltimaConexionAnterior
         * 
         * Sustituye la fecha y hora a la que se conectó el usuario la vez anterior por las indicadas
         * 
         * @param  DateTime  $fechaHoraUltimaConexionAnterior  Fecha y hora de la conexión anterior
         */
        public function setFechaHoraUltimaConexionAnterior($fechaHoraUltimaConexionAnterior): void {
            $this->fechaHoraUltimaConexionAnterior = $fechaHoraUltimaConexionAnterior;
        }

        /**
         * Función setPerfilUsuario
         * 
         * Sustituye el perfil del usuario por el indicado
         * 
         * @param  string  $perfil  Perfil del usuario
         */
        public function setPerfil($perfil): void {
            $this->perfil = $perfil;
        }
        
        /**
         * Función setImagenUsuario
         * 
         * Sustituye la imagen del usuario por la indicada
         * 
         * @param    $imagenUsuario  Imagen del usuario
         */
        public function setImagenUsuario($imagenUsuario): void {
            $this->imagenUsuario = $imagenUsuario;
        }
        
        /**
         * Función setListaOpinionesUsuario
         * 
         * Sustituye la lista de opiniones del usuario por la indicada
         * 
         * @param    $listaOpinionesUsuario  Lista de opiniones del usuario
         */
        public function setListaOpinionesUsuario($listaOpinionesUsuario): void {
            $this->listaOpinionesUsuario = $listaOpinionesUsuario;
        }
        
        /**
         * Función getArrayDatos
         * 
         * Devuelve un array asociativo con cada uno de los atributos del usuario
         * 
         * @return  mixed[]  Datos del usuario
         */
        public function getArrayDatos() {
            return [
                'codUsuario' => $this->codUsuario,
                'password' => $this->password,
                'descUsuario' => $this->descUsuario,
                'numConexiones' => $this->numConexiones,
                'fechaHoraUltimaConexion' => $this->fechaHoraUltimaConexion,
                'fechaHoraUltimaConexionAnterior' => $this->fechaHoraUltimaConexionAnterior,
                'perfil' => $this->perfil,
                'imagenUsuario' => $this->imagenUsuario,
                'listaOpinionesUsuario' => $this->listaOpinionesUsuario
            ];
        }
    }
?>
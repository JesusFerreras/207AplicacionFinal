<?php
    /**
     * Clase DepartamentoPDO
     * 
     * Clase a través de la cual se realizan las consultas a la base de datos en lo que respecta a los departamentos
     * 
     * @author  Jesús Ferreras
     * 
     * @category 
     */
    class DepartamentoPDO {
        
        /**
         * Función buscarDepartamentoPorCod
         * 
         * Función que busca un departemento en base a su código y lo devuelve
         * 
         * @param  string  $codDepartamento  Código del departamento a buscar
         * 
         * @return  Departamento  Departamento con el código indicado o false si no existe
         */
        public static function buscarDepartamentoPorCod($codDepartamento) {
            $seleccion = <<<FIN
                select * from T02_Departamento
                    where T02_CodDepartamento = '$codDepartamento'
                ;
            FIN;
            
            $consulta = DBPDO::ejecutarConsulta($seleccion);
            
            if ($consulta->rowCount() > 0) {
                $datos = $consulta->fetchObject();

                return new Departamento(
                    $datos->T02_CodDepartamento,
                    $datos->T02_DescDepartamento,
                    new DateTime($datos->T02_FechaCreacionDepartamento),
                    $datos->T02_VolumenDeNegocio,
                    (is_null($datos->T02_FechaBajaDepartamento))? null : new DateTime($datos->T02_FechaBajaDepartamento)
                );
            } else {
                return false;
            }
        }
        
        /**
         * Función buscarDepartamentosPorDesc
         * 
         * Función que busca los departamentos cuya descripción contenga la cadena indicada y los devuelve como array numérico
         * 
         * @param  string  $descDepartamento  Descripción completa o no de los departamentos a buscar
         * @param  int     $limit               Número de registros que se devuelven
         * @param  int     $offset              Posición a partir de la cual se empiezan a contar los registros
         * 
         * @return  Departamento[]  Array numérico con los departamentos encontrados
         */
        public static function buscarDepartamentosPorDesc($descDepartamento, $limit, $offset) {
            $seleccion = <<<FIN
                select * from T02_Departamento
                    where T02_DescDepartamento like '%$descDepartamento%'
                    limit $limit offset $offset
                ;
            FIN;
            
            $consulta = DBPDO::ejecutarConsulta($seleccion);
            
            $departamentos = [];
            
            while ($datos = $consulta->fetchObject()) {
                array_push($departamentos, new Departamento(
                    $datos->T02_CodDepartamento,
                    $datos->T02_DescDepartamento,
                    new DateTime($datos->T02_FechaCreacionDepartamento),
                    $datos->T02_VolumenDeNegocio,
                    ((is_null($datos->T02_FechaBajaDepartamento))? null : new DateTime($datos->T02_FechaBajaDepartamento))
                ));
            }
            
            return $departamentos;
        }
        
        /**
         * Función buscarDepartamentosPorDescYEstado
         * 
         * Función que busca los departamentos cuya descripción contenga la cadena indicada y cuyo estado sea el indicado (0 si está en baja, 1 si está en activo y 2 todos) y los devuelve como array numérico
         * 
         * @param  string  $descDepartamento    Descripción completa o no de los departamentos a buscar
         * @param  int     $estadoDepartamento  Estado en el que se encuentra el departamento: 0 si está en baja, 1 si está en activo y 2 todos
         * @param  int     $limit               Número de registros que se devuelven
         * @param  int     $offset              Posición a partir de la cual se empiezan a contar los registros
         * 
         * @return  Departamento[]  Array numérico con los departamentos encontrados
         */
        public static function buscarDepartamentosPorDescYEstado($descDepartamento, $estadoDepartamento, $limit, $offset) {
            switch ($estadoDepartamento) {
                case 0:
                    $seleccion = <<<FIN
                        select * from T02_Departamento
                            where T02_DescDepartamento like '%$descDepartamento%'
                            and T02_FechaBajaDepartamento is not null
                            limit $limit offset $offset
                        ;
                    FIN;
                break;
                case 1:
                    $seleccion = <<<FIN
                        select * from T02_Departamento
                            where T02_DescDepartamento like '%$descDepartamento%'
                            and T02_FechaBajaDepartamento is null
                            limit $limit offset $offset
                        ;
                    FIN;
                break;
                default:
                    $seleccion = <<<FIN
                        select * from T02_Departamento
                            where T02_DescDepartamento like '%$descDepartamento%'
                            limit $limit offset $offset
                        ;
                    FIN;
                break;
            }
            
            $consulta = DBPDO::ejecutarConsulta($seleccion);
            
            $departamentos = [];
            
            while ($datos = $consulta->fetchObject()) {
                array_push($departamentos, new Departamento(
                    $datos->T02_CodDepartamento,
                    $datos->T02_DescDepartamento,
                    new DateTime($datos->T02_FechaCreacionDepartamento),
                    $datos->T02_VolumenDeNegocio,
                    ((is_null($datos->T02_FechaBajaDepartamento))? null : new DateTime($datos->T02_FechaBajaDepartamento))
                ));
            }
            
            return $departamentos;
        }
        
        /**
         * Función altaDepartamento
         * 
         * Función que da de alta un nuevo departamento y lo devuelve
         * 
         * @param  string  $codDepartamento   Código del nuevo departamento
         * @param  string  $descDepartamento  Descripción del nuevo departamento
         * @param  float   $volumenDeNegocio  Volumen de negocio del nuevo departamento
         */
        public static function altaDepartamento($codDepartamento, $descDepartamento, $volumenDeNegocio) {
            $insercion = <<<FIN
                insert into T02_Departamento(T02_CodDepartamento, T02_DescDepartamento, T02_VolumenDeNegocio) values
                    (:codDepartamento, :descDepartamento, :volumenDeNegocio)
                ;
            FIN;
            
            $parametros = [
                'codDepartamento' => $codDepartamento,
                'descDepartamento' => $descDepartamento,
                'volumenDeNegocio' => $volumenDeNegocio
            ];
            
            DBPDO::ejecutarConsulta($insercion, $parametros);
        }
        
        /**
         * Función bajaFisicaDepartamento
         * 
         * Función que elimina el departamento indicado
         * 
         * @param  string  $codDepartamento  Codigo del departamento a borrar
         */
        public static function bajaFisicaDepartamento($codDepartamento) {
            $borrado = <<<FIN
                delete from T02_Departamento
                    where T02_CodDepartamento = '$codDepartamento'
                ;
            FIN;
            
            DBPDO::ejecutarConsulta($borrado);
        }
        
        /**
         * Función bajaLogicaDepartamento
         * 
         * Función que da de baja el departamento indicado
         * 
         * @param  string  $codDepartamento  Código del departamento a dar de baja
         */
        public static function bajaLogicaDepartamento($codDepartamento) {
            $actualizacion = <<<FIN
                update T02_Departamento
                    set T02_FechaBajaDepartamento = now()
                    where T02_CodDepartamento = '$codDepartamento'
                ;
            FIN;
            
            DBPDO::ejecutarConsulta($actualizacion);
        }
        
        /**
         * Función modificarDepartamento
         * 
         * Función que modifica la descripción y el volumen del departamento con el código indicado
         * 
         * @param  string  $codDepartamento   Código del departamento a modificar
         * @param  string  $descDepartamento  Nueva descripción del departamento
         * @param  float   $volumenDeNegocio  Nuevo volumen del departamento
         * 
         * @return  Departamento  Departamento actualizado
         */
        public static function modificarDepartamento($codDepartamento, $descDepartamento, $volumenDeNegocio) {
            $actualizacion = <<<FIN
                update T02_Departamento
                    set T02_DescDepartamento = :descDepartamento,
                    T02_VolumenDeNegocio = :volumenDeNegocio
                    where T02_CodDepartamento = :codDepartamento
                ;
            FIN;
            
            $parametros = [
                'codDepartamento' => $codDepartamento,
                'descDepartamento' => $descDepartamento,
                'volumenDeNegocio' => $volumenDeNegocio
            ];
            
            $seleccion = <<<FIN
                select * from T02_Departamento
                    where T02_CodDepartamento = '$codDepartamento'
                ;
            FIN;
            
            DBPDO::ejecutarConsulta($actualizacion, $parametros);
            
            $departamento = DBPDO::ejecutarConsulta($seleccion)->fetchObject();
            
            return new Departamento(
                $departamento->T02_CodDepartamento,
                $departamento->T02_DescDepartamento,
                new DateTime($departamento->T02_FechaCreacionDepartamento),
                $departamento->T02_VolumenDeNegocio,
                (is_null($departamento->T02_FechaBajaDepartamento))? null : new DateTime($departamento->T02_FechaBajaDepartamento)
            );
        }
        
        /**
         * Función rehabilitarDepartamento
         * 
         * Función que vuelve a dar de alta a un departamento al que se le ha dado de baja lógica
         * 
         * @param  string  $codDepartamento  Código del departamento a rehabilitar
         */
        public static function rehabilitarDepartamento($codDepartamento) {
            $actualizacion = <<<FIN
                update T02_Departamento
                    set T02_FechaBajaDepartamento = null
                    where T02_CodDepartamento = '$codDepartamento'
                ;
            FIN;
            
            DBPDO::ejecutarConsulta($actualizacion);
        }
        
        /**
         * Función validarCodNoExiste
         * 
         * Función que comprueba si existe un departamento con el código indicado
         * 
         * @param  string  $codDepartamento  Código a comprobar
         * 
         * @return  bool  True si el código no existe, false en caso contrario
         */
        public static function validarCodNoExiste($codDepartamento) {
            return (
                DBPDO::ejecutarConsulta(<<<FIN
                    select T02_CodDepartamento from T02_Departamento
                        where T02_CodDepartamento = '$codDepartamento'
                    ;
                FIN)->rowCount() == 0
            );
        }
        
        /**
         * Función numDepartamentos
         * 
         * Función que devuelve el número de departamentos cuya descripción contenga la cadena indicada y cuyo estado sea el indicado (0 si está en baja, 1 si está en activo y 2 todos)
         * 
         * @param  string  $descDepartamento    Descripción completa o no de los departamentos a buscar
         * @param  int     $estadoDepartamento  Estado en el que se encuentra el departamento: 0 si está en baja, 1 si está en activo y 2 todos
         * 
         * @return  int  Número de departamentos con las características indicadas
         */
        public static function numDepartamentos($descDepartamento, $estadoDepartamento) {
            switch ($estadoDepartamento) {
                case 0:
                    $seleccion = <<<FIN
                        select count(*) from T02_Departamento
                            where T02_DescDepartamento like '%$descDepartamento%'
                            and T02_FechaBajaDepartamento is not null
                        ;
                    FIN;
                break;
                case 1:
                    $seleccion = <<<FIN
                        select count(*) from T02_Departamento
                            where T02_DescDepartamento like '%$descDepartamento%'
                            and T02_FechaBajaDepartamento is null
                        ;
                    FIN;
                break;
                default:
                    $seleccion = <<<FIN
                        select count(*) from T02_Departamento
                            where T02_DescDepartamento like '%$descDepartamento%'
                        ;
                    FIN;
                break;
            }
            
            return DBPDO::ejecutarConsulta($seleccion)->fetch()[0];
        }
    }
?>
<?php
    class DepartamentoPDO {
        
        public static function buscaDepartamentoPorCod($codDepartamento) {
            $seleccion = <<<FIN
                select * from T02_Departamento
                    where T02_CodDepartamento = '$codDepartamento'
                ;
            FIN;
            
            $datos = DBPDO::ejecutarConsulta($seleccion)->fetchObject();
            
            return new Departamento(
                $datos->T02_CodDepartamento,
                $datos->T02_DescDepartamento,
                new DateTime($datos->T02_FechaCreacionDepartamento),
                $datos->T02_VolumenDeNegocio,
                new DateTime($datos->T02_FechaBajaDepartamento)
            );
        }
        
        public static function buscaDepartamentosPorDesc($descDepartamento) {
            $seleccion = <<<FIN
                select * from T02_Departamento
                    where T02_descDepartamento like '%$descDepartamento%'
                ;
            FIN;
            
            $consulta = DBPDO::ejecutarConsulta($seleccion);
            $datos = null;
            
            while ($departamento = $consulta->fetchObject()) {
                array_push($datos, new Departamento(
                    $departamento->T02_CodDepartamento,
                    $departamento->T02_DescDepartamento,
                    new DateTime($departamento->T02_FechaCreacionDepartamento),
                    $departamento->T02_VolumenDeNegocio,
                    new DateTime($departamento->T02_FechaBajaDepartamento)
                ));
            }
            
            return $datos;
        }
        
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
            
            $seleccion = <<<FIN
                select * from T02_Departamento
                    where T02_CodDepartamento = '$codDepartamento'
                ;
            FIN;
            
            DBPDO::ejecutarConsulta($insercion, $parametros);
            
            $datos = DBPDO::ejecutarConsulta($seleccion)->fetchObject();
            
            return new Departamento(
                $datos->T02_CodDepartamento,
                $datos->T02_DescDepartamento,
                new DateTime($datos->T02_FechaCreacionDepartamento),
                $datos->T02_VolumenDeNegocio,
                new DateTime($datos->T02_FechaBajaDepartamento)
            );
        }
        
        public static function bajaFisicaDepartamento() {

        }
        
        public static function bajaLogicaDepartamento() {

        }
        
        public static function modificaDepartamento() {

        }
        
        public static function rehabilitaDepartamento() {

        }
        
        public static function validaCodNoExiste($codDepartamento) {
            return (
                DBPDO::ejecutarConsulta(<<<FIN
                    select T02_CodDepartamento from T02_Departamento
                        where T02_CodDepartamento = '$codDepartamento'
                    ;
                FIN)->rowCount() == 0
            );
        }
    }
?>
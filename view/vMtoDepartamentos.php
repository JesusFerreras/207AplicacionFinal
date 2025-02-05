<header>
    <h1>Aplicación Final</h1>
    <button id="cambioTema">&#x25D1;</button>
    <form action="<?php print($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
        <input type="submit" id="volver" name="volver" value="Volver">
    </form>
</header>
<main>
    <form id="navegacion" action="<?php print($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
        <input type="submit" id="altaDepartamento" name="altaDepartamento" value="Dar de alta un departamento">
        <input type="submit" id="exportarDepartamentos" name="exportarDepartamentos" value="Exportar departamentos">
        <input type="submit" id="importarDepartamentos" name="importarDepartamentos" value="Importar departamentos">
    </form>
    <div id="contenido">
        <form id="busquedaDepartamentos" action="<?php print($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
            <input type="text" id="descDepartamento" name="descDepartamento" <?php print(isset($_REQUEST['descDepartamento'])? "value=\"{$_REQUEST['descDepartamento']}\"" : ''); ?>>
            <input type="submit" id="buscarDepartamento" name="buscarDepartamento" value="Buscar">
        </form>
        <table>
            <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th>Fecha de creación</th>
                <th>Volumen de negocio</th>
                <th>Fecha de baja</th>
                <th></th>
            </tr>
            <?php
                foreach ($datosDepartamentos as $departamento) {
                    print(is_null($departamento['fechaBajaDepartamento'])? '<tr>' : '<tr class="enBaja">');
                    foreach ($departamento as $valor) {
                        if ($valor instanceof DateTime) {
                            print('<td>'.date_format($valor,'d/m/Y H:i:s').'</td>');
                        } else {
                            print("<td>$valor</td>");
                        }
                    }
                    print(<<<FIN
                        <td>
                            <form class="accionDepartamento" action="{$_SERVER['PHP_SELF']}" method="post" novalidate>
                                <input type="submit" id="modificar{$departamento['codDepartamento']}" name="modificar{$departamento['codDepartamento']}" value="&#9998;">
                                <input type="submit" id="eliminar{$departamento['codDepartamento']}" name="eliminar{$departamento['codDepartamento']}" value="&#128465;">
                    FIN . (is_null($departamento['fechaBajaDepartamento'])? 
                                "<input type=\"submit\" id=\"baja{$departamento['codDepartamento']}\" name=\"baja{$departamento['codDepartamento']}\" value=\"&#9660;\">" :
                                "<input type=\"submit\" id=\"rehabilitar{$departamento['codDepartamento']}\" name=\"rehabilitar{$departamento['codDepartamento']}\" value=\"&#9650;\">"
                    ) . <<<FIN
                            </form>
                        </td>
                    </tr>
                    FIN);
                }
            ?>
        </table>
    </div>
</main>
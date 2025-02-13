<header>
    <h1>Aplicación Final</h1>
    <button id="cambioTema">&#x25D1;</button>
    <form action="<?php print($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
        <input type="submit" id="volver" name="volver" value="Volver">
    </form>
</header>
<main>
    <div id="contenido">
        <h2>Mantenimiento de Usuarios</h2>
        <form id="busquedaUsuarios" action="<?php print($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
            <div id="parametrosBusqueda">
                <label for="descUsuario">Descripción</label>
                <input type="text" id="descUsuario" name="descUsuario" value="<?php print($_SESSION['descUsuario']); ?>">
            </div>
            <input type="submit" id="buscarUsuario" name="buscarUsuario" value="Buscar">
        </form>
        <table>
            <tr>
                <th>Código</th>
                <th>Descripción</th>
                <th>Número de conexiones</th>
                <th>Fecha de la última conexión</th>
                <th>Perfil</th>
                <th>Imagen</th>
                <th></th>
            </tr>
            <?php
                foreach ($datosUsuarios as $usuario) {
                    print('<tr>');
                    foreach ($usuario as $clave => $valor) {
                        if ($clave != 'password' && $clave != 'fechaHoraUltimaConexionAnterior' && $clave != 'listaOpinionesUsuario') {
                            if ($clave == 'fechaHoraUltimaConexion') {
                                print('<td>'.date_format($valor,'d/m/Y H:i:s').'</td>');
                            } else if ($clave == 'imagenUsuario') {
                                print(is_null($valor)? '<td>-</td>' : '<td><img src="data:image/jpeg;charset=utf8;base64,'.base64_encode(stripslashes($valor)).'" alt="imagenUsuario"></td>');
                            } else {
                                print("<td>$valor</td>");
                            }
                        }
                    }
                    print(<<<FIN
                        <td>
                            <form class="accionUsuario" action="{$_SERVER['PHP_SELF']}" method="post" novalidate>
                                <input type="submit" id="modificar{$usuario['codUsuario']}" name="modificar{$usuario['codUsuario']}" value="&#9998;">
                                <input type="submit" id="eliminar{$usuario['codUsuario']}" name="eliminar{$usuario['codUsuario']}" value="&#128465;">
                            </form>
                        </td>
                    </tr>
                    FIN);
                }
            ?>
        </table>
        <form id="paginaUsuarios" action="<?php print($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
            <input type="submit" id="paginaPrimera" name="paginaPrimera" value="|&lt;" <?php print(($_SESSION['numPagina'] == 0)? 'disabled' : ''); ?>>
            <input type="submit" id="paginaAnterior" name="paginaAnterior" value="&lt;" <?php print(($_SESSION['numPagina'] == 0)? 'disabled' : ''); ?>>
            <?php print('<p id="numPaginacion">' . ($_SESSION['numPagina']+1) . '/' . $numPaginas . '</p>'); ?>
            <input type="submit" id="paginaSiguiente" name="paginaSiguiente" value="&gt;" <?php print(($_SESSION['numPagina'] == $numPaginas-1)? 'disabled' : ''); ?>>
            <input type="submit" id="paginaUltima" name="paginaUltima" value="&gt;|" <?php print(($_SESSION['numPagina'] == $numPaginas-1)? 'disabled' : ''); ?>>
        </form>
    </div>
</main>
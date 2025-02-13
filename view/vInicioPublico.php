<header>
    <h1>Aplicación Final</h1>
    <button id="cambioTema">&#x25D1;</button>
    <form action="<?php print($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
        <input type="submit" id="login" name="login" value="Login">
    </form>
</header>
<main>
    <div id="contenido">
        <h3>Uso de $_SESSION</h3>
        <table>
            <tr>
                <th>Nombre</th>
                <th>Tipo</th>
                <th>Uso</th>
            </tr>
            <tr>
                <th>$_SESSION['paginaEnCurso']</th>
                <td>string</td>
                <td>Guarda la página en la que se está o la que se va a cargar inmediatamente</td>
            </tr>
            <tr>
                <th>$_SESSION['usuarioDAW207AplicacionFinal']</th>
                <td>Usuario</td>
                <td>Guarda el usuario que se ha conectado</td>
            </tr>
            <tr>
                <th>$_SESSION['error']</th>
                <td>AppError</td>
                <td>Guarda el error que haya ocurrido</td>
            </tr>
            <tr>
                <th>$_SESSION['descDepartamento']</th>
                <td>string</td>
                <td>Guarda la descripción del departamento a buscar en la página de mantenimiento de departamentos</td>
            </tr>
            <tr>
                <th>$_SESSION['estadoDepartamento']</th>
                <td>int</td>
                <td>Guarda el estado del departamento a buscar en la página de mantenimiento de departamentos</td>
            </tr>
            <tr>
                <th>$_SESSION['codDepartamentoEnCurso']</th>
                <td>string</td>
                <td>Guarda el código del departamento con el que se va a operar (modificar y eliminar)</td>
            </tr>
            <tr>
                <th>$_SESSION['descUsuario']</th>
                <td>string</td>
                <td>Guarda la descripción del usuario a buscar en la página de mantenimiento de usuarios</td>
            </tr>
            <tr>
                <th>$_SESSION['codUsuarioEnCurso']</th>
                <td>string</td>
                <td>Guarda el código del usuario con el que se va a operar (modificar y eliminar)</td>
            </tr>
            <tr>
                <th>$_SESSION['numPagina']</th>
                <td>int</td>
                <td>Guarda el número de página en la tabla de departamentos o usuarios</td>
            </tr>
            <tr>
                <th>$_SESSION['fechaNasa']</th>
                <td>string</td>
                <td>Guarda la fecha para la Foto del Día de la NASA</td>
            </tr>
            <tr>
                <th>$_SESSION['ubicacionTiempo']</th>
                <td>float[]</td>
                <td>Guarda la latitud y longitud de la ubicación cuyo tiempo se quiere ver en la ventana de REST</td>
            </tr>
        </table>
        <div>
            <h3>Diagrama de Clases</h3>
            <img src="webroot/images/diagramaClases.png" alt="alt"/>
        </div>
        </div>
    </div>
</main>
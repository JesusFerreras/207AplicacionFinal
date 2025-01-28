<header>
    <h1>Aplicación Final</h1>
    <button id="cambioTema">&#x25D1;</button>
    <form action="<?php print($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
        <input type="submit" id="miCuenta" name="miCuenta" value="Mi Cuenta">
        <input type="submit" id="cerrarSesion" name="cerrarSesion" value="Cerrar Sesión">
    </form>
</header>
<main>
    <form id="navegacion" action="<?php print($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
        <input type="submit" id="detalle" name="detalle" value="Detalle">
        <input type="submit" id="error" name="error" value="Error">
        <input type="submit" id="mtoDepartamentos" name="mtoDepartamentos" value="Mantenimiento de Departamentos">
        <input type="submit" id="rest" name="rest" value="REST">
    </form>
    <div id="contenido">
        <?php
            if (isset($_COOKIE['idioma'])) {
                switch ($_COOKIE['idioma']) {
                    case 'en':
                        print(
                            "<p>Welcome {$datosUsuario['descUsuario']} this is the {$datosUsuario['numConexiones']}º time you log in.".
                            ($datosUsuario['numConexiones']>1? " Your last log in was on {$datosUsuario['fechaHoraUltimaConexionAnterior']->format('Y-m-d H:i:s')}.</p>" : "</p>")
                        );
                    break;

                    default:
                        print(
                            "<p>Bienvenido {$datosUsuario['descUsuario']} esta es la {$datosUsuario['numConexiones']}º vez que se conecta.".
                            ($datosUsuario['numConexiones']>1? " Se conectó por última vez el {$datosUsuario['fechaHoraUltimaConexionAnterior']->format('Y-m-d H:i:s')}.</p>" : "</p>")
                        );
                    break;
                }
            } else {
                print(
                    "<p>Bienvenido {$datosUsuario['descUsuario']} esta es la {$datosUsuario['numConexiones']}º vez que se conecta.".
                    ($datosUsuario['numConexiones']>1? " Se conectó por última vez el {$datosUsuario['fechaHoraUltimaConexionAnterior']->format('Y-m-d H:i:s')}.</p>" : "</p>")
                );
            }
        ?>
    </div>
</main>
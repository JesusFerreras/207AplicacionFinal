<!doctype html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="author" content="Jesús Ferreras">
        <link rel="stylesheet" href="webroot/css/estilos.css">
        <title>207 Aplicación Final</title>
    </head>
    <body>
        <?php
            require_once $view[$_SESSION['paginaEnCurso']];
        ?>
        <footer>
            <a href="../index.html">Jesús Ferreras González</a>
            <a href="doc/phpDoc/index.html" target="_blank">phpDoc</a>
            <a href="doc/doxygen/html/index.html" target="_blank">Doxygen</a>
            <a href="https://www.w3schools.com/" target="_blank">Web imitada</a>
            <a href="https://github.com/JesusFerreras/207AplicacionFinal.git" target="_blank"><img src="webroot/images/github.png" alt="github"></a>
        </footer>
    </body>
    <script>
        document.body.classList.add(getCookie('temaDAW207') != ''? getCookie('temaDAW207') : 'claro');
        document.getElementById('cambioTema').addEventListener('click', cambiarTema);

        function cambiarTema() {
            let temaNuevo = document.body.classList.contains('claro')? 'oscuro' : 'claro';

            document.body.classList.remove('claro', 'oscuro');
            document.body.classList.add(temaNuevo);

            setCookie('temaDAW207', temaNuevo, 7);
        }

        function setCookie(clave, valor, dias) {
            let fechaActual = new Date();
            fechaActual.setTime(fechaActual.getTime() + (dias * 24 * 60 * 60 * 1000));

            let fechaExpiracion = "expires=" + fechaActual.toUTCString();
            document.cookie = clave + "=" + valor + ";" + fechaExpiracion + ";path=/";
        }

        function getCookie(clave) {
            let nombre = clave + "=";
            let cookies = document.cookie.split(';');
            for(let i = 0; i < cookies.length; i++) {
                let c = cookies[i];
                while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                }
                if (c.indexOf(nombre) == 0) {
                    return c.substring(nombre.length, c.length);
                }
            }
            return "";
        }
    </script>
</html>
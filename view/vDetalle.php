<header>
    <h1>Aplicación Final</h1>
    <button id="cambioTema">&#x25D1;</button>
</header>
<main>
    <form id="navegacion" action="<?php print($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
        <input type="submit" id="volver" name="volver" value="Volver">
    </form>
    <div id="contenido">
        <?php
            print('<h3>$_SESSION</h3>' . (isset($_SESSION)? mostrar($_SESSION):'<p>Variable indefinida</p>'));
            print('<h3>$_COOKIE</h3>' . mostrar($_COOKIE));
            print('<h3>$_SERVER</h3>' . mostrar($_SERVER));
            print('<h3>$_GET</h3>' . mostrar($_GET));
            print('<h3>$_POST</h3>' . mostrar($_POST));
            print('<h3>$_FILES</h3>' . mostrar($_FILES));
            print('<h3>$_REQUEST</h3>' . mostrar($_REQUEST));
            print('<h3>$_ENV</h3>' . mostrar($_ENV));


            function mostrar($array) {
                if (!empty($array)) {
                    $contenido = '<table>';
                    foreach ($array as $clave => $valor) {
                        $contenido .= "<tr><th>$clave</th><td>";
                        if ($valor instanceof Usuario) {
                            foreach ($valor->getArrayDatos() as $key => $value) {
                                $contenido .= $key . '=' . ($value instanceof DateTime? $value->format('Y-m-d H:i:s') : $value) . '<br>';
                            }
                        } else {
                            $contenido .= $valor;
                        }
                        $contenido .= "</td></tr>";
                    }
                    $contenido .= '</table>';

                    return $contenido;
                } else {
                    return '<p>Variable vacía</p>';
                }
            }
        ?>
    </div>
</main>
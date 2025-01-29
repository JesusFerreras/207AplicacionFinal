<header>
    <h1>Aplicación Final</h1>
    <button id="cambioTema">&#x25D1;</button>
    <form action="<?php print($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
        <input type="submit" id="volver" name="volver" value="Volver">
    </form>
</header>
<main>
    <div class="divRest">
        <h3>Foto del Día NASA</h3>
        <form action="<?php print($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
            <input type="date" name="fechaNasa" id="fechaNasa" value="<?php print($_SESSION['fechaNasa']); ?>">
            <input type="submit" id="pedir" name="pedir" value="Pedir">
        </form>
        <img id="fotoNasa" src="<?php print($datosFoto['url']); ?>" alt="<?php print($datosFoto['titulo']); ?>">
        <p><b>Título: </b><?php print($datosFoto['titulo']); ?></p>
        <p><b>Descripción: </b><?php print($datosFoto['descripcion']); ?></p>
    </div>
    <div class="divRest">
        <form action="<?php print($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
            <label for="latitud">Latitud</label>
            <input type="number" name="latitud" id="latitud" <?php print(isset($_REQUEST['latitud'])? "value=\"{$_REQUEST['latitud']}\"" : ''); ?>>
            <?php print(isset($erroresTiempo['latitud'])? "<p class=\"error\">{$erroresTiempo['latitud']}</p>" : ''); ?>
            <label for="longitud">Longitud</label>
            <input type="number" name="longitud" id="longitud" <?php print(isset($_REQUEST['longitud'])? "value=\"{$_REQUEST['longitud']}\"" : ''); ?>>
            <?php print(isset($erroresTiempo['longitud'])? "<p class=\"error\">{$erroresTiempo['longitud']}</p>" : ''); ?>
            <input type="submit" id="pedirTiempo" name="pedirTiempo" value="Pedir Tiempo">
        </form>
        <?php
            foreach ($datosTiempo as $key => $value) {
                print("$key: $value\n");
            }
        ?>
    </div>
    <div class="divRest"></div>
</main>
<script>
    document.getElementById("pedir").style.display = "none";
    
    document.getElementById("fechaNasa").addEventListener("focusout", () => {
        document.getElementById("pedir").click();
    });
</script>
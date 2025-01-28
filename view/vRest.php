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
        <p><b>Parámetros: </b><?php print($datosFoto['titulo']); ?></p>
    </div>
    <div class="divRest"></div>
    <div class="divRest"></div>
</main>
<script>
    document.getElementById("pedir").style.display = "none";
    
    document.getElementById("fechaNasa").addEventListener("focusout", () => {
        document.getElementById("pedir").click();
    });
</script>
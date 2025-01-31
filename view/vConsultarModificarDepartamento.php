<header>
    <h1>Aplicación Final</h1>
    <button id="cambioTema">&#x25D1;</button>
</header>
<main>
    <form id="accesoACuenta" action="<?php print($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
        <label for="codDepartamento">Código</label>
        <input type="text" id="codDepartamento" name="codDepartamento" value="<?php print($datosDepartamento['codDepartamento']) ?>" disabled>
        <label for="descDepartamento">Descripción</label>
        <input type="text" id="descDepartamento" name="descDepartamento" value="<?php print($datosDepartamento['descDepartamento']) ?>" required>
        <?php print(isset($mensajesError['descDepartamento'])? $mensajesError['descDepartamento'] : ''); ?>
        <label for="fechaCreacionDepartamento">Fecha de creación</label>
        <input type="datetime-local" id="fechaCreacionDepartamento" name="fechaCreacionDepartamento" <?php print('value="'.date_format($datosDepartamento['fechaCreacionDepartamento'], 'Y-m-d\TH:i').'"'); ?> disabled>
        <label for="volumenDeNegocio">Volumen de negocio</label>
        <input type="text" id="volumenDeNegocio" name="volumenDeNegocio" value="<?php print($datosDepartamento['volumenDeNegocio']) ?>" required>
        <?php print(isset($mensajesError['volumenDeNegocio'])? $mensajesError['volumenDeNegocio'] : ''); ?>
        <label for="fechaBajaDepartamento">Fecha de baja</label>
        <input type="datetime-local" id="fechaBajaDepartamento" name="fechaBajaDepartamento" <?php print(is_null($datosDepartamento['fechaBajaDepartamento'])? '' : 'value="'.date_format($datosDepartamento['fechaBajaDepartamento'], 'Y-m-d\TH:i').'"'); ?>>
        <?php print(isset($mensajesError['fechaBajaDepartamento'])? $mensajesError['fechaBajaDepartamento'] : ''); ?>
        <div>
            <input type="submit" id="modificarDepartamento" name="modificarDepartamento" value="Modificar">
            <input type="submit" id="volver" name="volver" value="Volver">
        </div>
    </form>
</main>
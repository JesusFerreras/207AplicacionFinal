<header>
    <h1>Aplicación Final</h1>
    <button id="cambioTema">&#x25D1;</button>
</header>
<main>
    <form id="datos" action="<?php print($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
        <h2>Modificar Departamento</h2>
        <label for="codDepartamento">Código</label>
        <input type="text" id="codDepartamento" name="codDepartamento" value="<?php print($datosDepartamento['codDepartamento']) ?>" disabled>
        <label for="descDepartamento">Descripción</label>
        <input type="text" id="descDepartamento" name="descDepartamento" value="<?php print($datosDepartamento['descDepartamento']) ?>" required>
        <?php print(isset($mensajesError['descDepartamento'])? "<p class=\"error\">{$mensajesError['descDepartamento']}</p>" : ''); ?>
        <label for="fechaCreacionDepartamento">Fecha de creación</label>
        <input type="datetime-local" id="fechaCreacionDepartamento" name="fechaCreacionDepartamento" <?php print('value="'.date_format($datosDepartamento['fechaCreacionDepartamento'], 'Y-m-d\TH:i').'"'); ?> disabled>
        <label for="volumenDeNegocio">Volumen de negocio</label>
        <input type="text" id="volumenDeNegocio" name="volumenDeNegocio" value="<?php print($datosDepartamento['volumenDeNegocio']) ?>" required>
        <?php print(isset($mensajesError['volumenDeNegocio'])? "<p class=\"error\">{$mensajesError['volumenDeNegocio']}</p>" : ''); ?>
        <label for="fechaBajaDepartamento">Fecha de baja</label>
        <input type="datetime-local" id="fechaBajaDepartamento" name="fechaBajaDepartamento" <?php print(is_null($datosDepartamento['fechaBajaDepartamento'])? '' : 'value="'.date_format($datosDepartamento['fechaBajaDepartamento'], 'Y-m-d\TH:i').'"'); ?> disabled>
        <div>
            <input type="submit" id="modificar" name="modificar" value="Modificar">
            <input type="submit" id="volver" name="volver" value="Volver">
        </div>
    </form>
</main>
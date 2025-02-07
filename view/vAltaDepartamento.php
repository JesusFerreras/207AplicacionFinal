<header>
    <h1>Aplicación Final</h1>
    <button id="cambioTema">&#x25D1;</button>
</header>
<main>
    <form id="datos" action="<?php print($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
        <h2>Dar de Alta un Departamento</h2>
        <label for="codDepartamento">Código</label>
        <input type="text" id="codDepartamento" name="codDepartamento" <?php print(isset($_REQUEST['codDepartamento'])? "value=\"{$_REQUEST['codDepartamento']}\"" : ''); ?> required>
        <?php print(isset($mensajesError['codDepartamento'])? "<p class=\"error\">{$mensajesError['codDepartamento']}</p>" : ''); ?>
        <label for="descDepartamento">Descripción</label>
        <input type="text" id="descDepartamento" name="descDepartamento" <?php print(isset($_REQUEST['descDepartamento'])? "value=\"{$_REQUEST['descDepartamento']}\"" : ''); ?> required>
        <?php print(isset($mensajesError['descDepartamento'])? "<p class=\"error\">{$mensajesError['descDepartamento']}</p>" : ''); ?>
        <label for="volumenDeNegocio">Volumen de negocio</label>
        <input type="text" id="volumenDeNegocio" name="volumenDeNegocio" <?php print(isset($_REQUEST['volumenDeNegocio'])? "value=\"{$_REQUEST['volumenDeNegocio']}\"" : ''); ?> required>
        <?php print(isset($mensajesError['volumenDeNegocio'])? "<p class=\"error\">{$mensajesError['volumenDeNegocio']}</p>" : ''); ?>
        <div>
            <input type="submit" id="altaDepartamento" name="altaDepartamento" value="Dar de alta">
            <input type="submit" id="volver" name="volver" value="Volver">
        </div>
    </form>
</main>
<header>
    <h1>Aplicación Final</h1>
    <button id="cambioTema">&#x25D1;</button>
</header>
<main>
    <form id="datos" action="<?php print($_SERVER['PHP_SELF']); ?>" method="post" novalidate enctype="multipart/form-data">
        <h2>Cambiar contraseña</h2>
        <label for="password">Contraseña anterior</label>
        <input type="password" id="passwordAnterior" name="passwordAnterior" required autofocus>
        <?php print(isset($mensajesError['passwordAnterior'])? "<p class=\"error\">{$mensajesError['passwordAnterior']}</p>" : ''); ?>
        <label for="password">Contraseña nueva</label>
        <input type="password" id="passwordNueva" name="passwordNueva" required>
        <?php print(isset($mensajesError['passwordNueva'])? "<p class=\"error\">{$mensajesError['passwordNueva']}</p>" : ''); ?>
        <div>
            <input type="submit" id="modificar" name="modificar" value="Modificar">
            <input type="submit" id="volver" name="volver" value="Volver">
        </div>
    </form>
</main>
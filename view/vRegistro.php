<header>
    <h1>Aplicación Final</h1>
    <button id="cambioTema">&#x25D1;</button>
</header>
<main>
    <form id="datos" action="<?php print($_SERVER['PHP_SELF']); ?>" method="post" novalidate enctype="multipart/form-data">
        <h2>Registro</h2>
        <label for="codUsuario">Código</label>
        <input type="text" id="codUsuario" name="codUsuario" required autofocus>
        <?php print(isset($mensajesError['codUsuario'])? '<p class="error">'.$mensajesError['codUsuario'].'</p>' : ''); ?>
        <label for="descUsuario">Descripción</label>
        <input type="text" id="descUsuario" name="descUsuario" required>
        <?php print(isset($mensajesError['descUsuario'])? '<p class="error">'.$mensajesError['descUsuario'].'</p>' : ''); ?>
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" required>
        <?php print(isset($mensajesError['password'])? '<p class="error">'.$mensajesError['password'].'</p>' : ''); ?>
        <label for="imagenUsuario">Imagen</label>
        <input type="file" id="imagenUsuario" name="imagenUsuario">
        <?php print(isset($mensajesError['imagenUsuario'])? "<p class=\"error\">{$mensajesError['imagenUsuario']}</p>" : ''); ?>
        <div>
            <input type="submit" id="registro" name="registro" value="Registrarse">
            <input type="submit" id="volver" name="volver" value="Volver">
        </div>
    </form>
</main>
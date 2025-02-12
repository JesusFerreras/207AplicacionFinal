<header>
    <h1>Aplicación Final</h1>
    <button id="cambioTema">&#x25D1;</button>
</header>
<main>
    <form id="datos" action="<?php print($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
        <h2>Login</h2>
        <label for="codUsuario">Código</label>
        <input type="text" id="codUsuario" name="codUsuario" required autofocus>
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" required>
        <?php print(isset($mensajeError)? $mensajeError : ''); ?>
        <div>
            <input type="submit" id="iniciarSesion" name="iniciarSesion" value="Iniciar sesión">
            <input type="submit" id="registro" name="registro" value="Registrarse">
            <input type="submit" id="volver" name="volver" value="Volver">
        </div>
    </form>
</main>
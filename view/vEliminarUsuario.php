<header>
    <h1>Aplicación Final</h1>
    <button id="cambioTema">&#x25D1;</button>
</header>
<main>
    <form id="datos" action="<?php print($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
        <h2>Eliminar Usuario</h2>
        <label for="codUsuario">Código</label>
        <input type="text" id="codUsuario" name="codUsuario" value="<?php print($datosUsuario['codUsuario']) ?>" disabled>
        <label for="descUsuario">Descripción</label>
        <input type="text" id="descUsuario" name="descUsuario" value="<?php print($datosUsuario['descUsuario']) ?>" disabled>
        <label for="numConexiones">Número de conexiones</label>
        <input type="text" id="numConexiones" name="numConexiones" value="<?php print($datosUsuario['numConexiones']); ?>" disabled>
        <label for="fechaHoraUltimaConexion">Fecha y hora de la última conexión</label>
        <input type="datetime-local" id="fechaHoraUltimaConexion" name="fechaHoraUltimaConexion" <?php print('value="'.date_format($datosUsuario['fechaHoraUltimaConexion'], 'Y-m-d\TH:i').'"'); ?> disabled>
        <label for="perfil">Perfil</label>
        <input type="text" id="perfil" name="perfil" value="<?php print($datosUsuario['perfil']) ?>" disabled>
        <label for="imagenUsuario">Imagen</label>
        <?php print(is_null($datosUsuario['imagenUsuario'])? '<p>-</p>' : '<img src="data:image/jpg;charset=utf8;base64,'.base64_encode(stripslashes($datosUsuario['imagenUsuario'])).'" alt="imagenUsuario"/>'); ?>
        <div>
            <input type="submit" id="eliminarUsuario" name="eliminarUsuario" value="Eliminar" class="borrado">
            <input type="submit" id="volver" name="volver" value="Volver">
        </div>
    </form>
</main>
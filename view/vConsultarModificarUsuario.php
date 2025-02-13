<header>
    <h1>Aplicación Final</h1>
    <button id="cambioTema">&#x25D1;</button>
</header>
<main>
    <form id="datos" action="<?php print($_SERVER['PHP_SELF']); ?>" method="post" novalidate enctype="multipart/form-data">
        <h2>Modificar Usuario</h2>
        <label for="codUsuario">Código</label>
        <input type="text" id="codUsuario" name="codUsuario" value="<?php print($datosUsuario['codUsuario']); ?>" disabled>
        <label for="password">Contraseña</label>
        <input type="password" id="password" name="password" value="<?php print($datosUsuario['password']); ?>" disabled>
        <label for="descUsuario">Descripción</label>
        <input type="text" id="descUsuario" name="descUsuario" value="<?php print($datosUsuario['descUsuario']); ?>" required>
        <?php print(isset($mensajesError['descUsuario'])? "<p class=\"error\">{$mensajesError['descUsuario']}</p>" : ''); ?>
        <label for="numConexiones">Número de conexiones</label>
        <input type="text" id="numConexiones" name="numConexiones" value="<?php print($datosUsuario['numConexiones']); ?>" disabled>
        <label for="fechaHoraUltimaConexion">Fecha y hora de la última conexión</label>
        <input type="datetime-local" id="fechaHoraUltimaConexion" name="fechaHoraUltimaConexion" <?php print('value="'.date_format($datosUsuario['fechaHoraUltimaConexion'], 'Y-m-d\TH:i').'"'); ?> disabled>
        <label for="perfil">Perfil</label>
        <select type="text" id="perfil" name="perfil" required>
            <?php
                foreach ($opcionesPerfil as $valor) {
                    print('<option value="' . $valor . '"' . ($datosUsuario['perfil'] == $valor? 'selected' : '') . '>' . ucfirst($valor) . '</option>');
                }
            ?>
        </select>
        <?php print(isset($mensajesError['descUsuario'])? "<p class=\"error\">{$mensajesError['descUsuario']}</p>" : ''); ?>
        <label for="imagenUsuario">Imagen</label>
        <div>
            <img src="<?php print(is_null($datosUsuario['imagenUsuario'])? 'webroot/images/imagenUsuarioBase.png' : 'data:image/jpg;charset=utf8;base64,'.base64_encode(stripslashes($datosUsuario['imagenUsuario']))); ?>" alt="imagenUsuario"/>
            <input type="file" id="imagenUsuario" name="imagenUsuario">
        </div>
        <?php print(isset($mensajesError['imagenUsuario'])? "<p class=\"error\">{$mensajesError['imagenUsuario']}</p>" : ''); ?>
        <div>
            <input type="submit" id="modificar" name="modificar" value="Modificar">
            <input type="submit" id="volver" name="volver" value="Volver">
        </div>
    </form>
</main>
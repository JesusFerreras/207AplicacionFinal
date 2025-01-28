<header>
    <h1>Aplicación Final</h1>
    <button id="cambioTema">&#x25D1;</button>
    <form action="<?php print($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
        <input type="submit" id="volver" name="volver" value="Volver">
    </form>
</header>
<main>
    <form id="navegacion" action="<?php print($_SERVER['PHP_SELF']); ?>" method="post" novalidate>
        <input type="submit" id="altaDepartamento" name="altaDepartamento" value="Dar de alta un departamento">
        <input type="submit" id="consultarModificarDepartamento" name="consultarModificarDepartamento" value="Modificar un departamento">
        <input type="submit" id="eliminarDepartamento" name="eliminarDepartamento" value="Eliminar un departamento">
        <input type="submit" id="bajaDepartamento" name="bajaDepartamento" value="Dar de baja un departamento">
        <input type="submit" id="rehabilitarDepartamento" name="rehabilitarDepartamento" value="Rehabilitar un departamento">
        <input type="submit" id="exportarDepartamentos" name="exportarDepartamentos" value="Exportar departamentos">
        <input type="submit" id="importarDepartamentos" name="importarDepartamentos" value="Importar departamentos">
    </form>
    <div id="contenido">
    </div>
</main>
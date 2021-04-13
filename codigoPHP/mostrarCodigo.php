<!doctype html>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name="author" content="Bea Merino">
		<meta name="application-name" content="Sitio Web">
		<meta name="description" content="Desarrollo del segundo curso de DAW">
		<meta name="keywords" content="DAW, DIW, DWEC, DWES, web">
	<!-- Recomendado 5 o 8 palabras clave, Cada palabra clave puede estar constituida por hasta 4 o 5 palabras. -->
                <title>Bea Merino</title>
    </head>
  	<body>
		<input id="volver" type="button" value="Volver" onclick="location = '../../indexProyectoTema4.html'">
                <?php
                    /**
                     @author: Bea Merino
                    @since: 17/11/2020
                    */
                    echo"<h1>Mantenimiento de departamentos</h1>";
                    highlight_file("mtoDepartamentos.php");
                    echo"<h1>Alta departamentos</h1>";
                    highlight_file("altaDepartamento.php");
                    echo"<h1>Baja departamentos</h1>";
                    highlight_file("bajaDepartamento.php");
                    echo"<h1>Editar departamentos</h1>";
                    highlight_file("editarDepartamento.php");
                    echo"<h1>Mostrar departamento</h1>";
                    highlight_file("mostrarDepartamento.php");
                    echo"<h1>Baja Lógica departamento</h1>";
                    highlight_file("bajaLogicaDepartamento.php");
                    echo"<h1>Rehabilitar departamento</h1>";
                    highlight_file("rehabilitarDepartamento.php");
                    echo"<h1>Importar departamentos</h1>";
                    highlight_file("importarDepartamentos.php");
                    echo"<h1>Exportar departamentos</h1>";
                    highlight_file("exportarDepartamentos.php");
					
                ?>
</html>
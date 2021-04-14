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
		
                <?php
                    /**
                     @author: Bea Merino
                    @since: 05/10/2019
                    */
                    echo"<h1>Mantenimiento de departamentos</h1>";
                    highlight_file("../codigoPHP/MtoDepartamentos.php");
                    echo"<h1>Alta de departamentos</h1>";
                    highlight_file("../codigoPHP/AltaDepartamento.php");
                    echo"<h1>Mostrar departamentos</h1>";
                    highlight_file("../codigoPHP/MostrarDepartamento.php");
                    echo"<h1>Modificar departamentos</h1>";
                    highlight_file("../codigoPHP/ModificarDepartamentos.php");
                    echo"<h1>Borrar departamentos</h1>";
                    highlight_file("../codigoPHP/BorrarDepartamento.php");
					
                ?>
</html>
<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js">
    <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>Bea Merino</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Free HTML5 Website Template by FreeHTML5.co" />
        <meta name="keywords"
              content="free html5, free template, free bootstrap, free website template, html5, css3, mobile first, responsive" />
        <meta name="author" content="FreeHTML5.co" />

        <!-- 
            //////////////////////////////////////////////////////
    
            FREE HTML5 TEMPLATE 
            DESIGNED & DEVELOPED by FreeHTML5.co
                    
            Website: 		http://freehtml5.co/
            Email: 			info@freehtml5.co
            Twitter: 		http://twitter.com/fh5co
            Facebook: 		https://www.facebook.com/fh5co
    
            //////////////////////////////////////////////////////
        -->

        <!-- Facebook and Twitter integration -->
        <meta property="og:title" content="" />
        <meta property="og:image" content="" />
        <meta property="og:url" content="" />
        <meta property="og:site_name" content="" />
        <meta property="og:description" content="" />
        <meta name="twitter:title" content="" />
        <meta name="twitter:image" content="" />
        <meta name="twitter:url" content="" />
        <meta name="twitter:card" content="" />

        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
        <link rel="shortcut icon" href="webroot/images/favicon.png">

        <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,600,400italic,700' rel='stylesheet'
              type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>

        <!-- Animate.css -->
        <link rel="stylesheet" href="../webroot/css/animate.css">
        <!-- Icomoon Icon Fonts-->
        <link rel="stylesheet" href="../webroot/css/icomoon.css">
        <!-- Bootstrap  -->
        <link rel="stylesheet" href="../webroot/css/bootstrap.css">
        <!-- Owl Carousel -->
        <link rel="stylesheet" href="../webroot/css/owl.carousel.min.css">
        <link rel="stylesheet" href="../webroot/css/owl.theme.default.min.css">
        <!-- Theme style  -->
        <link rel="stylesheet" href="../webroot/css/style.css">

        <!-- Modernizr JS -->
        <script src="../webroot/js/modernizr-2.6.2.min.js"></script>
        <!-- FOR IE9 below -->
        <!--[if lt IE 9]>
            <script src="webroot/js/respond.min.js"></script>
            <![endif]-->

    </head>
    <body>
        <div id="fh5co-page">
            <aside id="fh5co-aside" role="complementary" class="border js-fullheight">
                <h1 id="fh5co-logo"><a href="../../index.html"><img src="../webroot/images/logo.png"
                                                                    alt="Free HTML5 Bootstrap Website Template"></a></h1>
                <nav id="fh5co-main-menu" role="navigation">
                    <ul>
                        <li class="fh5co-active"><a href="../../index.html">Home</a></li>
                        <li><a href="https://github.com/bea93" target="_blank">GitHub</a></li>
                        <li><a href="../../juegos.html">Juegos</a></li>
                    </ul>
                </nav>
                <div class="fh5co-footer">
                    <p>&copy; 2021 Beatriz Merino Macía.</p>
                </div>
            </aside>
            <div id="fh5co-main">
                <div class="fh5co-narrow-content">
                    <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Mostrar departamento</h2>
                    <?php
                /**
                    @author: Bea Merino
                    @since: 07/04/2021
                    @description: Mostrar Departamento
                 */
                //Importa la librería de validación
                require '../core/210322ValidacionFormularios.php';
                //Fichero de configuración de la BBDD
                require_once '../config/confDB.php';

                try {
                    //Objeto PDO con los datos de conexión
                    $miBD = new PDO(HOST, USER, PASS);
                    $miBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    
                    $sentenciaSQL = "SELECT * FROM Departamento WHERE CodDepartamento LIKE '" . $_GET['codigo'] . "'";
                    $consultaSelect = $miBD->prepare($sentenciaSQL);
                    $consultaSelect->execute();
                    
                    //Crea una tabla con los datos del departamento
                    echo "<table border='0'>";
                    echo "<tr>";
                    echo "<th>Codigo</th>";
                    echo "<th>Descripción</th>";
                    echo "<th colspan'2'>Volumen de Negocio</th>";
                    echo "</tr>";
                    while ($registro = $consultaSelect->fetchObject()) { //Al realizar el fetchObject, se pueden sacar los datos de $registro como si fuera un objeto
                        echo "<tr>";
                        echo "<td>$registro->CodDepartamento</td>";
                        echo "<td>$registro->DescDepartamento</td>";
                        echo "<td>$registro->VolumenNegocio</td>";
                        echo "</tr>";
                    }
                    echo "</table>";
               //Captura la excepción
                } catch (PDOException $mensajeError) {
                    //Mensaje de salida
                    echo "Error " . $mensajeError->getMessage() . "<br>"; 
                    //Código del error
                    echo "Codigo del error " . $mensajeError->getCode() . "<br>"; 
                } finally {
                    //Cerramos la conexion
                    unset($miBD); 
                } ?>
                    <a href="mtoDepartamentos.php"><input type="button"  value="Volver"></a>
                </div> 
            </div> 
            <!-- jQuery -->
            <script src="../webroot/js/jquery.min.js"></script>
            <!-- jQuery Easing -->
            <script src="../webroot/js/jquery.easing.1.3.js"></script>
            <!-- Bootstrap -->
            <script src="../webroot/js/bootstrap.min.js"></script>
            <!-- Carousel -->
            <script src="../webroot/js/owl.carousel.min.js"></script>
            <!-- Stellar -->
            <script src="../webroot/js/jquery.stellar.min.js"></script>
            <!-- Waypoints -->
            <script src="../webroot/js/jquery.waypoints.min.js"></script>
            <!-- Counters -->
            <script src="../webroot/js/jquery.countTo.js"></script>
            <!-- MAIN JS -->
            <script src="../webroot/js/main.js"></script>
    </body>
</html>
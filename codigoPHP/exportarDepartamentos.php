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
                    <h2 class="fh5co-heading animate-box" data-animate-effect="fadeInLeft">Exportar Departamentos</h2>
                    <?php
                    /**
                     * @author Bea Merino
                     * @since 12/04/2021
                     * @description: Exportar departamentos
                     */

                    //Fichero de configuración de la BBDD
                    require_once '../config/confDB.php';

                    try{
                        //Objeto PDO con los datos de conexión
                        $miBD = new PDO(HOST,USER,PASS);
                        $miBD->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    }catch(PDOException $excepcion){
                        die("No se pudo establecer la conexión a la base de datos");
                    }
                    try{
                        //Prepara la consulta
                        $consultaSelect = $miBD->prepare("SELECT * FROM Departamento;");
                        //Fichero en el que añadirá los valores del query
                        $ficheroXML = new DOMDocument("1.0", "utf-8");
                        //Hace que salga espaciado y tabulado
                        $ficheroXML->formatOutput =true;
                        //Crea la rama hijos de departamentos
                        $raiz = $ficheroXML->appendChild($ficheroXML->createElement("Departamentos"));

                        //Bucle que otorga los valores
                        while($oDepartamento = $consultaSelect->fetchObject()){
                            $departamento = $raiz->appendChild($ficheroXML->createElement("Departamento"));
                            $departamento->appendChild($ficheroXML->createElement("CodDepartamento", $oDepartamento->CodDepartamento));
                            $departamento->appendChild($ficheroXML->createElement("DescDepartamento", $oDepartamento->DescDepartamento));
                            $departamento->appendChild($ficheroXML->createElement("FechaBaja", $oDepartamento->FechaBaja));
                            $departamento->appendChild($ficheroXML->createElement("VolumenNegocio", $oDepartamento->VolumenNegocio));
                        }
                        //Crea un documento XML desde la representación DOM. 
                        $ficheroXML->saveXML();
                        //Establece la ruta en la que se guardará el archivo
                        $ficheroXML->save("../tmp/departamento.xml");

                        //Mensaje que se mostrará si no ha ocurrido ningún error
                        echo "<h3 style='color: green'>El archivo se ha exportado correctamente</h3>";
                        echo "<a href='mtoDepartamentos.php'><input type='button'  value='Volver'></a>";
                    }catch(PDOException $excepcion){
                        echo "<h1 style='color: red'>No se ha podido exportar el archivo</h1>";
                        //Mensaje de salida
                        echo $excepcion->getMessage();
                        echo "<a href='mtoDepartamentos.php'><input type='button'  value='Volver'></a>";
                    }finally{
                        //Cerramos la conexión
                        unset($miBD);
                    }
                    ?>
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